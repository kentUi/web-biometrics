<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Employees;

class Biometrics extends Model
{
    use HasFactory;

    protected $primaryKey = 'log_id';
    protected $table = 't_logs';
    protected $fillable = [
        'log_userid',
        'log_datetime',
        'log_status'
    ];

    public function importData($request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileExtension = $file->getClientOriginalExtension();
            if ($fileExtension == "dat") {

                $filePath = $file->store('temp');

                $fileContent = file_get_contents(storage_path('app/' . $filePath));
                $lines = explode(PHP_EOL, $fileContent);

                foreach ($lines as $line) {
                    $values = explode("\t", $line);

                    if (!empty($values) && isset($values[1])) {
                        $date = $values[1];
                    }

                    if (!empty($values) && isset($values[0])) {
                        $id = $values[0];
                    }

                    $type = str_replace(' ', '', $values[2] . $values[3] . $values[4] . $values[5]);
                    if ($type == 1110) {
                        $status = 'OUT';
                        $bg = 'danger';
                    } elseif ($type == 1010) {
                        $status = 'IN';
                        $bg = 'success';
                    }

                    $id = str_replace(["\r\n", "\r", "\n"], ' ', $id);
                    $id = str_replace(' ', '', $id);
                    $id = preg_replace('/[^A-Za-z0-9\-]/', '', $id);

                    $type = str_replace(["\r\n", "\r", "\n"], ' ', $type);
                    $type = str_replace(' ', '', $type);
                    $type = preg_replace('/[^A-Za-z0-9\-]/', '', $type);

                    $count = DB::table('t_logs')
                        ->where('log_userid', '=', $id)
                        ->where('log_datetime', '=', $date)
                        ->where('log_status', '=', $type)
                        ->count();

                    if ($count == 0) {

                        $dataToInsert = [
                            'log_userid' => str_replace(' ', '', $id),
                            'log_datetime' => $date,
                            'log_status' => str_replace(' ', '', $type),
                        ];

                        Biometrics::insertData($dataToInsert);
                    }
                    ?>
                    <tr class="tb-tnx-item">
                        <td class="tb-tnx-id">
                            <a href="#">
                                <span>
                                    <?= $id ?>
                                </span>
                            </a>
                        </td>
                        <td class="tb-tnx-info">
                            <div class="tb-tnx-desc">
                                <span class="title">--</span>
                            </div>
                            <div class="tb-tnx-date">
                                <span class="date">
                                    <?= date_format(date_create($date), 'M d, Y') ?>
                                </span>
                                <span class="date">
                                    <?= date_format(date_create($date), 'h:i:s A') ?>
                                </span>
                            </div>
                        </td>
                        <td class="tb-tnx-amount">
                            <div class="tb-tnx-total">
                                <span class="amount">-</span>
                            </div>
                            <div class="tb-tnx-status">
                                <span class="badge badge-dot bg-<?= $bg ?>"><?= $status ?></span>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            }
        }

        return response()->json(['error' => 'File not found', 'message' => 'Please Provide a valid file format. Thank you. Try again.'], 404);
    }

    public function importData1($request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileExtension = $file->getClientOriginalExtension();
            if ($fileExtension == "dat") {

                $filePath = $file->store('temp');

                $fileContent = file_get_contents(storage_path('app/' . $filePath));
                $lines = explode(PHP_EOL, $fileContent);

                foreach ($lines as $line) {
                    $values = explode("\t", $line);

                    if (!empty($values) && isset($values[1])) {
                        $name = $values[1];
                    }

                    if (!empty($values) && isset($values[2])) {
                        $department = $values[2];
                    }

                    if (!empty($values) && isset($values[3])) {
                        $bioName = $values[3];
                    }

                    if (!empty($values) && isset($values[4])) {
                        $bioID = $values[4];
                    }

                    if (!empty($values) && isset($values[5])) {
                        $bioStatus = $values[5];
                    }

                    $user = new Employees();
                    $user->e_name = $name;
                    $user->e_department = $department;
                    $user->e_bioID = $bioID;
                    $user->e_bioName = $bioName;
                    $user->e_bioStatus = $bioStatus;
                    $user->save();

                }
            }
        }

        return response()->json(['error' => 'File not found', 'message' => 'Please Provide a valid file format. Thank you. Try again.'], 404);
    }


    public static function insertData($data)
    {
        self::create($data);
    }

    public static function getLogs($id, $request)
    {
        return ['userid' => $id, 'logs' => $request];
    }

    public static function logs($request)
    {
        $rs = DB::table('t_logs')
            ->select('log_userid', 'e_name')
            ->join('t_employees', 't_logs.log_userid', '=', 't_employees.e_bioID')
            ->where('e_department', 'LIKE', $request['department'])
            ->whereBetween('log_datetime', [$request['from'], $request['to']])
            ->distinct()
            ->get();


        $data = [];
        foreach ($rs as $row) {
            $log_userid = $row->log_userid;
            $log_name = $row->e_name;
            $logs = DB::table('t_logs')
                ->select('log_userid', 'log_datetime', 'log_status')
                ->where('log_userid', '=', $log_userid)
                ->whereRaw("log_datetime BETWEEN ? AND DATE_ADD(?, INTERVAL 1 DAY)", [$request['from'], $request['to']])
                ->orderBy('log_datetime', 'ASC')
                ->get();


            $data[] = [
                'name' => $log_name,
                'userid' => $log_userid,
                'logs' => $logs
            ];

        }
        return $data;
    }

    public static function check($request)
    {
        $rs = DB::table('t_logs')
            ->select('log_userid', 'e_name')
            ->join('t_employees', 't_logs.log_userid', '=', 't_employees.e_bioID')
            ->where('e_department', 'LIKE', $request['department'])
            ->whereBetween('log_datetime', [$request['from'], $request['to']])
            ->distinct()
            ->get();

        $data = [];
        foreach ($rs as $row) {
            $log_userid = $row->log_userid;
            $log_name = $row->e_name;
            $logs = DB::table('t_logs')
                ->select('log_userid', 'log_datetime', 'log_status')
                ->where('log_userid', '=', $log_userid)
                ->whereBetween('log_datetime', [$request['from'], $request['to']])
                ->orderBy('log_datetime', 'ASC')
                ->get();

            $data[] = [
                'name' => $log_name,
                'userid' => $log_userid,
                'logs' => $logs
            ];

        }

        if (empty($data)) {
            return ['status' => 0,];
        } else {
            return ['status' => 1];
        }
    }
}
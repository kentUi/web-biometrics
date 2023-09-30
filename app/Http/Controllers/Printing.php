<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biometrics;
use PDF;

class Printing extends Controller
{
    public function generatePDF()
    {
        $data = ['title' => 'Sample PDF'];

        $pdf = PDF::loadView('auth.login', $data);

        return $pdf->download('sample.pdf');
    }
    
    public static function print(Request $request){
    ?>
    <style>
        .two-columns-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            padding-left: 15px;
            padding-top: 1px;
        }

        .two-columns-grid>* {
            padding: 2rem;
        }

        .page-break {
            page-break-after: always;
            /* Insert page break after the element */
        }

        .content {
            font-size: 16px;
            line-height: 1.5;
        }

        .stamp {
            font-size: 11px;
        }
    </style>

    <?php
    $find = [
        'department' => $request->input('d'),
        'from' => $request->input('from'),
        'to' => $request->input('to')
    ];

    $page = 0;
    $id_x = '';
    $id_y = '';
    $logs_x = '';
    $logs_y = '';
    $data_x = [];
    $data_y = [];
    $name_x = '';
    $name_y = '';

    $DTR = Biometrics::logs($find);
    $CHECK = Biometrics::check($find);

    if ($CHECK['status'] != 0) {

        foreach ($DTR as $log) {
            if ($page == 1) {
                $id_y = $log['userid'];
                $logs_y = $log['logs'];
                $name_y = $log['name'];

                $data_y = [
                    'name' => $name_y,
                    'id' => $id_y,
                    'stamp' => $logs_y
                ];

                $data_x = [
                    'name' => $name_x,
                    'id' => $id_x,
                    'stamp' => $logs_x
                ];

                ?>
                <div class="two-columns-grid page-break">
                    <div style="padding-top: 0px">
                        <?php
                        echo view('prints.dtr', $data_x);
                        ?>
                    </div>
                    <div style="padding-top: 0px">
                        <?php
                        echo view('prints.dtr', $data_y);
                        ?>
                    </div>
                </div>
                <?php
                $id_x = '';
                $id_y = '';
                $page = 0;
            } else {
                $name_x = $log['name'];
                $id_x = $log['userid'];
                $logs_x = $log['logs'];
                $page++;

                $data_y = [
                    'name' => $name_x,
                    'id' => $id_x,
                    'stamp' => $logs_x
                ];
            }

        }

        if ($page == 1) {
            ?>
            <div class="two-columns-grid page-break">
                <div style="padding-top: 0px">
                    <?php
                    echo view('prints.dtr', $data_y);
                    ?>
                </div>
            </div>
            <?php
        }
    } else {
        ?>
        <center>
            <img src="https://www.reinforcedesigns.com/onlinemin/default-img/empty1.png" alt="">
        </center>
        <?php
    }
    }
}

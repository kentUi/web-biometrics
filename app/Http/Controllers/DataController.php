<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;

class DataController extends Controller
{
    public function showImportForm()
    {
        return view('import_form')->withErrors(['dat_file' => 'The dat file field must be a file of type: dat']);
    }

    public function executeImport(Request $request)
    {
        $request->validate([
            'text_file' => 'required|mimes:txt', // Allow only .txt files
            'dat_file' => 'required|mimes:dat', // Allow only .txt files
        ]);

        $file = $request->file('text_file');
        $filePath = $file->getRealPath();

        $jsonArray = [];

        if (($handle = fopen($filePath, "r")) !== false) {
            while (($data = fgetcsv($handle, 0, "\t")) !== false) {
                $jsonArray[] = array_combine(['field1', 'field2', 'field3'], $data);
            }
            fclose($handle);
        }

        // Convert the array to JSON format
        $jsonData = json_encode($jsonArray, JSON_PRETTY_PRINT);

        // Save the JSON data to a file if needed
        // file_put_contents('output.json', $jsonData);

        return response()->json($jsonData);
    }

    public static function registerEmployee(Request $request){
        echo $request->inp_name;
        Employees::create([
            'e_name' => $request->inp_name,
            'e_department' => $request->inp_department,
            'e_bioID' => $request->inp_bioID,
            'e_bioName' => $request->inp_bioName,
            'e_bioStatus' => '',
            'e_status' => 'active'
        ]);
        return redirect('/user/employee-new?s');
    }
}


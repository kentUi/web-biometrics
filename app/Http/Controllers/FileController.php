<?php

namespace App\Http\Controllers;

use App\Models\Biometrics;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function processFile(Request $request)
    {
        $bio = new Biometrics;
        return $bio->importData($request);
    }

    public function processFile1(Request $request)
    {
        $bio = new Biometrics;
        return $bio->importData1($request);
    }
}
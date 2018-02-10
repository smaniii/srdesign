<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inputInfo;
use App\batchInfo;

class InformationController extends Controller
{
    public function newInformation(Request $request){

        $inputInfo = new inputInfo();
        $inputInfo->tempInside = $request->tempInside;
        $inputInfo->tempOutside = $request->tempOutside;
        $inputInfo->pressure = $request->pressure;
        $inputInfo->batch_id = $request->batch_id;
        $inputInfo->save();
        return response()->json([
            $inputInfo
        ]);

    }

    public function getCurrentBatchId(){
        $batch = batchInfo::all()->max('id');
        return response()->json([
            $batch
        ]);
    }

    public function getInformation(){

        $information = inputInfo::all();
        return response()->json([
            $information
        ]);

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\batchInfo;
use Illuminate\Routing\Redirector;
use App\Done;
use App\inputInfo;

class newBatchController extends Controller
{
    public function newBatch(){

        $batchNew = new batchInfo;
        $batchNew->save();
        $done = new Done();
        $done->batch_id = $batchNew->id;
        $done->save();
        $input = new inputInfo();
        $input->batch_id = $batchNew->id;
        $input->save();
        return redirect()->route('home');

    }
    public function editBatch(Request $request){
        $batch = batchInfo::all()->last();
        $validatedData = $request->validate([
            'name' => 'sometimes|string|nullable',
            'temperature' => 'sometimes|numeric|nullable',
            'email' => 'sometimes|email|nullable',
        ]);
        if(!is_null($request->name)){
            $batch->name = $request->name;
        }
        if(!is_null($request->temperature)){
            $batch->tempSet = $request->temperature;
        }
        if(!is_null($request->email)){
            $batch->email = $request->email;
        }
        $batch->save();
        return redirect()->route('home');

    }
}

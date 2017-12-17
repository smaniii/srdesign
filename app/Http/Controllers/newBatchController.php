<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\batchInfo;
use Illuminate\Routing\Redirector;

class newBatchController extends Controller
{
    public function newBatch(){

        $batchNew = new batchInfo;
        $batchNew->save();
        return redirect()->route('home');

    }
    public function editBatch(Request $request){
        $batch = batchInfo::all()->last();
        $validatedData = $request->validate([
            'name' => 'sometimes|string',
            'temperature' => 'sometimes|numeric',
        ]);
        if(!is_null($request->name)){
            $batch->name = $request->name;
        }
        if(!is_null($request->temperature)){
            $batch->tempSet = $request->temperature;
        }
        $batch->save();
        return redirect()->route('home');

    }
}

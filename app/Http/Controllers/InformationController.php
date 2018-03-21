<?php

namespace App\Http\Controllers;

use App\Done;
use Illuminate\Http\Request;
use App\inputInfo;
use App\batchInfo;
use Illuminate\Support\Facades\Mail;

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
        $batch = batchInfo::all()->last();
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

    public function finish(){
        $title = "Fermintation Notification";
        $content = "Batch Done";

        $done = Done::all()->last();
        $done->done = 1;
        $done->save();

        Mail::send('emails.finish', ['title' => $title, 'content' => $content], function ($message)
        {
            $batch = batchInfo::all()->last();

            $message->from('officialteamucf@gmail.com', 'Seth Levine');

            $message->to($batch->email);

        });

        return response()->json(['message' => 'Request completed']);
    }

    public function now(){
        $info = [];
        $info['current_batch'] = batchInfo::all()->last();
        $info['current_information'] = inputInfo::all()->last();
        $info['is_done'] = Done::all()->last();
        $info['hours_diff']= $info['current_batch']->created_at->diffInHours($info['current_information']->where('batch_id',$info['current_batch']->id)->get()->last()->created_at);
        return response()->json($info,200);
    }

}

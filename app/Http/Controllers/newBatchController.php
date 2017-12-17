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
}

<?php

use Illuminate\Database\Seeder;
use App\batchInfo;
use App\inputInfo;
use App\Done;

class getStarted extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $batch = new batchInfo();
        $batch->save();
        $input = new inputInfo();
        $input->batch_id = $batch->id;
        $input->save();
        $done = new Done();
        $done->batch_id = $batch->id;
        $done->save();

    }
}

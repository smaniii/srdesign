<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Done extends Model
{
    protected $table = 'done';

    protected $fillable = ['batch_id', 'done',
        'runTime'];
}

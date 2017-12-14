<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inputInfo extends Model
{
    protected $table = 'input';

    protected $fillable = ['tempInside','tempOutside','pressure',
        'PH', 'created_at', 'updated_at', 'batch_id'];
}

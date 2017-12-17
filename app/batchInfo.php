<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class batchInfo extends Model
{
    protected $table = 'batch';

    protected $fillable = ['name', 'created_at',
        'updated_at', 'id','tempSet'];
}

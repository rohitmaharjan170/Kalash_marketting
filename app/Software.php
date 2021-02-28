<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $fillable = [
        'sol_name', 'sof_description','sof_status'
    ];

    public $timestamps = false;
}

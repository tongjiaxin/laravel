<?php

namespace App\Model;
use  App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
//use Illuminate\Database\Seeder;


class Record extends Model
{
    protected $table = 'bonus_record';
    public $timestamps = false;
}

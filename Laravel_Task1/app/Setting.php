<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $table = 'settings';
    protected $fillable = array('name', 'email', 'keywords', 'desc' ,'main_message','maintenance');
}

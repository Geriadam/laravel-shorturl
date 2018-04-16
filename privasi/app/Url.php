<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
	protected $primaryKey = 'id_url';
    protected $table = 'url';
	public $timestamps = false;
}

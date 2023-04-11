<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wmethod extends Model
{
	protected $fillable = array('name', 'minamo', 'maxamo', 'fixed_charge',
	'percent_charge', 'rate', 'val1', 'val2', 'status');
	
	public function withdraw()
    {
        return $this->hasMany('App\Withdraw', 'id', 'wmethod_id');
    }
}

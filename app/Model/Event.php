<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Event extends Model {

protected $table    = 'events';
protected $fillable = [
		'id',
		'admin_id',
		'title',
		'des',
		'date',
		'time',
		'img',
		'created_at',
		'updated_at',
	];

	public function Checks()
	{
		return $this->hasMany('App\Model\EventCheck', 'event_id');
	}

	public function Checked()
	{
		$ip =$this->getUserIP();
		$id =$this->id;
		$Checked = $this->whereHas('Checks', function ($q) use($ip , $id) {
			$q->where('event_id', $id)->where('ip', $ip);
		})->get();
		if(count($Checked) != 0 ){
			return true;
		}else{
			return false;
		}
	}


	function getUserIP()
    {
        // Get real visitor IP behind CloudFlare network
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
                $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
                $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        }
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

	
}

<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Clients extends Model {

protected $table    = 'clients';
protected $fillable = [
		'id',
		'name',
		'email',
		'phone',
		'city',
		'country',
		'address',
		// 'subject',
		'link',
		'type',
		'pro_id',
		'price',
		'count',
		'course_id',
		'group_id',
		'created_at',
		'updated_at',
	];
	
	
	public function Product()
	{
		return $this->belongsTo('App\Model\Product', 'pro_id');
	}

}

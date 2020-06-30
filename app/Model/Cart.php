<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Cart extends Model {

protected $table    = 'carts';
protected $fillable = [
		'id',
		'product_id',
		'price',
		'count',
		'ip',
	];
	
	public function Product(){
		return $this->belongsTo(\App\Model\Product::class,'product_id'	,'id');
 	}

	
}

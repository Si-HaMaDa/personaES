<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Product extends Model {

	use SoftDeletes;
	protected $dates = ['deleted_at'];

protected $table    = 'products';
protected $fillable = [
		'id',
		'admin_id',
'title',
'img',
'min_des',
'des',
'piece_price',
'category_id',
'type',
'prices',
'pdf_files',
'features_workplace_img',
'features_workplace_des',
'examine_memorable_pdf',
'examine_memorable_des',
		'created_at',
		'updated_at',
		'deleted_at',
	];

   public function Category(){
      return $this->belongsTo(\App\Model\Category::class,'category_id'	,'id');
	 }
	 

	 public function Cart()
	 {
		 return $this->hasMany('App\Model\Cart', 'product_id');
	 }
	 
	 
	 public function Checked()
	 {
		 $ip =$this->getUserIP();
		 $id =$this->id;
		 $Cart = $this->whereHas('Cart', function ($q) use($ip , $id) {
			 $q->where('product_id', $id)->where('ip', $ip);
		 })->get();
		 if(count($Cart) != 0 ){
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

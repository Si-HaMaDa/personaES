<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class ExpertsIn extends Model {

protected $table    = 'experts_ins';
protected $fillable = [
		'id',
		'admin_id',
		      'title',
'description',
'photo',
		'created_at',
		'updated_at',
	];

}

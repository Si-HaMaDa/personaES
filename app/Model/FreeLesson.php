<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class FreeLesson extends Model {

protected $table    = 'free_lessons';
protected $fillable = [
		'id',
		'admin_id',
		      'titel',
'v_url',
'des',
		'created_at',
		'updated_at',
	];

}

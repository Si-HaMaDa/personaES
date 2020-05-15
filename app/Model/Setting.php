<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model {
	protected $table    = 'settings';
	protected $fillable = [
		'sitename_ar',
		'sitename_en',
		'sitename_fr',
		'email',
		'logo',
		'icon',
		'system_status',
		'system_message',
		'address',
		'phone',
		'discover_me_titel',
		'discover_me_des',
		'discover_me_video',
		'trainees',
		'lectures',
		'events',
		'company',
		'personal_information',
		'facebook',
		'twitter',
		'instagram',
		'linkedin',
		'youtube',
		'home_photo',
		'event_photo',
		'about_video',
		'our_courses_photo',
		'privacy_policy',
		'refund_policy',
	];

}


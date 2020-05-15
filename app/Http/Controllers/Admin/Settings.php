<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Model\Setting;
use Illuminate\Http\Request;

class Settings extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('admin.settings', ['title' => trans('admin.settings')]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rules = [
			'sitename_ar'    => 'required',
			// 'sitename_en'    => 'required',
			// 'sitename_fr'    => 'required',
			'email'          => 'required',
			'logo'           => 'sometimes|nullable|'.it()->image(),
			'icon'           => 'sometimes|nullable|'.it()->image(),
			'system_status'  => '',
			'system_message' => '',
			'address' => '',
			'phone' => '',
			'discover_me_titel' => '',
			'discover_me_des' => '',
			'discover_me_video' => '',
			'trainees' => '',
			'lectures' => '',
			'events' => '',
			'company' => '',
			'personal_information' => '',
			'facebook' => '',
			'twitter' => '',
			'instagram' => '',
			'linkedin' => '',
			'youtube' => '',
			'privacy_policy' => '',
			'refund_policy' => '',
			'home_photo'=> 'sometimes|nullable|'.it()->image(),
'event_photo'=> 'sometimes|nullable|'.it()->image(),
'about_video'=> 'sometimes|nullable|'.it()->video(),
'our_courses_photo'=> 'sometimes|nullable|'.it()->image(),
		];
		

		$data = $this->validate(request(), $rules, [], [
				'sitename_ar'    => trans('admin.sitename_ar'),
				// 'sitename_en'    => trans('admin.sitename_en'),
				// 'sitename_fr'    => trans('admin.sitename_fr'),
				'email'          => trans('admin.email'),
				'logo'           => trans('admin.logo'),
				'icon'           => trans('admin.icon'),
				'system_status'  => trans('admin.system_status'),
				'system_message' => trans('admin.system_message'),
			]);
		if (request()->hasFile('logo')) {
			$data['logo'] = it()->upload('logo', 'setting');
		}
		if (request()->hasFile('icon')) {
			$data['icon'] = it()->upload('icon', 'setting');
		}
		if (request()->hasFile('home_photo')) {
			$data['home_photo'] = it()->upload('home_photo', 'setting');
		}
		if (request()->hasFile('event_photo')) {
			$data['event_photo'] = it()->upload('event_photo', 'setting');
		}
		if (request()->hasFile('our_courses_photo')) {
			$data['our_courses_photo'] = it()->upload('our_courses_photo', 'setting');
		}

		if (request()->hasFile('about_video')) {
			$data['about_video'] = it()->upload('about_video', 'setting');
		}
		
		Setting::orderBy('id', 'desc')->update($data);
		session()->flash('success', trans('admin.updated'));
		return redirect(aurl('settings'));

	}

}

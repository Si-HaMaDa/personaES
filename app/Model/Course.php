<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

// Auto Models By Baboon Script
// Baboon Maker has been Created And Developed By  [It V 1.2 | https://it.phpanonymous.com]
// Copyright Reserved  [It V 1.2 | https://it.phpanonymous.com]
class Course extends Model {

protected $table    = 'courses';
protected $fillable = [
		'id',
		'admin_id',
		      'titel',
'des',
'mini_des',
// 'price',
// 'sessions',
// 'duration_num',
// 'duration_dis',



// 'strat_at',
// 'attends',
'photo',

// 'time',
		'created_at',
		'updated_at',
	];

		public function Clients()
    {
    	return $this->hasMany('App\Model\Clients', 'course_id')->where('type', '=', 'courses');
		}

		public function GetGroupByDate()
    {
			$now = Carbon::now();
			if($this->Groups->count() > 0 ){
					$Groups = [];
					foreach ($this->Groups as $key => $Group) {
							if($Group->strat_at > $now  && count($Group->Clients) != $Group->attends){
								$Groups[] = $Group;
							}
					}
			}
			if(count($Groups) == 0){
				return false;
			}
			$Group = collect($Groups)->sortBy('strat_at')->first();
			return $Group;
		}

		
		public function Groups()
    {
    	return $this->hasMany('App\Model\CoursesGroup', 'course_id');
		}
		
}


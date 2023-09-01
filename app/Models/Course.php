<?php

namespace App\Models;

use App\Models\SectionCourse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'descriptoin', 'price', 'photo', 'old_price'];

    protected $appends = ['image'];

    protected function getImageAttribute()
    {
        return $this->image =  asset('assets/dashboard/upload') . '/' . $this->photo;
    }

    ############# Star Relations ############

    public function usersBuyCourse()
    {
        return $this->hasMany(UserBuyCourse::class, 'course_id', 'id');
    }

    ############# End Relations ############

    ############# Star Relations ############

    public function Sections()
    {
        return $this->hasMany(SectionCourse::class, 'course_id', 'id');
    }

    ############# End Relations ############


    public static function isUserBuyCourse($course_id)
    {
        $isuserBuyCourse = UserBuyCourse::where(['course_id' => $course_id, 'user_id' => Auth::id()])->get();

        if (count($isuserBuyCourse) == 0) {
            return false;
        } 

        return true;
    }
}

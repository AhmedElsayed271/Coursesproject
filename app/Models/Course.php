<?php

namespace App\Models;

use App\Models\SectionCourse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name','descriptoin','price','photo','old_price'];

    protected $appends = ['image'];

    protected function getImageAttribute()
    {
        return $this->image =  asset('assets/dashboard/upload') . '/' . $this->photo;
    }

    ############# Star Relations ############

    public function Sections()
    {
        return $this->hasMany(SectionCourse::class,'course_id','id');
    }

    ############# End Relations ############
}

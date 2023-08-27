<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionCourse extends Model
{
    use HasFactory;
    
    protected $fillable = ['name' , 'section_no' , 'course_id'];

    public function videos()
    {
        return $this->hasMany(VideoCourse::class,'section_course_id','id');
    }
    
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

}

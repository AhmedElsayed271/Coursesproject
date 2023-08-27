<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'course_id', 'price', 'currency', 'payment_method', 'payment_type','transaction_id','order_id','status','buyBy'];


    ########## Relationship ##########

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id','id');
    }

    ########## Relationship ##########
}

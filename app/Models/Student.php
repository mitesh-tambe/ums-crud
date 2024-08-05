<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'class', 'admission_date', 'fees', 'status', 'gender', 'class_teacher_id', 'status'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'class_teacher_id');
    }

}

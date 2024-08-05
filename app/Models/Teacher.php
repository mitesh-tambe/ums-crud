<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'gender', 'status'];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_teacher_id');
    }
}

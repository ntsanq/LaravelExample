<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'dob',
        'gender'
    ];

    public $timestamps = true;

    protected function age(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                $date = new \DateTime($attributes['dob']);
                $now = new \DateTime();

                return $now->diff($date)->y;
            }
        );
    }

    protected function gender(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return ($attributes['gender'] === 1) ? 'Male' : 'Female' ;
            }
        );
    }
//    protected $table = 'sinh_vien';
}

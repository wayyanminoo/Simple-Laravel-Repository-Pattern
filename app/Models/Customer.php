<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    //this following table name must be same with phpMyAdmin's table name.
    //protected $table = "customers";

    protected $fillable = ['name','gender','email','address','phone','dob'];
}

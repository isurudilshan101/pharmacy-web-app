<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewUser extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address', 'contact_no', 'dob', 'password','re-password'];
}
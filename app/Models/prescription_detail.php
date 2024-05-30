<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class prescription_detail extends Model
// {
//     use HasFactory;
// }


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prescription_detail extends Model
{
    use HasFactory;

    protected $table = 'prescription_details';

    protected $fillable = [
        'image',
        'user_id',
        'note',
        'deliver_address',
        'deliver_time_slot',
    ];
}

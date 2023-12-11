<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeniorCitizen extends Model
{   
    protected $guarded = []; // $guarded allow to manipulate all data in the students database/table

    use HasFactory;
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PostEnquiry extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'property_title', 'email', 'phone_no', 'message', 'contact_page'];

}

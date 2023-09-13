<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Availability;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'property_details',
        'property_type', 'price',
        'location', 'image',
        'agent_name','agent_no',
        'status', 'in_featured',
        'in_recommended', 'in_hot'
    ];

    public function availability()
    {
        return $this->hasOne(Availability::class);
    }
}

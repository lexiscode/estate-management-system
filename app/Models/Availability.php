<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Availability extends Model
{
    use HasFactory;

    protected $fillable = [
        'bedroom','livingroom','parking',
        'kitchen','waitingroom','studyroom',
        'storeroom','laundryroom','bathroom',
        'diningroom','balcony','guestroom',
        'closets','pantry',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}

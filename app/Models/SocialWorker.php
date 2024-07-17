<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialWorker extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'age',
        'gender',
        'years_of_service',
    ];

    // Define the relationship with RescueCase
    public function rescueCases()
    {
        return $this->hasMany(RescueCase::class, 'assigned_social_worker_id');
    }
}

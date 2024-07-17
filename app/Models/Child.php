<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'address',
        'contact_number',
        'medical_history',
        'assigned_social_worker_id',
        'rescue_case_id',
    ];

    /**
     * Get the social worker assigned to the child.
     */
    public function assignedSocialWorker()
    {
        return $this->belongsTo(SocialWorker::class, 'assigned_social_worker_id');
    }

    /**
     * Get the rescue case the child is associated with.
     */
    public function rescueCase()
    {
        return $this->belongsTo(RescueCase::class, 'rescue_case_id');
    }
}

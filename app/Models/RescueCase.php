<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SocialWorker;

class RescueCase extends Model
{
    use HasFactory;
     // Specify the table if not using plural form
     protected $table = 'rescue_cases'; // Optional

     // Define fillable attributes
     protected $fillable = [
         'case_title',
         'rescue_date',
         'location',
         'description',
         'assigned_social_worker_id',
     ];
 
     // Define relationships if needed
     public function socialWorker()
     {
         return $this->belongsTo(SocialWorker::class, 'assigned_social_worker_id');
     }
}

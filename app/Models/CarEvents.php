<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEvents extends Model
{
    use HasFactory;

    protected $fillable = ['event_name','event_date','venue','ticket_price','user_id'];


      // Relationship to User
      public function user() {

        return $this->belongsTo(User::class, 'user_id');
    }
}

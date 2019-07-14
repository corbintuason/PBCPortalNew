<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Agency;
use App\DonationList;
use App\MBDDonation;

class MBD extends Model
{
     // Primary Key 
     public $primaryKey = "id";
     // Event Name
     protected $table = "mbds";
     // Primary Key 
     public $timestamps = true;
     
     protected $fillable =[
     'name', 'start_date', 'end_date', 'category', 'agency_id'
     ];

     public function agency(){
          return $this->belongsTo(Agency::class);
     }
     public function mbd_donations(){
          return $this->hasMany(MBDDonation::class, 'mbd_id');
     }
}

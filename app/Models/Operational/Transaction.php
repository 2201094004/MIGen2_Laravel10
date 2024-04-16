<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    //use HasFactory;
    use SoftDeletes; 
    //deklarasi tabel 
    public $table = 'transaction'; 
    //tipe data harus yyyy-mm-dd hh:mm:ss 
    protected $dates = [ 
        'created_at', 
        'updated_at', 
        'deleted_at' 
    ]; 

    protected $fillable = [ 
        'appointment_id', 
        'fee_doctor', 
        'fee_specialist', 
        'fee_hospital', 
        'sub_total', 
        'vat', 
        'total', 
        'created_at', 
        'updated_at', 
        'deleted_at' 
    ]; 

    //one to many 
    public function appointment() { 
        return $this->belongsTo('App\Models\Operational\Appointment' , 
        'appointment_id', 'id'); 
    } 
}

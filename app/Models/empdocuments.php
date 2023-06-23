<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class empdocuments extends Model
{
    use HasFactory;
    protected $table='empdocuments';
    protected $fillable =[
        'name',
        'worker_id',
    ];
    public function createdby(){
        return $this->belongsTo(empdocuments::class,'worker_id');
    }
}

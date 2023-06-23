<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Queue\Worker;

class employee extends Model
{
    use HasFactory;
    protected $table="employee";
   
    protected $fillable=['name','address','status','dob'];
    protected $dates=['dob'];
    // protected $casts = [ 'expired_at'=>'datetime'];

    public function createdby(){
        return $this->hasOne(worker::class,'created_id');
    }

}

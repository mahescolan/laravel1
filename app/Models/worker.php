<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class worker extends Model
{
    use HasFactory;
    protected $table = 'worker';
    protected $fillable =[
        'name',
        'address',
        'created_id',
    ];
    public function worker (){
        return $this->hasOne(worker::class,'created_id');
    }
    public function worker2(){
        return $this->hasMany(worker::class,'created_id');
    }
}

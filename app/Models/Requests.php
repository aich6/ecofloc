<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;
    protected $guarded = []; 


    protected $casts = [
        'Products' => 'array'
    ];



    public function User(){
        return $this->belongsTo(User::class);
    }
}

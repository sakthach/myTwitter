<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class tweet extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
}

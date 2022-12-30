<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model{

    protected $fillable = ['clan_id', 'user_id', 'application'];

    public function user(){
        $user = User::where('id', $this->user_id)->first();
        return $user;
    }
}

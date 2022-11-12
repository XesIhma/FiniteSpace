<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profiles(){
        return Profile::where('user_id', $this->id)->get();
    }
    
    public function clan(){
        if (Clan::where('id', $this->clan_id)->first()){
            return Clan::where('id', $this->clan_id)->first()->name;}
        
        return "[brak]";
    }

    public function isInCouncil(){
        $clan = Clan::where('id', $this->clan_id)->first();
        if($clan){
            $clan->user_id;
            if ($this->id == $clan->user_id) return true;
            return false;
        }
        return false;
    }

    public function rank(){
        $rank = Rank::where('id', $this->rank_id)->first();
        return $rank;
    }

}

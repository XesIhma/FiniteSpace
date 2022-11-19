<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Ship;

class Clan extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tag', 'user_id', 'default_rank'];

    public function numberOfMembers(){
        $number = User::where('clan_id', $this->id)->count();
        return $number;
    }
    public function spaceStationImage(){
        $station = Ship::where('clan_id', $this->id)->first();
        if($station) $station->image;
        return 'ships/default.jpg';
    }
    public function founder(){
        return User::where('id', $this->user_id)->first()->name;
    }

    public function addUser($user){
        $user->clan_id = $this->id;
                $user->rank_id = Rank::where([
                    ['clan_id', '=', $this->id],
                    ['default_rank', '=', '1']])->first()->id;
                $user->save();
                return view('/clan', ['clan' => $this])->with('success', "Witamy w klanie $this->name!");
    }

}

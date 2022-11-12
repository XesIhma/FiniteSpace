<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    protected $fillable = ['clan_id', 'name', 'accept_applications', 'send_invitations', 'remove_users', 'modify_text', 'forum_moderator', 'base_expansion', 'fleet_construction', 'refueling', 'repair', '	using_factories', 'talker'];
}

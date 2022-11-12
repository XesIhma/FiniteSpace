<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clan;
use App\Models\User;
use App\Models\Application;
use App\Models\Rank;

class ClanController extends Controller
{
    function show(){
        $clan = Clan::where('id',  auth()->user()->clan_id)->first();
        if ($clan) return view('clan', ['clan' => $clan]);
        else {
            $clans = Clan::all(); 
            foreach($clans as $clan){
                $appliedTo = Application::where([
                    ['clan_id', '=', $clan->id],
                    ['user_id', '=',  auth()->user()->id]])->get();
                    //dump($appliedTo[0]);

                if (isset($appliedTo[0])) $clan->apply = 4;
            }
            //die();
            return view('noclan', ['clans' => $clans]);
            
        }
    }

    function createClan(Request $request){
        $request->validate([
            'name' => 'required | min: 5 | max: 18',
            'tag' => 'required | min: 3 | max: 7'
        ]);


        $user = auth()->user();
        if($user->premium >= 50){
            $clan = Clan::create([
                'name' => $request->name,
                'tag' => $request->tag,
                'user_id' => $user->id
            ]);

            $rank = Rank::create([
                'clan_id' => $clan->id,
                'name' => 'Założyciel',
                'accept_applications' => 1,
                'send_invitations' => 1,
                'remove_users' => 1,
                'change_rank' => 1,
                'modify_text' => 1,
                'base_expansion' => 1,
                'fleet_construction' => 1
            ]);
            $rank = Rank::create([
                'clan_id' => $clan->id,
                'name' => 'Kadet',
                'default' => 1,
            ]);

            $user->premium = $user->premium - 50;
            $user->clan_id = $clan->id;
            $user->save();

            return view('clan', ['clan' => $clan])->with('success', 'Udało Ci się stworzyć klan!');
        }
        else return back()->with('error', "Masz za mało PP");
    }

    function apply(Request $request){
        $clan = Clan::find($request->input('clan_id'));
        $user = auth()->user();
        if($clan->numberOfMembers() < $clan->members_limit){
            if($clan->apply === 2){
                $user->clan_id = $clan->id;
                $user->rank_id = Rank::where([
                    ['clan_id', '=', $clan->id],
                    ['default_rank', '=', '1']])->first()->id;
                $user->save();
                return view('/clan', ['clan' => $clan])->with('success', "Witamy w klanie $clan->name!");
            }
            elseif($clan->apply === 1){
                return view('/apply', ['clan' => $clan]);
            }
            else return back()->with('error', "Nie da się dołączy ćdo tego klanu");
        }
        else return back()->with('error', "Ten klan ma już maksymalną ilość członków");
    }

    function applicationForm(Request $request){
        $user = auth()->user();

        $request->validate([
            'application' => 'required | min: 1',
        ]);
        $application = Application::create([
            'clan_id' => $request->clan_id,
            'user_id' => $user->id,
            'application' => $request->application
        ]);
        $clans = Clan::all(); 
        return view('noclan', ['clans' => $clans])->with('success', "Udało Ci się skutecznie wysłać zgłoszenie!");
    }

    function manage(Request $request){
        $clan = Clan::where('id',  auth()->user()->clan_id)->first();
        if ($clan) return view('clanmanage', ['clan' => $clan]);
    }

    function hr(Request $request){
        $clan = Clan::where('id',  auth()->user()->clan_id)->first();
        $applications = Application::where([
            ['clan_id', '=', $clan->id],
            ['user_id', '=',  auth()->user()->id]])->get();
        $members = User::where('clan_id', $clan->id)->get();

        return view('hr', [
            'applications' => $applications, 
            'clan' => $clan,
            'members' => $members]);
    }
}

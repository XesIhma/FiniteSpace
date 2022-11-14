<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clan;
use App\Models\User;
use App\Models\Application;
use App\Models\Rank;
use App\Models\Invitation;

class ClanController extends Controller
{
    function show(){
        $user = auth()->user();
        $clan = Clan::where('id',  $user->clan_id)->first();
        if ($clan) return view('clan', ['clan' => $clan]);
        else {
            $clans = Clan::all(); 
            foreach($clans as $clan){
                $appliedTo = Application::where([
                    ['clan_id', '=', $clan->id],
                    ['user_id', '=',  $user->id],
                    ['status', '=',  '0']])->get();
                    //dump($appliedTo[0]);

                if (isset($appliedTo[0])) $clan->apply = 4;
            }
            $invitations = Invitation::where('user_id', '=',  $user->id)->get();
            //die();
            return view('noclan', ['clans' => $clans, 'invitations' => $invitations]);
            
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
                'name' => 'Kadet',
                'default_rank' => 1,
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

            $user->premium = $user->premium - 50;
            $user->clan_id = $clan->id;
            $user->rank_id = $rank->id;
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
                $clan->addUser($user);
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

    function accept(Request $request){
        $user = User::where('id',  $request->user_id)->first();
        $clan = Clan::where('id',  auth()->user()->clan_id)->first();
        $application = Application::where([
            ['clan_id', '=', $clan->id],
            ['user_id', '=',  $request->user_id]])->first();
        if($application){
            if($request->positive){
                $application->status = 1;
                $application->save();
                $clan->addUser($user);
                return back()->with('success', "Przyjąłeś nowego członka");
            }
            $application->status = 1;
            $application->save();
            return back();
        }
    }

    function manage(Request $request){
        $clan = Clan::where('id',  auth()->user()->clan_id)->first();
        if ($clan) return view('clanmanage', ['clan' => $clan]);
    }

    function hr(Request $request){
        $clan = Clan::where('id',  auth()->user()->clan_id)->first();
        $applications = $application = Application::where([
            ['clan_id', '=', $clan->id],
            ['status', '=',  '0']])->get();

        //dd($applications);
        $members = User::where('clan_id', $clan->id)->get();

        return view('hr', [
            'applications' => $applications, 
            'clan' => $clan,
            'members' => $members]);
    }

    function change_way_of_joining(Request $request){
        $clan = Clan::where('id',  auth()->user()->clan_id)->first();
        if(auth()->user()->rank()->accept_applications){
            $clan->apply = $request->input('option');
            $clan->save();
            return back()->with('success', "Zmieniłeś ustawienia plemienne");
        }
        return back()->with('error', "Nie masz uprawnień");
    }

    function invite(Request $request){
        $user = User::where('name', $request->login)->first();
        $clan = Clan::where('id',  auth()->user()->clan_id)->first();
        if($user){
            $invitation = Invitation::create([
                'clan_id' => $clan->id,
                'user_id' => $user->id,
            ]);
            $invitation->save();
            return back()->with('success', "Zaprosiłeś gracza");
        }
        return back()->with('error', "Nie ma takiego gracza");
    }

    function acceptInvitation(Request $request){
        $user = auth()->user();
        $clan = Clan::where('id', $request->clan_id)->first();
        $invitation = Invitation::where([
            ['clan_id', '=', $clan->id],
            ['user_id', '=',  $user->id]])->first();
        if($invitation){
            if($request->positive){
                $invitation->status = 1;
                $invitation->save();
                $clan->addUser($user);
                return back()->with('success', "Dołączyłeś do klanu");
            }
            $invitation->status = 1;
            $invitation->save();
            return back();
        }
    }
}

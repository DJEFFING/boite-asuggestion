<?php

namespace App\Http\Controllers\web;


use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Suggestion;
use \App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserWebController extends Controller
{
    public function profil(){
        $user=Auth::user();
        $suggestions=Suggestion::where('user_id', $user->id)->latest()->get();
        $notifications=Notification::where('user_id', $user->id)->latest()->get();
        return view('view_site.user.profil',['user'=> $user, 'suggestions'=> $suggestions, 'notifications'=>$notifications]);

    }

    public function updateProfile(User $user,Request $request){
        $request->validate([
            'pseudo' => 'required|string|max:255',
            // 'password' => 'required|string|min:8|confirmed',
        ]);
        $user->pseudo = $request->input('pseudo');
        $newUser = [
            "pseudo"=> $request->pseudo
        ];
        $user->update($newUser);


        return redirect()->back()->with('message','vous informations ont été modifiées avec succes');
    }
}

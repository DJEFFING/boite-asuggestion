<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Suggestion;
use \App\Models\Notification;
use App\Models\User;
// use Illuminate\Support\Facades\Auth::user;
use Illuminate\Support\Facades\Auth;


class AcceuilWebController extends Controller
{
    public function acceuil(){
        $suggestions = Suggestion::join('users','users.id','=','suggestions.user_id')->where('status','0')->select('users.pseudo','suggestions.*')->latest()->paginate(15);
        $categories = Categorie::all();
        // $suggestions=Suggestion::where('suggestion_id', $id)->get();
        // $commentaires=Commentaire::where('suggestion_id', $id)->get();
        // dd($suggestions);
        $notifications = Notification::where('user_id', Auth::id())->get();
        return view('view_site.acceuill',['categories'=>$categories,'notifications'=>$notifications, 'suggestions'=>$suggestions]);
    }


    public function profil(){
        $user=Auth::user();
        $suggestions=Suggestion::where('user_id', $user->id)->get();
        $notifications=Notification::where('user_id', $user->id)->get();

        return view('view_site.user.profil',['user'=> $user, 'suggestions'=> $suggestions, 'notifications'=>$notifications]);

    }

    public function commentaire(){
        return view('view_site.commentaire');
    }

}

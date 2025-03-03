<?php

namespace App\Http\Controllers\admin;

use App\Models\Aprove;
use App\Models\Suggestion;
use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\UserRole;
use App\Http\Controllers\Controller;
use App\Models\NotificationAdmin;
use App\Models\User;

class AdminAcceuil extends Controller
{
    public function index(){
        

        $nbruser = User::count();
        $nbrsug = Suggestion::count();
        $nbrap = Aprove::count();
        $nbrpriv = Suggestion::where("status",1)->count();
        $suggestions = Suggestion::all()->last()->get();
        $adminNotification = NotificationAdmin::all();

        return view('view_admin.acceuil', [
            'nbruser'=> $nbruser,
            'nbrsug'=> $nbrsug,
            'nbrap'=> $nbrap,
            'nbrpriv'=> $nbrpriv,
            'suggestions' => $suggestions,
            'adminNotification '=>$adminNotification
    ]);
    }
}

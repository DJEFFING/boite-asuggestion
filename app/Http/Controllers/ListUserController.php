<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use App\Models\User;
use Illuminate\Http\Request;

class ListUserController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        $listUser = [];
        foreach($users as $user){

            $userSuggestionCount =[
                "id" =>$user->id,
                "created_date" => $user->created_at->format('Y-m-d'),
                "username" => $user->pseudo,
                "suggestionCount" =>$this->findCountSeggestion($user)
            ];

            $listUser[] = $userSuggestionCount;
        }
        return view('view_admin.user.list_user.user.index',compact('listUser'),);
    }

    public function findCountSeggestion($user){
        return Suggestion::where('user_id',$user->id)->count();
    }

    public function userDetaill(User $user){
        $listSuggestion = Suggestion::where("user_id",$user->id)->latest()->get();
        return view('view_admin.user.list_user.user_detail.userDetaill',["user" => $user ],compact('listSuggestion'));
    }
}

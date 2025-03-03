<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\likes;
use App\Models\UserRole;
use App\Models\Categorie;
use App\Models\Suggestion;
use Illuminate\Support\Str;
use App\Models\Notification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ListUserController extends Controller
{
    public function index(){
        $users = User::latest()->get();
        return view('view_admin.user.list_user.user.index',compact('users'));
    }

    public function findCountSeggestion($user){
        return Suggestion::where('user_id',$user->id)->count();
    }

    public function userDetaill(User $user, Request $request){

        $categories = Categorie :: all();
        $categorieId = $request->input('categorie_id');
        if ($categorieId) {
            // Filtrer les suggestions par catégorie
            $query = Suggestion::where('categorie_id', $categorieId)->where("user_id",$user->id)->orderBy('created_at','desc')->paginate(10);
        } else {
            $query = Suggestion::where("user_id",$user->id)->latest()->paginate(10);
        }

        $listSuggestion = $query;
        // Vérifier si aucune suggestion n'a été trouvée
        $noResults = $listSuggestion->count() === 0;
        return view('view_admin.user.list_user.user.userDetaill',["user" => $user ],compact('listSuggestion','categories','noResults'));
    }

    public function delete(User $user){
        $user->delete();
        return redirect()->back()->with('message','utilisateur supprimmer avec success !!');
    }


    public function listUserAdmin(){
        $admins = User::whereHas('roles',function($query){
            $query->where('titre','admin');
        })->get();
        return view('view_admin.user.list_user.user_admin.show_liste',compact('admins'));
    }

    public function createAdmin(User $user)
    {

        UserRole::create([
          'user_id'=>$user->id,
          'role_id'=>1
        ]);
        return redirect()->back()->with('message', "l'utilisateur".$user->pseudo."est désormet administrateur");
    }

    public function deleteAdmin(User $user){

        if(!($user->id == Auth::id())){
            $userRole = UserRole::where('user_id',$user->id);
            $userRole->delete();
            return redirect()->back()->with('message', "l'utilisateur ".$user->pseudo." est n'est plus administrateur");
        }
        return redirect()->back()->with('message', "vous ne pouvez pas vous enlevez le role administateur");

    }

    public function notifyUser(Request $request, User $user){
        $id = $user->id;
        Notification::create([
            'description'=> $request->description,
            'user_id'=> $id
        ]);
        return redirect()->back()->with(['message'=>'Notification envoye ']);
    }
}

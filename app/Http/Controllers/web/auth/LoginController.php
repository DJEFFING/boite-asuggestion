<?php

namespace App\Http\Controllers\web\auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function loginPage(){
        if(auth()->check()){
            return redirect('/');
        }
        return view('view_site.user.addtionnal_Page.login')->with('message','connetez-vous');
    }

    public function login(LoginRequest $loginRequest)
    {


        $credentials = $loginRequest->getCredentials();
        $remenber = $loginRequest->get('remenber',false);

        if(!$remenber){
            $remenber = false;
        }

        if(!Auth::validate($credentials,$remenber)) :
            Session::put('error');
            return redirect('/loginPage')->with('error','votre pseudo ou votre mot de passe est incorrect !!');
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);
        Auth::login($user,$remenber);

        Session::forget('error');
        return $this->authenticated();
    }


    protected function authenticated(){
        $pseudo =auth()->user()->pseudo;
        Session::forget('error');
        return redirect('/acceuil')->with('message','bienvennue a vous '. $pseudo);
    }

    public function logout(){
        Auth::logout();
        return redirect('/loginPage')->with('message','vous etes deconnecter');
    }

    public  function registerPage(){
        return view('view_site.user.addtionnal_Page.register');
    }

    public function register(Request $request){
        $request->validate(
            [
                'pseudo'=>'required|min:5|unique:users,pseudo',
                'password' => 'required|min:5|confirmed',
                'password_confirmation' => 'required|min:5'
            ],[
                'pseudo.required'=>'entrez un pseudonyme !!',
                'pseudo.min' =>'le pseudonyme doit avoir au moin 5 caractère !!',
                'pseudo.unique'=> 'ce speudonyme exite déjà',

                'password.required'=> 'le mot de passe est obligatoire',
                'password_confirmation.required'=> 'confirmez votre mot de passe!!',
                'password.min' => 'le mot de passe doit contennir au moin 5 caractère',
                'password.confirmed' => 'les mots de passes ne correspondes pas !!',
                'password_confirmation.min' => 'le mot de passe doit contennir au moin 5 caractère'
        ]);
            // if(!($request->password==$request->password_confirmation)){
            //     Session::put('error');
            //     return redirect()->back()->with('errors','vous les mots de passes ne correspondent pas !!');
            // }
            $user = [
                "pseudo" => $request->pseudo,
                "password" => $request->password
            ];

            $newUser = User::create($user);

            $credentials = [
                "pseudo" =>$newUser->pseudo,
                "password"=>$newUser->password
            ];

            $userAuth = Auth::getProvider()->retrieveByCredentials($credentials);
            Auth::login($userAuth);
            Session::forget('error');

        return $this->authenticated();
    }

public function updateProfile(Request $request)
{
    $user = Auth::user();
    $request->validate([
        'pseudo' => 'required|string|max:255',
        // 'password' => 'required|string|min:8|confirmed',
    ]);
    $user->name = $request->input('pseudo');
    // $user->password = bcrypt($request->input('password'));

    // $user->update();

    return redirect('/profil')->back()->with('message','vous informations ont été modifiées avec succes');
}

}

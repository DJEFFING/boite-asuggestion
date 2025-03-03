<?php
namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use App\Models\Categorie;
use App\Models\Commentaire;
use App\Models\Aprove;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SuggestionAdmin extends Controller
{
    public function privateSuggestion()
    {
        $suggestions = Suggestion::join('users','users.id','=','suggestions.user_id')->select('users.pseudo','suggestions.*')->where('status','1')->latest()->paginate(15);
        $categories = Categorie::all();
        $aprove = [];
        $i = 0;
        foreach ($suggestions as $key => $value) {

           
            if(Aprove::where('suggestion_id',$value->id)->first() == null){
                $aprove[$i] = 0;
            }else{
                $aprove[$i] = 1;
            }
            
            $i++;
        }
        return view('view_admin.suggestion.private_suggestion',[
            'categories'=>$categories,
            'aprove'=> $aprove,
            'suggestions'=>$suggestions
        ]);
    }

    public function allSuggestion()
    {
        $suggestions = Suggestion::join('users','users.id','=','suggestions.user_id')->select('users.pseudo','suggestions.*')->latest()->paginate(15);
        $categories = Categorie::all();
        $aprove = [];
        $i = 0;
        foreach ($suggestions as $key => $value) {

           
            if(Aprove::where('suggestion_id',$value->id)->first() == null){
                $aprove[$i] = 0;
            }else{
                $aprove[$i] = 1;
            }
            
            $i++;
        }
        return view('view_admin.suggestion.all_suggestion',[
            'categories'=>$categories,
            'aprove'=> $aprove,
            'suggestions'=>$suggestions
        ]);
    }

    Public function aprouveSuggestion()
    {
        $suggestions = Suggestion::join('users','users.id','=','suggestions.user_id')->join('aproves','aproves.suggestion_id','=','suggestions.id')->select('aproves.suggestion_id','users.pseudo','suggestions.*')->latest()->paginate(15);
        $categories = Categorie::all();
        // dd($suggestions);
        $aprove = [];
        $i = 0;
        foreach ($suggestions as $key => $value) {

           
            if(Aprove::where('suggestion_id',$value->id)->first() == null){
                $aprove[$i] = 0;
            }else{
                $aprove[$i] = 1;
            }
            
            $i++;
        }
        return view('view_admin.suggestion.validate_suggestion',[
            'categories'=>$categories,
            'aprove'=> $aprove,
            'suggestions'=>$suggestions
        ]);
    }

    public function storeApprouveSuggestion(Request $request)
    {
        $aprouveSuggestion = Aprove::where('suggestion_id',$request->favoris)->first();
        if(empty($aprouveSuggestion))
        {
            $suggestion_aprouve = Aprove::create([
                'suggestion_id'=>$request->favoris,
            ]);
            $message = 'Suggestion aprouvee avec success !!';
        }
        else{
            $this->deleteApprouveSuggestion($aprouveSuggestion);
            $message="Suggestion des aprouvee!!";
        }

        return back()->with('message', $message);
            // 'aprouveSuggestion'=> $aprouveSuggestion;
    }

    public function deleteApprouveSuggestion(Aprove $aprouveSuggestion)
    {
        $aprouveSuggestion->delete();
        // return back();
    }

    public function detail_suggestion($id_suggestion)
    {
        $suggestions = Suggestion::join('users','users.id','=','suggestions.user_id')->find($id_suggestion);
        $commentaires = Commentaire::join('users','users.id','=','commentaires.user_id')->select('users.pseudo','commentaires.*')->where('suggestion_id',$id_suggestion)->get();
        return view('view_admin.suggestion.suggestionDetaill',['suggestion'=>$suggestions, 'commantaires'=>$commentaires]);
    }
}
?>

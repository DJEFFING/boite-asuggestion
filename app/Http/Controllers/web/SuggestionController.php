<?php

namespace App\Http\Controllers\web;

use Carbon\Carbon;
use App\Models\Like;
use App\Models\UserRole;
use App\Models\Categorie;
use App\Models\Suggestion;
use App\Models\Commentaire;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\NotificationAdmin;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class SuggestionController extends Controller
{
    public function index(Request $request)
    {
        $categorieId = $request->input('categorie_id');
        $date = $request->input('date');
        $keyword = $request->input('keyword');

        // Vérifiez si un ID de catégorie est spécifié
        if ($categorieId) {
            // Filtrer les suggestions par catégorie
            $query = Suggestion::where('categorie_id', $categorieId);
        } else {
            $query = Suggestion::query();
        }

        // Filtrer les suggestions par date de création
        if ($date) {
            $startDate = Carbon::parse($date)->startOfMonth();
            $endDate = Carbon::parse($date)->endOfMonth();

            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Filtrer les suggestions par mot-clé
        if ($keyword) {
            $query->where('description', 'like', '%' . $keyword . '%');
        }

        // Filtrer les suggestions publiques uniquement
        $query->where('status', 0);

        // Paginer les résultats
        $suggestions = $query->paginate(10);

        // Vérifier si aucune suggestion n'a été trouvée
        $noResults = $suggestions->count() === 0;

        // Récupérer toutes les catégories
        $categories = Categorie::all();

        // Passer les suggestions, les catégories et le statut "Aucun résultat" à la vue accueil.blade.php
        return view('view_site.acceuill', ['suggestions' => $suggestions, 'categories' => $categories, 'noResults' => $noResults]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'description'=>['required','string','max:255'],
            'object'=>['required','string','max:255','unique:suggestions,object'],
        ]);
        if($request->status == 0){
            $suggestion = Suggestion::create([
             'description'=>$request->description,
             'object'=>$request->object,
             'categorie_id'=>$request->categorie,
             'status'=>$request->status,
             'user_id'=>Auth::id()
            ]);
        }else{

             $suggestion = Suggestion::create([
                 'description'=>$request->description,
                 'object'=>$request->object,
                 'categorie_id'=>$request->categorie,
                 'status'=>$request->status,
                 'vrai_nom'=>$request->vrai_nom,
                 'filiere'=>$request->filiere,
                 'niveau_etude'=>$request->niveau,
                 'specialite'=>$request->specialite,
                 'user_id'=>Auth::id()
             ]);

             if($suggestion->status == 1){
                $user = User::where('id',$suggestion->user_id)->first();
                $message = "Une suggestion privée a été publié par ".$user->speudo;
                NotificationAdmin::create(['description' => $message]);
             }

         }



        return back()->with('message', 'votre suggestion est enregistrer avec success !!');
    }

    public function detail_suggestion(Suggestion $suggestion)
    {
     return view('view_site.suggestion.suggestionDetaill',['suggestion'=>$suggestion]);
    }


    public function like(Suggestion $suggestion)
    {
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $like->suggestion_id = $suggestion->id;
        $like->note_value = $suggestion->likes->count(); // Spécifie une valeur pour note_value
        $like->save();

        return redirect()->back()->with('message','like ajouter');
    }

    public function unlike(Suggestion $suggestion)
    {
        $like = Like::where('user_id', auth()->user()->id)
            ->where('suggestion_id', $suggestion->id)
            ->first();

        if ($like) {
            $like->delete();
        }

        return redirect()->back()->with('message','like retirer !!');
    }

    public function comment(Request $request)
    {
        // dd($request);

        $request->validate([
            'comment_text'=>['required'],
        ]);


           Commentaire::create([
            "user_id" => Auth::id(),
            "suggestion_id" => $request->suggestion_id,
            "comment_text" => $request->comment_text
           ]);


        return back()->with('message', 'votre commentaire a été enregistrer avec success !!');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
{
    /**
     * Affiche la liste de toutes les catégories.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories = Categorie::all();
        return view('view_admin.view_categeorie.liste_categeorie', compact('categories'));
    }

    /**
     * Affiche le formulaire de création d'une nouvelle catégorie.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('view_admin.view_categeorie.create_categeorie');
    }

    /**
     * Enregistre une nouvelle catégorie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        Categorie::create([
            'titre' => $request->input('titre'),
        ]);

        return redirect()-back()->with('success', 'Catégorie créée avec succès.');
    }

    /**
     * Met à jour une catégorie dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->update([
            'titre' => $request->input('titre'),
        ]);

        return redirect()->back()->with('success', 'Catégorie mise à jour avec succès.');
    }

    /**
     * Supprime une catégorie de la base de données.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route("admin.categorie.index")->with('success', 'Catégorie supprimée avec succès.');
    }
}
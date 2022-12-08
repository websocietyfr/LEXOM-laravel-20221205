<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $annonces = Annonce::all();
        $annonces = Annonce::where('name', 'like', '%'.$request->query('search').'%')->get();
        return view('annonces.index', [ 'annonces' => $annonces, 'title' => 'Liste des annonces' ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('annonces.create', [
            'name' => $request->old('name'),
            'description' => $request->old('description'),
            'price' => $request->old('price')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation des données de formulaire
        $request->validate([
            'name' => 'required|max:255',
            'description' => [ 'required' ],
            'price' => [ 'required', 'numeric' ]
        ]);

        // enregistrement des données de formulaire
        // $isStored = DB::insert(
        //     "INSERT INTO annonces (name,description,price,created_at,updated_at) VALUES (:name,:description,:price,NOW(),NOW())", [
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description'),
        //     'price' => $request->input('price')
        // ]);
        try {
            $annonce = new Annonce();
            $annonce->name = $request->input('name');
            $annonce->description = $request->input('description');
            $annonce->price = $request->input('price');
            $isStored = $annonce->save();

            // rediriger l'utilisateur vers une interface lui notifiant la création des données.
            if($isStored) {
                return response()->redirectToRoute('annonce.index');
            }
            return response()->redirectToRoute('annonce.create')->withErrors(['annonce' => 'Erreur lors de l\'enregistrement de votre annonce'])->withInput();
        } catch(\Illuminate\Database\QueryException $e) {
            return response()->redirectToRoute('annonce.create')->withErrors(['annonce' => 'Erreur d\'insertion, vérifiez le format des données envoyés'])->withInput();
        } catch(\Exception $e) {
            return response()->redirectToRoute('annonce.create')->withErrors(['annonce' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // on récupère depuis la base de données les données en fonction de la requête Select fournie
        // on vérifie à la fin avec la syntax '??' si la valeur [0] dans le résultat de la requête nous retourne bien une valeur
        // Auquel cas, on assigne 'null' à la variable $annonce.
        $annonce = DB::select('select * from annonces where id = :id', [ 'id' => $id ])[0] ?? null;
        if($annonce) {
            return view('annonces.show', [ 'annonce' => $annonce ]);
        }
        // return view('404');
        return response()->view('404', [], 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $annonce = DB::select('select * from annonces where id = :id', [ 'id' => $id ])[0] ?? null;
        if($annonce) {
            return view('annonces.edit', [ 'annonce' => $annonce ]);
        }
        return response()->view('404', [], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // vérification des données du formulaire
        $request->validate([
            'name' => 'required|max:255',
            'description' => [ 'required' ],
            'price' => [ 'required', 'numeric' ]
        ]);

        // Mise à jour des données en BDD
        // $isUpdated = DB::update('
        //     UPDATE annonces SET name = :name, description = :description, price = :price WHERE id = :id
        // ', [
        //     'name' => $request->input('name'),
        //     'description' => $request->input('description'),
        //     'price' => $request->input('price'),
        //     'id' => $id
        // ]);

        try {
            // $annonce = Annonce::find($id);
            // if(!$annonce) {
            //     return response('<h1>Introuvable !</h1>', 404)->header('Content-type', 'text/html');
            // }
            $annonce = Annonce::findOrFail($id);
            $annonce->name = $request->input('name');
            $annonce->description = $request->input('description');
            $annonce->price = $request->input('price');
            $isUpdated = $annonce->save();

            // redirection de l'utilisateur vers la route show
            if($isUpdated) {
                return response()->redirectToRoute('annonce.show', [ 'annonce' => $id ]);
            }
            return redirect()->back()->withErrors(['annonce' => 'Erreur lors de la modificaiton de votre annonce'])->withInput();
        } catch(\Illuminate\Database\QueryException $e) {
            return redirect()->back()->withErrors(['annonce' => 'Erreur dans le formattage des données, vérifiez les valeurs des champs envoyés'])->withInput();
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['annonce' => $e->getMessage()])->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $isDeleted = DB::delete('DELETE FROM annonces WHERE id = :id', [
        //     'id' => $id
        // ]);

        // $isDeleted = Annonce::destroy($id);
        // $annonce = Annonce::find($id);
        // if(!$annonce) {
        //     return response('<h1>Introuvable !</h1>', 404)->header('Content-type', 'text/html');
        // }
        $annonce = Annonce::findOrFail($id);
        $isDeleted = $annonce->delete();

        if($isDeleted) {
            return response()->redirectToRoute('annonce.index');
        }
        return redirect()->back()->withErrors('Erreur lors de la suppression de votre annonce', 'annonce');
    }
}

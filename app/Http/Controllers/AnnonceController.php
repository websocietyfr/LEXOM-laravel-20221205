<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AnnonceController extends Controller
{
    protected $annonces;

    public function __construct()
    {
        $this->annonces = [
            [ 'id' => 1, 'name' => 'Ma première Annonce', 'description' => 'Lorem Ipsum', 'status' => true ],
            [ 'id' => 2, 'name' => 'Ma deuxième Annonce', 'description' => 'Lorem Ipsum 2', 'status' => false ],
            [ 'id' => 3, 'name' => 'Ma troisième Annonce', 'description' => 'Lorem Ipsum 3', 'status' => true ],
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('annonces.index', [ 'annonces' => $this->annonces, 'title' => 'Liste des annonces' ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        foreach ($this->annonces as $annonce) {
            if(array_key_exists('id',$annonce) && $annonce['id'] === (int)$id) {
                return view('annonces.show', [ 'annonce' => $annonce ]);
            }
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
        foreach ($this->annonces as $annonce) {
            if(array_key_exists('id',$annonce) && $annonce['id'] === (int)$id) {
                return view('annonces.edit', [ 'annonce' => $annonce ]);
            }
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

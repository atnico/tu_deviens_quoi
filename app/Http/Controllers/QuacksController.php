<?php

namespace App\Http\Controllers;

use App\Models\Quacks;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quacks = Quacks::all();
        return view('quacks.index', compact('quacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comments = Comments::all();
        return view('quacks.create',compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
        ]);

        $filename = "";
        if ($request->hasFile('image')) {
            // On récupère le nom du fichier avec son extension, résultat $filenameWithExt : "jeanmiche.jpg"
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filenameWithoutExt = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // On récupère l'extension du fichier, résultat $extension : ".jpg"
            $extension = $request->file('image')->getClientOriginalExtension();
            // On créer un nouveau fichier avec le nom + une date + l'extension, résultat $fileNameToStore :"jeanmiche_20220422.jpg"
            $filename = $filenameWithoutExt . '_' . time() . '.' . $extension;
            // On enregistre le fichier à la racine /storage/app/public/uploads, ici la méthode storeAs défini déjà le chemin /storage/app
            $path = $request->file('image')->storeAs('public/uploads', $filename);
        } else {
            $filename = Null;
        }

        Quacks::create([
            'content' => $request->content,
            'image' => $filename,
            'tags' => $request->tags,
        ]);

        

        return redirect()->route('quacks.index')
            ->with('success', 'Quack ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quack = Quacks::findOrFail($id);
        return view('quacks.edit', compact('quack'));
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
        $updateQuacks = $request->validate([
            'content' => 'required',
            'image' => 'required',
            'tags' => 'required',
        ]);

        

        Quacks::whereId($id)->update($updateQuacks);
        return redirect()->route('quacks.index')
            ->with('success', 'Le quack mis à jour avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quack = Quacks::findOrFail($id);
        $quack->delete();
        return redirect('/quacks')->with('success', 'Quack supprimé avec succès');
    }
}

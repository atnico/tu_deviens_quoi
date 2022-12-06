<?php

namespace App\Http\Controllers;

use App\Models\Quacks;
use Illuminate\Http\Request;

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
        return view('quacks.create');
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

        Quacks::create([
            'content' => $request->content,
            'image' => $request->image,
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

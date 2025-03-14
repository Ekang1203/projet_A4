<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;

class ProjetController extends Controller
{
    public function index()
    {
        $projets = Projet::all();
        return view('admin.projets.index', compact('projets'));
    }

    public function create()
    {
        return view('admin.projets.create');
    }

    public function store(Request $request)
    {
        Projet::create($request->all());
        return redirect()->route('admin.projets.index')->with('success', 'Projet ajouté avec succès.');
    }

    public function show(Projet $projet)
    {
        return view('admin.projets.show', compact('projet'));
    }

    public function edit(Projet $projet)
    {
        return view('admin.projets.edit', compact('projet'));
    }

    public function update(Request $request, Projet $projet)
    {
        $projet->update($request->all());
        return redirect()->route('admin.projets.index')->with('success', 'Projet mis à jour.');
    }

    public function destroy(Projet $projet)
    {
        $projet->delete();
        return redirect()->route('admin.projets.index')->with('success', 'Projet supprimé.');
    }
}

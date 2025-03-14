<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Assurez-vous que dashboard.blade.php est bien dans views/admin/
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function projets()
    {
        $projets = Projet::all();
        return view('admin.projets', compact('projets'));
    }

    public function ajouterProjet()
    {
        return view('admin.ajouter-projet');
    }

    public function storeProjet(Request $request)
    {
        Projet::create($request->all());
        return redirect()->route('admin.projets')->with('success', 'Projet ajouté avec succès');
    }

    public function editProjet($id)
    {
        $projet = Projet::findOrFail($id);
        return view('admin.editer-projet', compact('projet'));
    }

    public function deleteProjet($id)
    {
        Projet::destroy($id);
        return redirect()->route('admin.projets')->with('success', 'Projet supprimé');
    }
}



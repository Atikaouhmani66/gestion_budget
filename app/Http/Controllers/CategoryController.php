<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Récupérer toutes les catégories
        $categories = Category::all();
        return view('categories.index', compact('categories')); // Vue pour afficher toutes les catégories
    }

    public function create()
    {
        return view('categories.create'); // Vue pour créer une nouvelle catégorie
    }

    public function store(Request $request)
    {
        // Valider les données de la catégorie
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|in:income,expense',
        ]);

        // Créer une nouvelle catégorie
        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Catégorie créée avec succès');
    }

    // D'autres méthodes pour la mise à jour, suppression, etc.
}

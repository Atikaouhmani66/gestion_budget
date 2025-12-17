<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    
    /**
     * Afficher la liste des transactions
     */
    public function index()
{
    $query = Transaction::query()->with('category');
    
    // Filtre par type
    if(request()->has('type') && request('type') != '') {
        $query->where('type', request('type'));
    }
    
    // Filtre par recherche de titre
    if(request()->has('search') && request('search') != '') {
        $query->where('title', 'like', '%'.request('search').'%');
    }
    
    // Filtre par catégorie
    if(request()->has('category') && request('category') != '') {
        $query->where('category_id', request('category'));
    }
    
    $transactions = $query->orderBy('date', 'desc')->paginate(10);
    $categories = Category::all();
    
    return view('transactions.index', compact('transactions', 'categories'));
}


    /**
     * Afficher le formulaire de création
     */
    public function create()
    {
        // Récupérer toutes les catégories
        $categories = Category::all();
        return view('transactions.create', compact('categories')); // Passer les catégories à la vue
    }
    /**
     * Enregistrer une nouvelle transaction
     */
    public function store(Request $request)
{
    // Vérifie si l'utilisateur est authentifié
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une transaction.');
    }

    // Validation des données du formulaire
    $request->validate([
        'type' => 'required|in:income,expense',  // Assure que 'type' est soit 'income' ou 'expense'
        'category_id' => 'required|exists:categories,id',
        'amount' => 'required|numeric',
        'date' => 'required|date',
        'description' => 'nullable|string',
    ]);

    // Création de la transaction avec l'ID de l'utilisateur connecté
    Transaction::create([
        'type' => $request->type,
        'category_id' => $request->category_id,
        'amount' => $request->amount,
        'date' => $request->date,
        'description' => $request->description,
        'user_id' => auth()->id(),  // Ici, on prend l'ID de l'utilisateur connecté
    ]);

    // Redirection vers la page des transactions avec un message de succès
    return redirect()->route('transactions.index')->with('success', 'Transaction enregistrée avec succès!');
}






    /**
     * Afficher une transaction spécifique
     */
    public function show(Transaction $transaction)
    {
        // Vérifier que l'utilisateur peut voir cette transaction
        if ($transaction->user_id !== auth()->id()) {
            abort(403);
        }

        return view('transactions.show', compact('transaction'));
    }

    /**
     * Afficher le formulaire d'édition
     */
    public function edit(Transaction $transaction)
    {
        // Vérifier que l'utilisateur peut modifier cette transaction
        if ($transaction->user_id !== auth()->id()) {
            abort(403);
        }

        $categories = Category::where('user_id', auth()->id())->get();
        return view('transactions.edit', compact('transaction', 'categories'));
    }

    /**
     * Mettre à jour une transaction
     */
    public function update(Request $request, Transaction $transaction)
    {
        // Vérifier que l'utilisateur peut modifier cette transaction
        if ($transaction->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'category_id' => 'required|exists:categories,id',
            'amount' => 'required|numeric|min:0.01',
            'date' => 'required|date',
            'description' => 'nullable|string|max:255',
        ]);
        
        $transaction->update($validated);
        
        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction mise à jour avec succès');
    }

    /**
     * Supprimer une transaction
     */
    public function destroy(Transaction $transaction)
    {
        // Vérifier que l'utilisateur peut supprimer cette transaction
        if ($transaction->user_id !== auth()->id()) {
            abort(403);
        }

        $transaction->delete();
        
        return redirect()
            ->route('transactions.index')
            ->with('success', 'Transaction supprimée avec succès');
    }
}
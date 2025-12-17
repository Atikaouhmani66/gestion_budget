@extends('layouts.app')

@section('content')
<div class="budget-container">
    <!-- Bouton modifié pour rediriger vers le dashboard -->
    <div class="header-actions">
        <a href="{{ route('dashboard') }}" class="btn btn-dashboard">
            <i class="fas fa-tachometer-alt"></i> Tableau de bord
        </a>
    </div>
    
    <h1>Gestion Budget</h1>
    
    <h2>Toutes les Transactions</h2>
    
    <div class="search-container">
        <form method="GET" action="{{ route('transactions.index') }}">
            <div>Rechercher par titre</div>
            <div class="search-options">
                <select name="type" id="type">
                    <option value="">Tous les types</option>
                    <option value="income" {{ request('type') == 'income' ? 'selected' : '' }}>Revenue</option>
                    <option value="expense" {{ request('type') == 'expense' ? 'selected' : '' }}>Expense</option>
                </select>
                <button type="submit">Filtrer</button>
            </div>
        </form>
    </div>
    
    @if($transactions->isEmpty())
        <div class="empty-state">
            <p>Aucune transaction trouvée</p>
            <a href="{{ route('transactions.create') }}" class="btn btn-primary">
                Créer votre première transaction
            </a>
        </div>
    @else
        <table class="transactions-table">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Montant</th>
                    <th>Type</th>
                    <th>Catégorie</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->title }}</td>
                        <td class="{{ $transaction->type === 'income' ? 'positive' : 'negative' }}">
                            {{ $transaction->type === 'income' ? '+' : '-' }}{{ number_format($transaction->amount, 2, ',', ' ') }} MAD
                        </td>
                        <td>{{ $transaction->type === 'income' ? 'Revenue' : 'Expense' }}</td>
                        <td>{{ $transaction->category->name ?? '–' }}</td>
                        <td>{{ \Carbon\Carbon::parse($transaction->date)->format('d/m/Y') }}</td>
                        <td>{{ $transaction->description }}</td>
                        <td class="actions">
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn-icon">
                                <i class="fas fa-edit"></i> Modifier
                            </a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette transaction ?');">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="pagination">
            {{ $transactions->links() }}
        </div>
    @endif
    
    <hr>
</div>

<style>
    /* Style général */
    .budget-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1rem;
        font-family: Arial, sans-serif;
        color: #333;
        position: relative;
    }
    
    /* Style du bouton de dashboard */
    .header-actions {
        position: absolute;
        top: 20px;
        right: 20px;
    }
    
    .btn-dashboard {
        padding: 8px 15px;
        background-color: #4e73df;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        transition: all 0.3s;
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    .btn-dashboard:hover {
        background-color: #3a5ec0;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    
    .btn-dashboard i {
        font-size: 0.9rem;
    }
    
    h1 {
        color: #2c3e50;
        border-bottom: 2px solid #3498db;
        padding-bottom: 10px;
        font-size: 1.8rem;
        margin-top: 40px;
    }
    
    h2 {
        color: #2980b9;
        margin-top: 30px;
        font-size: 1.4rem;
    }
    
    /* Recherche et filtres */
    .search-container {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    
    .search-options {
        display: flex;
        gap: 15px;
        margin-top: 10px;
    }
    
    select, button {
        padding: 8px 12px;
        border-radius: 4px;
        border: 1px solid #ddd;
        font-family: inherit;
    }
    
    button {
        background-color: #3498db;
        color: white;
        border: none;
        cursor: pointer;
    }
    
    button:hover {
        background-color: #2980b9;
    }
    
    /* Tableau */
    .transactions-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    
    th, td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    
    tr:hover {
        background-color: #f5f5f5;
    }
    
    .positive {
        color: #2ecc71;
        font-weight: bold;
    }
    
    .negative {
        color: #e74c3c;
        font-weight: bold;
    }
    
    /* Actions */
    .actions {
        display: flex;
        gap: 10px;
    }
    
    .btn-icon {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 10px;
        background-color: transparent;
        color: #3498db;
        text-decoration: none;
        border: 1px solid #3498db;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.9rem;
    }
    
    .btn-icon:hover {
        background-color: #f0f7fd;
    }
    
    form .btn-icon {
        background-color: transparent;
        color: #e74c3c;
        border-color: #e74c3c;
    }
    
    form .btn-icon:hover {
        background-color: #fdf0f0;
    }
    
    /* État vide */
    .empty-state {
        text-align: center;
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 6px;
        margin: 2rem 0;
    }
    
    .empty-state p {
        margin: 1rem 0;
        color: #7f8c8d;
    }
    
    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }
    
    /* Ligne de séparation */
    hr {
        border: 0;
        height: 1px;
        background-color: #ddd;
        margin: 30px 0;
    }
</style>
@endsection
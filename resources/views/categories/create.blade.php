@extends('layouts.app')

@section('content')
<div class="category-form-container">
    <div class="form-header">
        <h1>
            <i class="fas fa-tag"></i>
            @if(isset($fromTransaction) && $fromTransaction)
                Créer une catégorie (requis pour les transactions)
            @else
                Nouvelle Catégorie
            @endif
        </h1>
        <a href="{{ isset($fromTransaction) && $fromTransaction ? route('transactions.create') : route('categories.index') }}" 
           class="btn-back">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>

    <form method="POST" action="{{ route('categories.store') }}" class="category-form">
        @csrf
        
        @if(isset($fromTransaction) && $fromTransaction)
            <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                Vous devez créer au moins une catégorie avant de pouvoir enregistrer une transaction.
            </div>
        @endif

        <!-- Reste du formulaire... -->
    </form>
</div>
@endsection
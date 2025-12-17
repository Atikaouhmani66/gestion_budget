@extends('layouts.app')

@section('content')
<div class="container mt-5 animate__animated animate__fadeIn">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2><i class="fas fa-wallet me-2"></i> Nouvelle Transaction</h2>
        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Retour
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger animate__animated animate__shakeX">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li><i class="fas fa-exclamation-circle me-2"></i>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('transactions.store') }}" method="POST" class="shadow p-4 rounded bg-light animate__animated animate__zoomIn">
        @csrf

        {{-- Type --}}
        <div class="mb-3">
            <label class="form-label">Type de transaction</label>
            <div class="btn-group w-100" role="group">
                <button type="button" class="btn btn-outline-success @if(old('type', 'income') == 'income') active @endif" data-value="income">
                    <i class="fas fa-arrow-down me-1"></i> Revenu
                </button>
                <button type="button" class="btn btn-outline-danger @if(old('type') == 'expense') active @endif" data-value="expense">
                    <i class="fas fa-arrow-up me-1"></i> Dépense
                </button>
            </div>
            <input type="hidden" name="type" id="type" value="{{ old('type', 'income') }}">
        </div>

        {{-- Catégorie dynamique --}}
        <div class="mb-3">
            <label for="category_id" class="form-label">Catégorie</label>
            <select class="form-select" name="category_id" id="category_id" required>
                <option value="">Sélectionnez une catégorie</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Montant --}}
        <div class="mb-3">
            <label for="amount" class="form-label">Montant (€)</label>
            <input type="number" class="form-control" name="amount" id="amount" value="{{ old('amount') }}" placeholder="0.00" required>
        </div>

        {{-- Date --}}
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" id="date" value="{{ old('date', now()->format('Y-m-d')) }}" required>
        </div>

        {{-- Description --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description (optionnel)</label>
            <textarea class="form-control" name="description" id="description" rows="3">{{ old('description') }}</textarea>
        </div>

        {{-- Submit --}}
        <div class="text-end">
            <button type="submit" class="btn btn-success px-4 py-2 animate__animated animate__pulse animate__infinite">
                <i class="fas fa-check me-2"></i> Enregistrer
            </button>
        </div>
    </form>
</div>

{{-- Script pour gérer le bouton de type --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-group .btn');
    const typeInput = document.getElementById('type');

    buttons.forEach(button => {
        button.addEventListener('click', function () {
            buttons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            typeInput.value = this.getAttribute('data-value');
        });
    });
});
</script>
@endsection

@extends('layouts.app')

@section('content')
<div class="transaction-form-container">
    <div class="form-header">
        <h1><i class="fas fa-edit"></i> Modifier Transaction</h1>
        <a href="{{ route('transactions.index') }}" class="btn-back">
            <i class="fas fa-arrow-left"></i> Retour
        </a>
    </div>

    <form method="POST" action="{{ route('transactions.update', $transaction) }}" class="transaction-form">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="type">Type de transaction</label>
            <div class="type-selector">
                <button type="button" class="type-btn income @if($transaction->type == 'income') active @endif" data-value="income">
                    <i class="fas fa-arrow-down"></i> Revenu
                </button>
                <button type="button" class="type-btn expense @if($transaction->type == 'expense') active @endif" data-value="expense">
                    <i class="fas fa-arrow-up"></i> Dépense
                </button>
                <input type="hidden" name="type" id="type" value="{{ $transaction->type }}" required>
            </div>
        </div>

        <div class="form-group">
            <label for="category_id">Catégorie</label>
            <select name="category_id" id="category_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if($transaction->category_id == $category->id) selected @endif>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="amount">Montant (€)</label>
            <div class="amount-input">
                <input type="number" step="0.01" name="amount" id="amount" 
                       value="{{ old('amount', $transaction->amount) }}" placeholder="0.00" required>
            </div>
        </div>

        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" 
                   value="{{ old('date', \Carbon\Carbon::parse($transaction->date)->format('Y-m-d')) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description (optionnel)</label>
            <textarea name="description" id="description" rows="3">{{ old('description', $transaction->description) }}</textarea>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">
                <i class="fas fa-check"></i> Mettre à jour
            </button>
        </div>
    </form>
</div>

<!-- Le même style que create.blade.php -->
<style>
    .transaction-form-container {
        max-width: 600px;
        margin: 0 auto;
        padding: 30px;
    }

    .form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .form-header h1 {
        color: #2D3748;
        font-size: 24px;
        display: flex;
        align-items: center;
    }

    .form-header h1 i {
        margin-right: 10px;
        color: #6C5CE7;
    }

    .btn-back {
        color: #4A5568;
        text-decoration: none;
        display: flex;
        align-items: center;
        transition: all 0.2s;
    }

    .btn-back:hover {
        color: #6C5CE7;
    }

    .btn-back i {
        margin-right: 5px;
    }

    .transaction-form {
        background: white;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: #4A5568;
    }

    .type-selector {
        display: flex;
        gap: 10px;
        margin-top: 10px;
    }

    .type-btn {
        flex: 1;
        padding: 12px;
        border: 2px solid #E2E8F0;
        border-radius: 8px;
        background: white;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
        transition: all 0.2s;
    }

    .type-btn i {
        margin-right: 8px;
    }

    .type-btn.income.active {
        border-color: #38B2AC;
        background: rgba(56, 178, 172, 0.1);
        color: #38B2AC;
    }

    .type-btn.expense.active {
        border-color: #E53E3E;
        background: rgba(229, 62, 62, 0.1);
        color: #E53E3E;
    }

    .form-select, 
    .amount-input input,
    #date,
    textarea {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #E2E8F0;
        border-radius: 8px;
        font-size: 16px;
        transition: all 0.2s;
    }

    .form-select:focus, 
    .amount-input input:focus,
    #date:focus,
    textarea:focus {
        border-color: #6C5CE7;
        outline: none;
    }

    .amount-input {
        position: relative;
    }

    .amount-input::before {
        content: "€";
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #718096;
        font-weight: bold;
    }

    .amount-input input {
        padding-left: 40px;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
    }

    .btn-submit {
        background: #6C5CE7;
        color: white;
        border: none;
        padding: 12px 25px;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 500;
        cursor: pointer;
        display: flex;
        align-items: center;
        transition: all 0.2s;
    }

    .btn-submit:hover {
        background: #5a4bc0;
        transform: translateY(-2px);
    }

    .btn-submit i {
        margin-right: 8px;
    }
</style>

<!-- Le même script que create.blade.php -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeButtons = document.querySelectorAll('.type-btn');
        const typeInput = document.getElementById('type');
        
        typeButtons.forEach(button => {
            button.addEventListener('click', function() {
                typeButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');
                typeInput.value = this.dataset.value;
            });
        });
        
        if(typeInput.value) {
            document.querySelector(`.type-btn[data-value="${typeInput.value}"]`).classList.add('active');
        }
    });
</script>
@endsection

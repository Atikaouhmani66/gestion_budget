<!-- resources/views/transactions/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de la transaction</h1>

        <table class="table">
            <tr>
                <th>Montant</th>
                <td>{{ $transaction->amount }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $transaction->description }}</td>
            </tr>
            <tr>
                <th>Catégorie</th>
                <td>{{ $transaction->category->name }}</td>
            </tr>
            <tr>
                <th>Date</th>
                <td>{{ $transaction->created_at }}</td>
            </tr>
        </table>

        <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
@endsection

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
{
    // Calcul des données pour le graphique
    $salary = Transaction::where('title', 'like', '%salaire%')
                ->where('type', 'income')
                ->sum('amount');
    
    $expenses = Transaction::where('type', 'expense')
                 ->sum('amount');
    
    $remaining = max(0, $salary - $expenses); // Évite les valeurs négatives
    
    // Préparation des données pour le graphique
    $chartData = [
        'labels' => ['Salaire Utilisé', 'Salaire Restant'],
        'datasets' => [
            [
                'data' => [$expenses, $remaining],
                'backgroundColor' => ['#e74c3c', '#2ecc71'],
                'hoverOffset' => 4
            ]
        ]
    ];

    return view('dashboard', [
        'chartData' => json_encode($chartData),
        'salary' => $salary,
        'expenses' => $expenses,
        'remaining' => $remaining
    ]);
}
}

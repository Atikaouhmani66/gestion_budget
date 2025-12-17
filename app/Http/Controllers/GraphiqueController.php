<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\DB; // <== HADI HIA LI NA9SA
use Illuminate\Http\Request;
use App\Models\Expense; // Modèle Expense li kay contain les dépenses
use App\Models\Salary;  // Modèle Salary li kay contain les salaires

class GraphiqueController extends Controller
{



    public function index()
{
    $transactions = DB::table('transactions')
        ->join('categories', 'transactions.category_id', '=', 'categories.id')
        ->select('categories.name as category', 'transactions.type', DB::raw('SUM(transactions.amount) as total'))
        ->groupBy('categories.name', 'transactions.type')
        ->get();

    $labels = $transactions->pluck('category');

    $data = $transactions->map(function ($item) {
        return [
            'label' => $item->category,
            'type' => $item->type,
            'total' => $item->total,
        ];
    });

    return view('graphique', compact('data'));
}








}

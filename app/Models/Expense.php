<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model

{
    protected $table = 'expenses';
    use HasFactory;

    protected $fillable = ['type', 'amount', 'date', 'description', 'user_id', 'category_id'];

    //
    public function user()
{
    return $this->belongsTo(User::class);
}

}

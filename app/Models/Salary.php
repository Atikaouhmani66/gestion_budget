<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $table = 'salaries';

    protected $fillable = ['amount', 'date', 'user_id', 'description'];
    public function user()
{
    return $this->belongsTo(User::class);
}

}

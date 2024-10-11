<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function borrowingTransactions()
    {
        return $this->hasMany(Transaction::class);
    }

    use HasFactory;
}

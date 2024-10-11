<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{

    public function borrowingTransaction()
{
    return $this->belongsTo(Transaction::class, 'transaction_id');
}

    use HasFactory;
}

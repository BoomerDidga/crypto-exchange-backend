<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InternalTransfer extends Model
{
    //
    protected $fillable = [
        'from_wallet_id',
        'to_wallet_id',
        'amount'
    ];
}

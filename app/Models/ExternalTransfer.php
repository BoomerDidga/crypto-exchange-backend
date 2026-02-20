<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalTransfer extends Model
{
    //
    protected $fillable = [
        'from_wallet_id',
        'to_wallet_id',
        'amount'
    ];
}

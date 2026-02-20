<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\InternalTransfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransferController extends Controller
{
    public function internal(Request $request)
    {
        $request->validate([
            'from_wallet_id' => 'required|exists:wallets,id',
            'to_wallet_id' => 'required|exists:wallets,id|different:from_wallet_id',
            'amount' => 'required|numeric|min:0.00000001'
        ]);

        return DB::transaction(function () use ($request) {

            $fromWallet = Wallet::lockForUpdate()->find($request->from_wallet_id);
            $toWallet = Wallet::lockForUpdate()->find($request->to_wallet_id);

            if ($fromWallet->balance < $request->amount) {
                return response()->json([
                    'message' => 'Insufficient balance'
                ], 400);
            }

            // ตัดเงิน
            $fromWallet->balance -= $request->amount;
            $fromWallet->save();

            // เพิ่มเงิน
            $toWallet->balance += $request->amount;
            $toWallet->save();

            // บันทึก transfer record
            $transfer = InternalTransfer::create([
                'from_wallet_id' => $fromWallet->id,
                'to_wallet_id' => $toWallet->id,
                'amount' => $request->amount,
            ]);

            return response()->json([
                'message' => 'Transfer successful',
                'data' => $transfer
            ]);
        });
    }
}
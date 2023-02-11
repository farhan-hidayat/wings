<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            ->whereHas('transaction', function ($transaction) {
                $transaction->where('user_id', Auth::user()->id);
            });

        $data = [
            'transaction_count' => $transactions->count(),
            'transaction_data' => $transactions->get(),
            'revenue' => $transactions->get()->reduce(function ($carry, $item) {
                return $carry + $item->price;
            }),
            'customer' => User::count(),
        ];

        return view('pages.dashboard', $data);
    }
}

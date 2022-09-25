<?php

namespace App\Http\Controllers;

use App\Models\CryptoPrice;
use Illuminate\Http\Request;

class CryptoPriceController extends Controller
{
    public function index()
    {
        $crypto_prices = CryptoPrice::latest()->paginate(50);

        return view('cryptoprices.index', [
            'crypto_prices' => $crypto_prices
        ]);
    }
}

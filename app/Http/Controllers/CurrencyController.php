<?php

namespace App\Http\Controllers;

use App\Currency;

class CurrencyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function showCurrencies()
    {
        $currencies = Currency::all();
        return response()->json(array('data' => $currencies));
    }

    public function showCurrency($id)
    {
        $currency = Currency::find($id);
        return response()->json(array('data' => $currency));
    }

}

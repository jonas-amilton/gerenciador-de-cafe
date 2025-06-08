<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeePurchase;
use App\Models\User;

class CoffeePurchaseController extends Controller
{
    public function index()
    {
        $purchases = CoffeePurchase::with('user')->latest()->paginate(10);
        return view('coffee.purchases.index', compact('purchases'));
    }

    public function create()
    {
        $users = User::all();
        return view('coffee.purchases.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'purchased_at' => ['required', 'date'],
            'quantity' => ['required', 'integer', 'min:1']
        ]);

        CoffeePurchase::create($request->only('user_id', 'purchased_at', 'quantity'));

        return redirect()->route('coffee.purchases.index')->with('success', 'Purchase registered.');
    }

    public function edit(CoffeePurchase $purchase)
    {
        $users = User::all();

        return view('coffee.purchases.edit', compact('purchase', 'users'));
    }

    public function update(Request $request, CoffeePurchase $purchase)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'purchased_at' => ['required', 'date'],
            'quantity' => ['required', 'integer', 'min:1']
        ]);

        $purchase->update($request->only('user_id', 'purchased_at', 'quantity'));

        return redirect()->route('coffee.purchases.index')->with('success', 'Compra de café atualizada.');
    }

    public function destroy(CoffeePurchase $purchase)
    {
        $purchase->delete();

        return redirect()->route('coffee.purchases.index')->with('success', 'Compra de café excluída.');
    }
}

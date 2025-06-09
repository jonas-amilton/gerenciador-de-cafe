<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeeConsumption;
use App\Models\User;

class CoffeeConsumptionController extends Controller
{
    public function index()
    {
        $consumptions = CoffeeConsumption::with('user')->latest()->paginate(10);
        return view('coffee.consumptions.index', compact('consumptions'));
    }

    public function create()
    {
        $users = User::all();
        return view('coffee.consumptions.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'consumed_at' => ['required', 'date'],
        ]);

        CoffeeConsumption::create($request->only('user_id', 'consumed_at'));

        return redirect()->route('coffee.consumptions.index')->with('success', 'Consumo registrado.');
    }

    public function edit(CoffeeConsumption $consumption)
    {
        $users = User::all();

        return view('coffee.consumptions.edit', compact('consumption', 'users'));
    }

    public function update(Request $request, CoffeeConsumption $consumption)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'consumed_at' => ['required', 'date'],
        ]);

        $consumption->update($request->only('user_id', 'consumed_at'));

        return redirect()->route('coffee.consumptions.index')->with('success', 'Registro de consumo de café atualizado.');
    }

    public function destroy(CoffeeConsumption $consumption)
    {
        $consumption->delete();

        return redirect()->route('coffee.consumptions.index')->with('success', 'Registro de consumo de café deletado com sucesso.');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CoffeePreparation;
use App\Models\User;

class CoffeePreparationController extends Controller
{
    public function index()
    {
        $preparations = CoffeePreparation::with('user')->latest()->paginate(10);
        return view('coffee.preparations.index', compact('preparations'));
    }

    public function create()
    {
        $users = User::all();
        return view('coffee.preparations.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'prepared_at' => ['required', 'date'],
            'cups_estimated' => ['required', 'integer', 'min:1'],
        ]);

        CoffeePreparation::create($request->only('user_id', 'prepared_at', 'cups_estimated'));

        return redirect()->route('coffee.preparations.index')->with('success', 'Preparação registrada.');
    }

    public function edit(CoffeePreparation $preparation)
    {
        $users = User::all();
        return view('coffee.preparations.edit', compact('preparation', 'users'));
    }

    public function update(Request $request, CoffeePreparation $preparation)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'prepared_at' => ['required', 'date'],
            'cups_estimated' => ['required', 'integer', 'min:1'],
        ]);

        $preparation->update($request->only('user_id', 'prepared_at', 'cups_estimated'));

        return redirect()->route('coffee.preparations.index')->with('success', 'Preparação atualizada.');
    }

    public function destroy(CoffeePreparation $preparation)
    {
        $preparation->delete();
        return redirect()->route('coffee.preparations.index')->with('success', 'Preparação deletada.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\CoffeePreparation;
use Illuminate\Http\Request;
use App\Models\CoffeePurchase;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $totalPurchased = CoffeePurchase::sum('quantity');

        $topBuyer = User::withSum('coffeePurchases', 'quantity')
            ->orderByDesc('coffee_purchases_sum_quantity')
            ->first();

        $topBuyerTotal = $topBuyer->coffee_purchases_sum_quantity ?? 0;

        $lastBrew = CoffeePreparation::latest('prepared_at')
            ->with('user')
            ->first();

        $lastBrewedBy = $lastBrew?->user;
        $lastBrewedAt = $lastBrew?->brewed_at;

        return view('dashboard', compact(
            'totalPurchased',
            'topBuyer',
            'topBuyerTotal',
            'lastBrewedBy',
            'lastBrewedAt',
        ));
    }
}

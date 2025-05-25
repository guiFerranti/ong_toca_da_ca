<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use App\Models\Animal;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $animais = Animal::where('is_active', true)
            ->orderBy('created_at', 'desc')
            ->take(15)
            ->get();

        return view('publics.home', compact('animais'));
    }
}

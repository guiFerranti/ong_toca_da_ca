<?php

namespace App\Http\Controllers\Publics;

use App\Http\Controllers\Controller;
use App\Models\AccountabilityEntry;

class AccountabilityController extends Controller
{
    public function index()
    {
        $entries = AccountabilityEntry::latest()
            ->paginate(9);

        return view('publics.accountability.index', compact('entries'));
    }

    public function show(AccountabilityEntry $entry)
    {
        return view('publics.accountability.show', compact('entry'));
    }
}

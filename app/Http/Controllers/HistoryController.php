<?php

namespace App\Http\Controllers;

use App\Models\GeneratedPerson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        // Retrieve last 5 people generated by the signed-in user
        $generatedPeople = GeneratedPerson::where('user_id', Auth::id())
            ->latest('created_at')
            ->paginate(5);

        return view('pages/history', ['generatedPeople' => $generatedPeople]);
    }
}

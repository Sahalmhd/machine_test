<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with('department', 'designation')->get();
        
        return view('index', compact('users'));
    }

    // Search function to filter users based on query
    public function search(Request $request)
    {
        $query = $request->get('query', '');

        $users = User::with('department', 'designation')
            ->where('name', 'like', "%$query%")
            ->orWhereHas('department', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->orWhereHas('designation', function ($q) use ($query) {
                $q->where('name', 'like', "%$query%");
            })
            ->get();

        return response()->json($users);
    }
}

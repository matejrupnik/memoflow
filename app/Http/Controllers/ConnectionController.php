<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ConnectionController extends Controller
{
    public function index() {
        return view('connections', [
            'users' => User::query()->paginate(6)->withQueryString()
        ]);
    }

    public function store(User $user) {
        auth()->user()->usersOf()->attach($user->id);
        auth()->user()->usersFrom()->attach($user->id);
        $user->usersOf()->attach(auth()->user()->id);
        $user->usersFrom()->attach(auth()->user()->id);

        return redirect()->route('connections.index');
    }

    public function destroy(User $user) {
        auth()->user()->usersOf()->detach($user->id);
        auth()->user()->usersFrom()->detach($user->id);
        $user->usersOf()->detach(auth()->user()->id);
        $user->usersFrom()->detach(auth()->user()->id);

        return redirect()->route('connections.index');

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show() {
        $memos = Memo::query()->when(request('query'), function ($query) {
            $query->where('title', 'LIKE', '%' . request('query') . '%')
            ->orWhere('content', 'LIKE', '%' . request('query') . '%');
        })->latest('updated_at')->paginate(6)->withQueryString();

        return view('welcome', [
            'memos' => $memos
        ]);
    }

    public function showConnections() {
        $users = User::query()->when(request('query'), function ($query) {
            $query->where('name', 'LIKE', '%' . request('query') . '%')
                ->orWhere('email', 'LIKE', '%' . request('query') . '%');
        })->latest('updated_at')->paginate(6)->withQueryString();

        return view('connections', [
            'users' => $users
        ]);
    }
}

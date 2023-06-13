<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use App\Models\User;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    public function index() {
        return view('welcome', [
            'memos' => auth()->user()->memos()->latest('updated_at')->paginate(6)
        ]);
    }

    public function create() {
        return view('editor');
    }

    public function store() {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $memo = Memo::create([
            'title' => $validated['title'],
            'content' => $validated['content']
        ]);

        auth()->user()->memos()->attach($memo);

        return redirect()->route('memos.edit', $memo);
    }

    public function show(Memo $memo) {

    }

    public function edit(Memo $memo) {
        $memo->views++;
        $memo->save();
        return view('editor', [
            'memo' => $memo
        ]);
    }

    public function update(Memo $memo) {
        $validated = request()->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'key' => 'numeric',
            ''
        ]);

        $memo->update([
            'title' => $validated['title'],
            'content' => $validated['content']
        ]);

        return redirect()->route('memos.edit', $memo);
    }

    public function destroy(Memo $memo) {
        $memo->users()->detach();
        $memo->delete();
        return redirect()->route('memos.index');
    }

    public function addUser(User $user, Memo $memo) {
        $user->memos()->attach($memo);

        return redirect()->back();
    }

    public function removeUser(User $user, Memo $memo) {
        $user->memos()->detach($memo);

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    public function show(Memo $memo) {
        $memo->views++;
        $memo->save();
        return view('share', [
            'memo' => $memo
        ]);
    }
}

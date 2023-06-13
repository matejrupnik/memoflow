<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    public function index() {
        $string = "";

        foreach (auth()->user()->memos as $key => $memo) {
            $string .= $key+1 . '. ' . $memo->title . $memo->content;
        }

        header("Content-Disposition: attachment; filename=file.html");
        header("Content-Type: text/plain");
        header("Content-Length: " . strlen($string));

        echo $string;
        exit();
    }

    public function show(Memo $memo) {
        $string = $memo->title . $memo->content;

        header("Content-Disposition: attachment; filename=file.html");
        header("Content-Type: text/plain");
        header("Content-Length: " . strlen($string));

        echo $string;
        exit();
    }
}

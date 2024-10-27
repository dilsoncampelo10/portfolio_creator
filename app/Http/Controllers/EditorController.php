<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function editor(Request $request)
    {
        $portfolio = Portfolio::where('token', $request->token)->first();
        $pages = $portfolio->pages;

        return view('editor.index', compact('portfolio', 'pages'));
    }
}

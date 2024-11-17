<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class EditorController extends Controller
{
    public function editor(Request $request)
    {
        $portfolio = Portfolio::where('token', $request->token)->first();
        $pages = $portfolio->pages;
        $currentPage = Page::where('id', $request->page)->first();

        return view('editor.index', compact('portfolio', 'pages', 'currentPage'));
    }
}

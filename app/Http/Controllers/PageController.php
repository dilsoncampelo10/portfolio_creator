<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['url'] = strtolower($request->title);
        Page::create($data);

        return redirect()->back()->with('success', 'Página Criada com sucesso');
    }

    public function save(Request $request)
    {
        $page = Page::findOrFail($request->page);

        $page->update([
            'html' => $request->html,
            'css' => $request->css
        ]);

        return response()->json(['Tópico salvo com sucesso!'], 201);
    }
}

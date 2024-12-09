<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = auth()->user()->portfolios;


        return view('portfolios.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if ($data['title'] == '' && $data['description']) {
            return redirect()->back()->with('error', 'É necessário informar o título e a descrição do seu portifólio');
        } 

        if ($data['title'] == '') {
            return redirect()->back()->with('error', 'É necessário informar o título do seu portifólio');
        } 

        if ($data['description'] == '') {
            return redirect()->back()->with('error', 'É necessário informar a descrição do seu portifólio');
        } 

        $data['token'] = Str::uuid();
        $data['user_id'] = Auth::user()->id;
        $portfolio = Portfolio::create($data);

        if ($portfolio) {
            $array = [
                'title' => 'Página Inicial',
                'url' => 'home',
                'user_id' => Auth::user()->id,
                'portfolio_id' => $portfolio->id
            ];
            Page::create($array);
            return redirect()->back()->with('success', 'Portifólio Criado com sucesso');
        } else {
            return redirect()->back()->with('error', 'Falha ao criar portifólio');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('portfolios.edit', compact('portfolio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $portfolio = Portfolio::findOrFail($request->id);

        $data = $request->all();
        
        if ($data['title'] == '' && $data['description']) {
            return redirect()->back()->with('error', 'É necessário informar o título e a descrição do seu portifólio');
        } 

        if ($data['title'] == '') {
            return redirect()->back()->with('error', 'É necessário informar o título do seu portifólio');
        } 

        if ($data['description'] == '') {
            return redirect()->back()->with('error', 'É necessário informar a descrição do seu portifólio');
        } 

        if ($portfolio->update($data)) {
            return redirect()->back()->with('success', 'Portifólio alterado com sucesso');
        } else {
            return redirect()->back()->with('success', 'Falha ao alterar portifólio');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->pages()->delete();

        $portfolio->delete();

        return redirect()->back()->with('success', 'Portifólio deletado com sucesso!');
    }
    public function preview($token, $url)
    {
        $portfolio = Portfolio::where('token', $token)->first();

     
        if (!$portfolio) {
            return back()->withErrors(['error' => 'Erro']);
        }
        $currentPage = $portfolio->pages->where('url', $url)->first();

        return view('portfolios.show', compact('currentPage'));
    }
}

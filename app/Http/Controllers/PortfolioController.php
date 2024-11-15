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

        $data['token'] = Str::uuid();
        $data['user_id'] = Auth::user()->id;
        $portfolio = Portfolio::create($data);

        if ($portfolio) {
            $array = [
                'title' => 'Página Inicial',
                'user_id' => Auth::user()->id,
                'portfolio_id' => $portfolio->id
            ];
            Page::create($array);
        }

        return redirect()->back()->with('success', 'Portifólio Criado com sucesso');
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

        $portfolio->update($request->all());

        return redirect()->back()->with('success', 'Portifólio alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $portfolio->delete();

        return redirect()->back()->with('success', 'Portifólio deletado com sucesso!');
    }
}

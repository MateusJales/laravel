<?php

namespace App\Http\Controllers;

use App\Doenca_base;
use Illuminate\Http\Request;

class Doenca_baseController extends Controller
{
    public function index()
    {
        $doenca_bases = Doenca_base::latest()->paginate(5);
        return view('doenca_base.index', compact('doenca_bases'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }

    public function create()
    {
        return view('doenca_base.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' =>'required',
        ]);

        Doenca_base::create($request->all());
        return redirect()->route('doenca_base.index')
            ->with('success', 'Nova doença registrado com sucesso');
    }

    public function show($id)
    {
        $doenca_base = Doenca_base::find($id);
        return view('doenca_base.detail', compact('doenca_base'));
    }

    public function edit($id)
    {
        $doenca_base = Doenca_base::find($id);
        return view('doenca_base.edit', compact('doenca_base'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' =>'required',
        ]);
        $doenca_base = Doenca_base::find($id);
        $doenca_base->fill($request->all());
        $doenca_base->save();
        return redirect()->route('doenca_base.index')
            ->with('sucess', 'Doença atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doenca_base = Doenca_base::find($id);
        $doenca_base->delete();
        return redirect()->route('doenca_base.index')
            ->with('success', 'Doença apagada com sucesso');
    }
}

<?php

namespace App\Http\Controllers;

use App\Tipos_imediata;
use Illuminate\Http\Request;

class Tipos_imediataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_imediatas = Tipos_imediata::latest()->paginate(5);
        return view('tipos_imediata.index', compact('tipos_imediatas'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos_imediata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' =>'required',
        ]);

        Tipos_imediata::create($request->all());
        return redirect()->route('tipos_imediata.index')
            ->with('success', 'Novo tipo imediato registrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipos_imediata = Tipos_imediata::find($id);
        return view('tipos_imediata.detail', compact('tipos_imediata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipos_imediata = Tipos_imediata::find($id);
        return view('tipos_imediata.edit', compact('tipos_imediata'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' =>'required',
        ]);
        $tipos_imediata = Tipos_imediata::find($id);
        $tipos_imediata->fill($request->all());
        $tipos_imediata->save();
        return redirect()->route('tipos_imediata.index')
            ->with('sucess', 'Tipo imediato atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipos_imediata = Tipos_imediata::find($id);
        $tipos_imediata->delete();
        return redirect()->route('tipos_imediata.index')
            ->with('success', 'Tipo imediato apagado com sucesso');
    }
}

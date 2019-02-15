<?php

namespace App\Http\Controllers;

use App\Transfusao;
use Illuminate\Http\Request;

class TransfusaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transfusaos = Transfusao::latest()->paginate(5);
        return view('transfusao.index', compact('transfusaos'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transfusao.create');
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

        Transfusao::create($request->all());
        return redirect()->route('transfusao.index')
            ->with('success', 'Nova transfusão registrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transfusao = Transfusao::find($id);
        return view('transfusao.detail', compact('transfusao'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transfusao = Transfusao::find($id);
        return view('transfusao.edit', compact('transfusao'));
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
        $transfusao = Transfusao::find($id);
        $transfusao->fill($request->all());
        $transfusao->save();
        return redirect()->route('transfusao.index')
            ->with('sucess', 'Transfusão atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transfusao = Transfusao::find($id);
        $transfusao->delete();
        return redirect()->route('transfusao.index')
            ->with('success', 'Transfusão apagada com sucesso');
    }
}

<?php

namespace App\Http\Controllers;

use App\Tipos_tardia;
use Illuminate\Http\Request;

class Tipos_tardiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipos_tardias = Tipos_tardia::latest()->paginate(5);
        return view('tipos_tardia.index', compact('tipos_tardias'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipos_tardia.create');
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

        Tipos_tardia::create($request->all());
        return redirect()->route('tipos_tardia.index')
            ->with('success', 'Novo tipo tardio registrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipos_tardia = Tipos_tardia::find($id);
        return view('tipos_tardia.detail', compact('tipos_tardia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipos_tardia = Tipos_tardia::find($id);
        return view('tipos_tardia.edit', compact('tipos_tardia'));
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
        $tipos_tardia = Tipos_tardia::find($id);
        $tipos_tardia->fill($request->all());
        $tipos_tardia->save();
        return redirect()->route('tipos_tardia.index')
            ->with('sucess', 'Tipo tardio atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipos_tardia = Tipos_tardia::find($id);
        $tipos_tardia->delete();
        return redirect()->route('tipos_tardia.index')
            ->with('success', 'Tipo tardio apagado com sucesso');
    }
}

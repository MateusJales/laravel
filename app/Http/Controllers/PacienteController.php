<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::latest()->paginate(5);
        return view('paciente.index', compact('pacientes'))
                    ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('paciente.create');
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
            'sus' =>'required',
            'sexo' =>'required',
            'raca' =>'required',
            'profissao' =>'required',
            'mae' =>'required',
            'rg' =>'required',
            'data_nascimento' =>'required'
        ]);

        Paciente::create($request->all());
        return redirect()->route('paciente.index')
                        ->with('success', 'Novo paciente registrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::find($id);
        return view('paciente.detail', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        return view('paciente.edit', compact('paciente'));
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
            'sus' =>'required',
            'sexo' =>'required',
            'raca' =>'required',
            'profissao' =>'required',
            'mae' =>'required',
            'rg' =>'required',
            'data_nascimento' =>'required'
        ]);
        $paciente = Paciente::find($id);
        $paciente->fill($request->all());
        $paciente->save();
        return redirect()->route('paciente.index')
                        ->with('sucess', 'Paciente atualizado com sucesso');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::find($id);
        $paciente->delete();
        return redirect()->route('paciente.index')
                        ->with('success', 'Paciente apagado com sucesso');
    }
}

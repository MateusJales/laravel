<?php

namespace App\Http\Controllers;

use App\Doenca_base;
use App\Gravidade;
use App\Paciente;
use App\Tipos_imediata;
use App\Transfusao;
use App\User;
use Illuminate\Http\Request;
use App\Ficha;
use test\Mockery\Fixtures\ClassWithAllLowerCaseMethod;

class FichaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fichas = Ficha::latest()->paginate(5);
        return view('ficha.index', compact('fichas'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all(['id', 'name']);
        $pacientes = Paciente::all(['id', 'nome']);
        $doenca_bases = Doenca_base::all(['id', 'nome']);
        $transfusaos = Transfusao::all(['id', 'nome']);
        $gravidades = Gravidade::all(['id', 'nome']);
        $tipos_imediatas = Tipos_imediata::all(['id', 'nome']);
        return view('ficha.create', compact('users', 'pacientes', 'doenca_bases', 'transfusaos', 'gravidades', 'tipos_imediatas'));
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
            'users_id' => 'required',
            'pacientes_id' => 'required',
            'finalizado' => 'required',
            'doenca_bases_id' => 'required',
            'transfusaos_id' => 'required',
            'gravidades_id' => 'required',
            'data_reacao' => 'required',
            'descricao' => 'required',
            'pre_medicacao' => 'required',
            'reacao_adversa' => 'required',
            'indicacao' => 'required',
            'tipos_imediatas_id' => 'required'
        ]);
        $ficha = new Ficha();
        $ficha->fill($request->all());
        $ficha->save();

        return redirect()->route('ficha.index')
            ->with('success', 'Nova ficha registrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Gravidade;
use Illuminate\Http\Request;

class GravidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gravidades = Gravidade::latest()->paginate(5);
        return view('gravidade.index', compact('gravidades'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gravidade.create');
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

        Gravidade::create($request->all());
        return redirect()->route('gravidade.index')
            ->with('success', 'Nova gravidade registrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gravidade = Gravidade::find($id);
        return view('gravidade.detail', compact('gravidade'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gravidade = Gravidade::find($id);
        return view('gravidade.edit', compact('gravidade'));
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
        $gravidade = Gravidade::find($id);
        $gravidade->fill($request->all());
        $gravidade->save();
        return redirect()->route('gravidade.index')
            ->with('sucess', 'Gravidade atualizada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gravidade = Gravidade::find($id);
        $gravidade->delete();
        return redirect()->route('gravidade.index')
            ->with('success', 'Gravidade com sucesso');
    }
}

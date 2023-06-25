<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\Telefone;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $contatos = Contato::getContatos();
        return view('contatos.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contatos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {     
        $validated = $request->validate([
            'nome' => 'required|max:100',
            'idade' => 'required|max:3',
            'numero' => 'required|max:16',
        ]);

        $contato = Contato::insertContato($request);
        return redirect()->route('contatos.index')->with('success','Contato criado com sucesso');
    
    }

    public function search(Request $request)
    {
      $parametersNome = $request->query('nome');
      $parametersNumero = $request->query('numero');
      $contatos = Contato::getContatosFiltro($parametersNome, $parametersNumero);
    
        return view('contatos.index', compact('contatos'));
     
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
        $contato = Contato::getContato($id);
        return view('contatos.edit',compact('contato'));
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
        
        $validated = $request->validate([
            'nome' => 'required|max:100',
            'idade' => 'required|max:3',
            'numero' => 'required|max:16',
        ]);

        $contato = Contato::updateContato($request, $id);
        return redirect()->route('contatos.index')->with('success','Contato foi atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {      
        $contato = Contato::deleteContato($id);
        return redirect()->route('contatos.index')->with('success','Contato foi excluido');
    }
}

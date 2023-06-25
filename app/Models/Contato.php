<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Telefone;
use Illuminate\Support\Facades\DB;



class Contato extends Model
{
    use HasFactory;

    protected $fillable = ['id','nome', 'idade'];

    public function getContatos()
    {   

       $contatos = DB::table('contatos')
                    ->join('telefones', 'contatos.id', '=', 'telefones.contato_id')
                    ->orderBy('id','desc')->paginate(100);

        return $contatos;
    }

    public function getContatosFiltro($parametersNome, $parametersNumero)
    {   
        $whereNumero = [];
       

        $query = DB::table('contatos');
        $query =  $query->join('telefones', 'contatos.id', '=', 'telefones.contato_id');
        if($parametersNome) $query->where('contatos.nome', $parametersNome);
        if($parametersNumero) $query->where('telefones.numero',$parametersNumero);
        $contatosResult = $query->get();
        $contatos = [];

        foreach ($contatosResult as $contato) {   
            $contatos[] = $contato;
        }

        return $contatos;
    }

    public function getContato($id)
    {   

       $contato = DB::table('contatos')
                    ->join('telefones', 'contatos.id', '=', 'telefones.contato_id')
                    ->where('contatos.id',  '=', $id)
                    ->get();
        
        return $contato[0];
    }

    public function insertContato($request)
    {   
        $contato = new Contato;
        $contato->nome = $request->input('nome');
        $contato->idade = $request->input('idade');
        $contato->save();
        Telefone::insertTelefone($contato->id, $request);
        
        return $contato;
    }

    public function updateContato($request, $id)
    {
        $contato = Contato::find($id);
        $contato->update($request->all());
        Telefone::updateTelefone($request, $id);
        return;
    }

    public function deleteContato($id)
    {   
        $contato = Contato::find($id);
        $contato->delete($contato);
        return;
    }
}

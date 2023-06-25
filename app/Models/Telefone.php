<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $fillable = ['numero'];

    public function insertTelefone($contato_id, $request)
    {   
        $telefone = new Telefone;
        $telefone->numero = $request->input('numero');
        $telefone->contato_id = $contato_id;
        $telefone->save();
        return $telefone;
    }

    public function updateTelefone($request, $id)
    {
        $telefone = Telefone::find($id);
        $telefone->update($request->all());
        return;
    }
}

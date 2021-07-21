<?php

namespace App\Http\Controllers\API;

use App\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        if($request->get('search')){
            $data = Cliente::query()->where('nome', 'LIKE', "%{$request->get('search')}%")->get();
        }else{
            $data =  Cliente::all();
        }

        return response()->json([
            'error' => false,
            'clientes'  => $data,
        ], 200);

    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[ 
            'nome' => 'required',
            'email' => 'required|email|unique:clientes,email',
        ],[
            'nome.required' => 'O nome precisa ser informado',
            'email.unique' => 'O e-mail já existe na base de dados',
        ]);

     
        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $cliente = new Cliente;
            $cliente->nome = $request->input('nome');
            $cliente->email = $request->input('email');
            $cliente->save();

            return response()->json([
                'error' => false,
                'cliente'  => $cliente,
            ], 200);
        }
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente)){
            return response()->json([
                'error' => true,
                'message'  => "Registro com id: $id não encontrado",
            ], 404);
        }

        return response()->json([
            'error' => false,
            'cliente'  => $cliente,
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(),[ 
            'nome' => 'required',
            'email' => 'required|email',
        ]);

        if($validation->fails()){
            return response()->json([
                'error' => true,
                'messages'  => $validation->errors(),
            ], 200);
        }
        else
        {
            $cliente = Cliente::find($id);
            $cliente->nome = $request->input('nome');
            $cliente->email = $request->input('email');
            $cliente->save();

            return response()->json([
                'error' => false,
                'cliente'  => $cliente,
            ], 200);
        }
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);

        if(is_null($cliente)){
            return response()->json([
                'error' => true,
                'message'  => "Registro com id: $id não encontrado",
            ], 404);
        }

        $cliente->delete();

        return response()->json([
            'error' => false,
            'message'  => "Registro do cliente excluído com sucesso id: $id",
        ], 200);
    }
}
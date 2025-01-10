<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista(){
        $itens =\Cart::content();
        return view('site.carrinho',compact('itens'));
    }

    public function adicionaCarrinho(request $request){
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => $request->qnt,
            'attributes' => array(
                'image'=>$request->img
            ),
        ]);
    }
}

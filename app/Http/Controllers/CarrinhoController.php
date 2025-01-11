<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function carrinhoLista()
    {
        $itens = Cart::content();

        // dd($itens);
        return view('site.carrinho', compact('itens'));
    }

    public function adicionaCarrinho(request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'qty' => abs($request->qnt),
            'options' => array(
                'image' => $request->img
            ),
        ]);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto adicionado no carrinho com sucesso!');
    }

    public function removeCarrinho(request $request)
    {
        $productId = $request->id;

        foreach (Cart::content() as $item) {
            if ($item->options->product_id == $productId) {
                Cart::remove($item->rowId);
                break;
            }
        }

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto removido do carrinho com sucesso!');
    }

    public function atualizaCarrinho(request $request)
    {

        // dd($request->all());
        $rowId = $request->input('rowId');
        $quantity = abs($request->input('qty'));

        // Atualize o carrinho
        Cart::update($rowId, $quantity);

        return redirect()->route('site.carrinho')->with('sucesso', 'Produto atualizado com sucesso!');
    }




    public function limpaCarrinho(request $request)
    {
        Cart::destroy();
        return redirect()->route('site.carrinho')->with('aviso', 'Seu carrinho está vázio.');

    }
}

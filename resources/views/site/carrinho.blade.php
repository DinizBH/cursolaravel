@extends('site.layout')
@section('title','Carrinho')
@section('conteudo')

<div class="row container">

    <h5>Seu carrinho possui: {{$itens->count()}} produtos.</h5>

    <table class="striped">
        <thead>
          <tr>
              <th></th>
              <th>Name</th>
              <th>Preço</th>
              <th>Quantidade</th>
              <th></th>
          </tr>
        </thead>

        <tbody>
            @foreach ($itens as $item)
            <tr>
                <td><img src="{{$item->attributes->image}}" alt="" width="70" class="responsive-img circle"></td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td><input type="number" name="qty" id="">{{$item->qty}}</td>
                <td>
                    <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                    <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    <div class="row conteiner center">
        <button class="btn-large waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">arrow_back</i></button>
        <button class="btn-large waves-effect waves-light blue">Limpar Carrinho<i class="material-icons right">clear</i></button>
        <button class="btn-large waves-effect waves-light green">Finalizar Pedido<i class="material-icons right">check</i></button>

    </div>
</div>


@endsection


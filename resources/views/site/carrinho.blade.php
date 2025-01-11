@extends('site.layout')
@section('title','Carrinho')
@section('conteudo')

<div class="row container">

    @if ($mensagem = Session::get('sucesso'))

        <div class="card green">
            <div class="card-content white-text">
              <span class="card-title">Parabéns!</span>
              <p>{{$mensagem}}</p>
              </div>
          </div>
    @endif

    @if ($mensagem = Session::get('aviso'))

        <div class="card orange">
            <div class="card-content white-text">
              <span class="card-title">Tudo Bem!</span>
              <p>{{$mensagem}}</p>
              </div>
          </div>
    @endif

    @if ($itens->count() == 0)
        <div class="card purple">
            <div class="card-content white-text">
            <span class="card-title">Seu carrinho está vazio!</span>
            <p>Aproveite nossas promoções!</p>
            </div>
        </div>

    @else
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
                    <td><img src="{{$item->options->image}}" alt="" width="70" class="responsive-img circle"></td>
                    <td>{{$item->name}}</td>
                    <td>R$ {{number_format($item->price,2,',','.')}}</td>

                    {{--BTN ATUALIZAR ITEM CARRINHO--}}

                    <form action="{{route('site.atualizacarrinho')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <td>
                            <input type="hidden" name="rowId" value="{{$item->rowId}}">
                            <td><input style="width: 40px; font-weight:900;" class="white center" type="number" name="qty" min="1" value="{{$item->qty}}"></td>
                        </td>
                        <td>
                            <button class="btn-floating waves-effect waves-light orange"><i class="material-icons">refresh</i></button>
                        </form>

                        <form action="{{route('site.removecarrinho')}}" method="post" enctype="multipart/form-data">
                            {{--BTN REMOVER ITEM CARRINHO--}}
                            @csrf
                            <input type="hidden" name="rowId" value="{{$item->id}}">
                            <button class="btn-floating waves-effect waves-light red"><i class="material-icons">delete</i></button>
                        </td>
                        </form>
                </tr>
                @endforeach

            </tbody>
        </table>

    @endif

    <div class="card orange">
        <div class="card-content white-text">
          <span class="card-title">R${{number_format(Cart::total(),2,',','.')}}</span>
          <p>Pague em 12x sem juros!</p>
          </div>
      </div>



    <div class="row conteiner center">
        <a href="{{route('site.index')}}" class="btn-large waves-effect waves-light blue">Continuar Comprando<i class="material-icons right">arrow_back</i></a>
        <a href="{{route('site.limpacarrinho')}}" class="btn-large waves-effect waves-light blue">Limpar Carrinho<i class="material-icons right">clear</i></a>
        <button class="btn-large waves-effect waves-light green">Finalizar Pedido<i class="material-icons right">check</i></button>

    </div>
</div>

@endsection


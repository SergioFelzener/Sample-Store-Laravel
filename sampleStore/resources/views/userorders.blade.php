@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-12">
        <h2>Meus Pedidos</h2>
        <hr>
    </div>

    <div class="col-12">
        <div id="accordion">
            @forelse($userOrders as $key => $order)
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                            Pedido n!ˆ& : {{ $order->reference }}
                            </button>
                        </h5>
                    </div>

                    <div id="collapse{{ $key }}" class="collapse @if($key == 0) show @endif" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <ul>
                                @php $itens = unserialize($order->itens);@endphp
                                @foreach($itens as $item)

                                <li>{{$item['name']}} R$ {{number_format($item['price'],2, ',', '.')}} Total R$ {{number_format($item['price'] * $item['amount'],2, ',', '.')}}</li>


                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
                @empty
                    <div class="alert alert-warning">Nenhum Pedido Recebido!</div>
            @endforelse
        </div>
        <hr>

        <div class="col-12">
            {{ $userOrders->links() }}
        </div>
    </div>

</div>

@endsection

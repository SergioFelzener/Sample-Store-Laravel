@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-6">
        @if($produto->fotos->count())
        <img src="{{asset('storage/' . $produto->fotos->first()->image)}}" alt="" class="card-img-top">
        <div class="row" style="margin-top: 20px;">

            @foreach($produto->fotos as $foto)

                <div class="col-4">

                    <img src="{{asset('storage/' . $foto->image)}}" alt="" class="img-fluid">

                </div>

            @endforeach
        </div>
        @else
            <img src="{{asset('assets/img/no-photo.jpg')}}"  alt="" class="card-img-top">
        @endif
    </div>
        <div class="col-6">
            <div class="col-md-12">
                <h2>{{$produto->name}}</h2>
                <p>
                    {{ $produto->description }}
                </p>
                <h3>
                    R$ : {{ number_format($produto->price, '2', ',', '.')}}
                </h3>
                <span>
                    Loja : {{ $produto->store->name }}
                </span>
            </div>

            <div class="produto-add col-md-12">
                <hr>

            <form action="{{route('cart.add')}}" method="POST">
                @csrf
                <input type="hidden" name="produto[name]" value="{{$produto->name}}">
                    <input type="hidden" name="produto[price]" value="{{$produto->price}}">
                    <input type="hidden" name="produto[slug]" value="{{$produto->slug}}">
                    <div class="form-group">
                        <label>Quantidade</label>
                        <input type="number" name="produto[amount]" class="form-control col-md-2" value="1">
                    </div>
                    <button class="btn btn-sm btn-danger">COMPRAR</button>
                </form>
            </div>


        </div>

</div>

<div class="row">
    <div class="col-12">
        <hr>
        {{ $produto->body }}
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <audio controls>
            <source src="{{ asset('storage/' . $produto->audio->get('audio'))}}" type="audio/mpeg">
        </audio>
        <p>AQUI O AUDIO</p>
    </div>
</div>


@endsection

@extends('layout.layout')

@section('content')
    @foreach ($vehicles as $vehicle)
        <div class="container">
            <div class="content">
                <div class="image">
                    <img src="{{ $vehicle['image'] }}" alt="Descrição da Imagem">
                </div>
                <div class="text">
                    <h1>{{ $vehicle['name'] ?? 'Carro desconhecido' }}</h1>
                    <div class="post-link"><a href="{{ route('vehicle', $vehicle['link']) }}">Veja mais</a></div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
@endsection

@section('style')

    .container {
    max-width:100%;
    width:100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 20px;
    border: solid;
    padding-right: 20px;
    border-radius: 30px;
    }

    .post-link {
    margin-top: 10px;
    margin-bottom: 20px;
    }
    .post-link a {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
    color: black;
    display: block;
    margin: 20px 0;
    transition: color 0.5s ease;
    }

    .post-link a:hover {
    color: #a9a9a9;
    }

    .content {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    }

    .image img {
    width: 100%;
    height: 300px;
    margin-left: 0px;
    border-radius: 30px 0 0 30px;
    overflow:hidden;
    }

    .text {
    width: 50%;
    max-width: 60%;
    }

    .text h1 {
    text-align: center;
    margin-bottom: 10px;
    text-transform: Capitalize;
    }

    hr {
    margin-top: 20px;
    }
@endsection

@extends('layout.layout')

@section('content')
    @foreach ($characters as $character)
        <div class="container">
            <div class="content">
                <div class="image">
                    <img src="{{ $character['image'] }}" alt="Descrição da Imagem">
                </div>
                <div class="text">
                    <h1>{{ $character['name'] ?? 'Personagem desconhecido' }}</h1>
                    <div class="post-link"><a href="{{ route('character', $character['link']) }}">Veja mais</a></div>
                </div>
            </div>
        </div>
        <hr>
    @endforeach
@endsection

@section('style')
    .container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
    max-width:490px;
    border: solid;
    padding-right: 20px;
    border-radius: 30px;
    }

    .post-link {
    margin-top: 10px;
    margin-bottom: 20px;
    }
    .post-link a {
    text-align: center; /* Centraliza o conteúdo */
    font-size: 20px; /* Torna o texto maior */
    font-weight: bold; /* Aplica negrito */
    text-decoration: none; /* Remove o sublinhado */
    color: black; /* Define a cor do texto para preto (ou qualquer outra cor desejada) */
    display: block; /* Faz o link ocupar a linha inteira para centralização efetiva */
    margin: 20px 0; /* Adiciona espaço antes e depois do link */
    transition: color 0.5s ease; /* Define a animação para a propriedade color */
    }

    .post-link a:hover {
    color: #a9a9a9; /* Define a cor do texto para preto (ou qualquer outra cor desejada) */
    }

    .content {
    display: flex;
    align-items: center;
    gap: 20px; /* Espaço entre a imagem e o texto */
    }

    .image img {
    width: 150px; /* Ou qualquer outro tamanho desejado */
    height: 200px;
    border-radius: 30px 0 0 30px;
    overflow:hidden;
    }

    .text {
    max-width: 60%; /* Limita a largura do texto para não ocupar toda a largura quando a tela é grande */
    }

    .text h1 {
    text-align: center; /* Centraliza o conteúdo */
    margin-bottom: 10px;
    text-transform: Capitalize;
    }

    hr {
    margin-top: 20px;
    }
@endsection

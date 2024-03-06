@extends('layout.layout')

@section('content')
    @foreach ($contents as $content)
        <div class="post">
            <div class="post-title">{{ $content['title'] }}</div>
            <div class="post-description">{{ $content['description'] }}</div>
            <div class="post-link"><a href="{{ route('quest', $content['link']) }}">Veja mais</a></div>
            <hr>
        </div>
    @endforeach
@endsection

@section('style')
    .post-title {
        margin: 24px;
        font-size: 36px;
        text-align: center;
        text-transform: capitalize;
    }
    .post-description {
        margin-top: 10px;
        font-size: 22px;
    }
    .post-link {
        margin-top: 10px;
        margin-bottom: 20px;

    }
    .post-link a {
        text-align: center; /* Centraliza o conteúdo */
        font-size: 28px; /* Torna o texto maior */
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
    hr {
        margin-top: 20px;
    }
@endsection

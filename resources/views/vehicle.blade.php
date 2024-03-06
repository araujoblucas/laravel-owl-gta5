@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="content">
{{--            <div class="image">--}}
{{--                <img src="{{ $vehicle['image'] }}" alt="Descrição da Imagem">--}}
{{--            </div>--}}
{{--                <div class="text">--}}
            <img class="image" src="{{ $vehicle['image'] }}" alt="Descrição da Imagem">
            <h1>{{ $vehicle['name'] ?? 'Veiculo desconhecido' }}</h1>
            @empty($vehicle['pre-requisite'])
                @else
                <p><b>Pré-requisitos:</b> {{ empty($vehicle['pre-requisite']) ?'Sem pré-requisito'  : $vehicle['pre-requisite']  }}</p>
                @endempty
                @empty($vehicle['local'])
                @else
                <p><b>Local:</b> {{ $vehicle['local'] ?? 'Local desconhecido' }}</p>
                @endempty
                @empty($vehicle['objective'])
                @else
                <p><b>Objetivo:</b> {{ $vehicle['objective'] ?? 'Objetivo desconhecido' }}</p>
                @endempty
                @empty($vehicle['description'])
                @else
                <p><b>Descrição:</b> {{ $vehicle['description'] ?? 'Descrição desconhecida' }}</p>
                @endempty
{{--            </div>--}}
        </div>
    </div>
@endsection

@section('style')
    .container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
    max-width:490px;
    border: solid;
    padding-bottom: 20px;
    font-size: 24px;
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
    flex-direction: column;
    align-items: center;
    justify-content: center;
    overflow:hidden;
    }

    .image {
    max-width:490px;
    height: 300px;
    border-radius: 30px 30px 0px 0;
    overflow:hidden;
    margin: auto;
    }

{{--    .text {--}}
{{--    max-width: 60%; /* Limita a largura do texto para não ocupar toda a largura quando a tela é grande */--}}
{{--    }--}}

    h1 {
    text-align: center; /* Centraliza o conteúdo */
    margin: 15px 0px;
    text-transform: Capitalize;
    }

    p {
    padding: 4px 15px;
    text-align: justify;

    }
@endsection

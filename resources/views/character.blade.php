@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="content">
            <div class="image">
                <img src="{{ $character['image'] }}" alt="Descrição da Imagem">
            </div>
            <div class="text">
                <h1>{{ $character['name'] ?? 'Personagem desconhecido' }}</h1>
                <p><b>Idade:</b> {{ empty($character['age']) ?'Idade desconhecida'  : $character['age']  }}</p>
                <p><b>Classe
                        social:</b> {{ empty($character['social_class']) ?'Classe social desconhecida'  : $character['social_class']  }}
                </p>
                <p><b>Habilidade Especial:</b> {{ $character['special_ability'] ?? 'habilidade especial desconhecida' }}
                </p>
                <p><b>Casa:</b> {{ $character['home'] ?? 'Casa desconhecida' }}</p>
                <p><b>Emprego:</b> {{ $character['job'] ?? 'Emprego desconhecido' }}</p>
                <p><b>Missões:</b>
                    @foreach($character['quests'] as $quest)
                        <a href="{{ $quest['link'] ? route('quest', $quest['link']) : '#'}}">{{ $quest['title'] ?? '' }}</a>{{ !$loop->last ? ', ' : '' }}
                    @endforeach

                @empty($character['quests'])
                    Nenhuma missão para esse personagem.
                @endempty
                </p>
            </div>
        </div>
    </div>
@endsection

@section('style')
    .container {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 20px;
    padding 20px;
    border: solid;
    border-radius: 30px;
    }

    .content {
    display: flex;
    gap: 20px;
    margin-right: 5px;
    }

    .image img {
    min-height: 250px;
    border-radius:30px 0 0 30px;
    }

    .text {
    margin 20px;
    padding 20px;
    }

    .text h1 {
    margin-bottom: 10px;
    text-transform: Capitalize;
    }

    p {
    font-size: 28px;
    }

    p a {
    text-align: center; /* Centraliza o conteúdo */
    font-size: 28px;
    font-weight: bold; /* Aplica negrito */
    text-decoration: none; /* Remove o sublinhado */
    color: #444;
    transition: color 0.5s ease; /* Define a animação para a propriedade color */
    }

    p a:hover {
    color: #a9a9a9; /* Define a cor do texto para preto (ou qualquer outra cor desejada) */
    }

    hr {
    margin-top: 20px;
    }
@endsection

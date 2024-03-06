@extends('layout.layout')

@section('content')
    <p>
    No âmbito do desenvolvimento do nosso projeto, foi acordado que o escopo do trabalho se concentraria em fornecer informações relevantes sobre o Grand Theft Auto V (GTA 5), um dos jogos mais emblemáticos e detalhados da atualidade. Para alcançar esse objetivo, decidimos adotar uma abordagem estruturada e sistemática na organização das informações relacionadas ao jogo.
    </p><p>
    A primeira etapa do nosso processo envolveu a definição da ontologia do projeto. Para isso, utilizamos o Protégé, uma ferramenta de software livre e de código aberto que nos permitiu modelar a ontologia de forma eficaz. Usamos o Protégé para o mapeamento dos conceitos, relações e hierarquias que queríamos representar sobre o universo do GTA 5.
    </p><p>
    Após a modelagem da ontologia, procedemos com a exportação dos dados para um formato JSON-LD utilizando o próprio Protégé. Esse formato de dados, baseado em JSON para vincular dados, foi escolhido por sua flexibilidade e facilidade de integração com tecnologias web, facilitando o próximo passo do nosso trabalho.
    </p><p>
    Para apresentar as informações de uma maneira mais acessível e visualmente atraente, optamos pelo desenvolvimento de uma aplicação web. Essa aplicação foi construída utilizando PHP juntamente com o framework Laravel, uma escolha que nos proporcionou robustez e eficiência na manipulação dos dados e na implementação das funcionalidades desejadas.
    </p><p>
    A aplicação desenvolvida concentra-se em exibir informações detalhadas os personagens principais de GTA 5 e suas conexões com algumas missões secretas presentes no jogo. Essas informações, derivadas diretamente dos dados organizados em nossa ontologia e representadas no JSON-LD.
    </p>
@endsection

@section('style')
    p {
    font-family: 'Arial', sans-serif; /* Define a fonte */
    font-size: 26px; /* Tamanho da fonte */
    line-height: 1.5; /* Espaçamento entre linhas */
    color: #333; /* Cor do texto */
    margin-top: 15px; /* Margem superior */
    margin-bottom: 0px; /* Margem inferior */
    text-align: justify; /* Justifica o texto para um fluxo suave */
    }

@endsection

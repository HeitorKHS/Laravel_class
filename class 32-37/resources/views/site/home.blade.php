@extends('site/layout')
@section('titulo', 'Essa é a pagina home')
@section('conteudo')

    {{--Isso é um comentário--}}

    {{-- Podemos utilizar codigos php, utilizando a diretriz do php
        @php
        @endphp
    --}}

    {{-- Se houver a variavel $home ele exibe existe se não o contrario
        {{@isset($home) ? 'existe' : 'não existe'}}
    --}}

    {{-- Se não houver a variavel teste ele vai criar com valor padrão
        {{ $teste ?? 'padrão' }}
    --}}
    


    {{-- Estrutura de controle --}}

    {{-- if e unless
        @if ($nome == 'Heitor')
            true
        @else
            false
        @endif

        O contrario de if se a condição for falsa ele exibe true
        @unless ($nome == 'Heitor') 
            true
        @else
            false
        @endunless
    --}}

    {{-- Switch 
        @switch($idade)
            @case(28)
                idade está ok
                @break
            @case(29)
                idade está errada
                @break
            @default
                default
        @endswitch
    --}}

    {{-- isset verifica se a varaivel existe 
        @isset($nome)
            existe
        @endisset
    --}}

    {{-- empty verifica se a variavel esta vazia
        @empty($nome)
            vazia
        @endempty
    --}}

    {{-- auth verifica se esta autenticado
        @auth
            está autenticado
        @endauth
    --}}

    {{-- guest verifica se não esta autenticado
        @guest
            não está autenticado
        @endguest
    --}}





    {{-- Estrutura de repetição --}}

    {{-- for
        @for ($i = 0; $i <= 10; $i++)
        @endfor
    --}}

    {{-- while
        @while ($i <= 10)
            @php $i++ @endphp
        @endwhile
    --}}

    {{--
        @foreach ($frutas as $fruta)
            {{$fruta}}<br>
        @endforeach
    --}}

    {{-- Para exibir um valor padrão caso array esteja vazio utilize o forelse
        @forelse ($frutas as $fruta)
            {{$fruta}}<br>
        @empty
            array está vazio
        @endforelse
    --}}

@endsection()
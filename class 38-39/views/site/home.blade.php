@extends('site/layout')
@section('titulo', 'Essa é a pagina home')
@section('conteudo')

@include('includes/mensagem', ['titulo' => 'Mensagem de sucesso !'])

@component('components/sidebar')
    @slot('paragrafo')
        Texto qualquer vindo do slot
    @endslot
@endcomponent

@push('css')
    <link rel="stylesheet" href="">
@endpush

@push('script')
    <script src=""></script>
@endpush

@endsection()
@extends('adminlte::page')

@section('title', 'Bitácora')

@section('content_header')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
           
                <h1> Bitácora Rancho Peralta</h1>
            
        </div>
    </div>
</section>
@stop

@section('content')
@livewireStyles
@livewire('tabla-bitacora')


@livewireScripts
@stop
@extends('adminlte::page')

@section('title', 'Perfil')
@section('content')
<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        @livewire('profile.update-profile-information-form')

        <x-jet-section-border />
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        @livewire('profile.update-password-form')

        <x-jet-section-border />
        @endif

        
    
</x-app-layout>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop
@extends('errors::minimal')

@section('title', __('Demasiada solicitudes'))
@section('code', '429')
@section('message', __('Demasiados intentos de login, puede recuperar su contraseña o comunicarse con el administrador de seguridad.'))

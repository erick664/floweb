@extends('frontEnd.layouts.master')
@section('title','Review Order Page')
@section('slider')
@endsection
@section('content')
    <div class="container">
        <h3 class="text-center">SU ORDEN HA SIDO PUESTA</h3>
        <p class="text-center">Gracias por su pedido que utiliza Opciones en efectivo a la entrega</p>
        <p class="text-center">Nos pondremos en contacto contigo por tu correo electrónico.(<b>{{$user_order->users_email}}</b>) or Your Phone Number (<b>{{$user_order->mobile}}</b>)</p>
    </div>
    <div style="margin-bottom: 20px;"></div>
@endsection

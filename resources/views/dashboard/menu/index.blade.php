@extends('dashboard.layout')


@php
    $action = request('action');
@endphp

@section('content')
    {!! Menu::render() !!}


    @if ($action)
        <a href="/dashboard/menu" class="btn btn-secondary">Back Menu</a>
    @endif


    {!! Menu::scripts() !!}


    <style>
        .field-css-classes {
            margin: 2rem 0rem !important;
        }

        .description-thin {
            margin: 2rem 0rem !important;
        }
    </style>
@endsection

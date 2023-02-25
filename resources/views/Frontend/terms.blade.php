@extends('Frontend.Layout.layout')

@section('breadcum')
    <div class="col-12 text-center">
        <h1 class="text-white animated slideInDown">Terms and Conditions</h1>
        <hr class="bg-white mx-auto mt-0" style="width: 90px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-white" href="{{route('AdminHome')}}">Home</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Privacy Policy</li>
            </ol>
        </nav>
    </div>
@endsection

@section('mainContent')
    <div class="container">
        @foreach ($terms as $term)
        <div class="row" id="longdescription">
            <h1>{{ $term->heading }}</h1>
            <div>{!! html_entity_decode($term->longdescription) !!}</div>
        </div>
        @endforeach
    </div>
@endsection

@extends('Frontend.Layout.layout')

@section('breadcum')
    <div class="col-12 text-center">
        <h1 class="text-white animated slideInDown">Privacy Policy</h1>
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
        @foreach ($privacyPolicies as $privacyPolicy)
            <h2>{{ $privacyPolicy->heading }}</h2>
            <div>{!! html_entity_decode($privacyPolicy->longdescription) !!}</div>
        @endforeach
    </div>
@endsection

@extends('user.layout')

@section('content')

    <h1 class="text-center"> Welcome</h1>

    @if (Session::get('status'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('status') }}
        </div>
    @endif
    
@endsection

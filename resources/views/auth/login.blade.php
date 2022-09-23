@extends('layouts.app')

@section('content')
<a href="{{ route('social.oauth', 'github') }}" class="btn btn-default btn-block">
    Login with Github
</a>
@endsection


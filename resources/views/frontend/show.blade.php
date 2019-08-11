@extends('layouts.app')

@section('content')
@switch($business->account_type)
@case(2)
@include('themes.premium')
@break
@default
@include('themes.free')
@endswitch
@endsection
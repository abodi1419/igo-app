@extends('customers.layouts.app')
@section('title',__('Home'))
@section('content')
@dump(auth()->user())
@endsection

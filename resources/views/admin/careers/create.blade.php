@extends('layouts.admin')

@section('title', 'Add Career Listing')
@section('subtitle', 'Create a new job opening')

@section('content')

@include('admin.careers._form', [
    'action'  => route('admin.careers.store'),
    'method'  => 'POST',
    'career'  => null,
    'btnText' => 'Create Listing',
])

@endsection

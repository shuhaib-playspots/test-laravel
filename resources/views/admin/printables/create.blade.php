@extends('layouts.admin')

@section('title', 'Upload Material')
@section('subtitle', 'Add a new downloadable study material')

@section('content')
@include('admin.printables._form', [
    'action'    => route('admin.printables.store'),
    'method'    => 'POST',
    'printable' => null,
    'btnText'   => 'Upload Material',
])
@endsection

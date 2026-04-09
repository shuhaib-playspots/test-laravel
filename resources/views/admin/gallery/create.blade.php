@extends('layouts.admin')

@section('title', 'Upload Photo')
@section('subtitle', 'Add a new photo to the gallery')

@section('content')

@include('admin.gallery._form', [
    'action'  => route('admin.gallery.store'),
    'method'  => 'POST',
    'image'   => null,
    'btnText' => 'Upload Photo',
])

@endsection

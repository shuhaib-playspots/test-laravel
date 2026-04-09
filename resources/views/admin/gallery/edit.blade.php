@extends('layouts.admin')

@section('title', 'Edit Photo')
@section('subtitle', $image->title ?? 'Edit gallery photo')

@section('content')

@include('admin.gallery._form', [
    'action'  => route('admin.gallery.update', $image->id),
    'method'  => 'PUT',
    'image'   => $image,
    'btnText' => 'Save Changes',
])

@endsection

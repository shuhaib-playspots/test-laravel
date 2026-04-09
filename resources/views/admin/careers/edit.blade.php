@extends('layouts.admin')

@section('title', 'Edit Career Listing')
@section('subtitle', $career->title)

@section('content')

@include('admin.careers._form', [
    'action'  => route('admin.careers.update', $career->id),
    'method'  => 'PUT',
    'career'  => $career,
    'btnText' => 'Save Changes',
])

@endsection

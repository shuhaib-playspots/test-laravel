@extends('layouts.admin')

@section('title', 'Add New Course')
@section('subtitle', 'Create a new course for the platform')

@section('content')
@include('admin.courses._form', [
    'action'  => route('admin.courses.store'),
    'method'  => 'POST',
    'course'  => null,
    'btnText' => 'Create Course',
])
@endsection

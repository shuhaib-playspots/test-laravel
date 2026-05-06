@extends('layouts.admin')

@section('title', 'Add Job Listing')
@section('subtitle', 'Create a new job opening')

@section('content')

@include('admin.jobs._form', [
    'action'  => route('admin.jobs.store'),
    'method'  => 'POST',
    'career'  => null,
    'btnText' => 'Create Listing',
])

@endsection

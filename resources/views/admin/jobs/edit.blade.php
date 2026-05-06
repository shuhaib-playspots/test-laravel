@extends('layouts.admin')

@section('title', 'Edit Job Listing')
@section('subtitle', $career->title)

@section('content')

@include('admin.jobs._form', [
    'action'  => route('admin.jobs.update', $career->id),
    'method'  => 'PUT',
    'career'  => $career,
    'btnText' => 'Save Changes',
])

@endsection

@extends('layouts.admin')

@section('title', 'Edit Course')
@section('subtitle', $course->name)

@section('content')
@include('admin.courses._form', [
    'action'  => route('admin.courses.update', $course->id),
    'method'  => 'PUT',
    'course'  => $course,
    'btnText' => 'Save Changes',
])
@endsection

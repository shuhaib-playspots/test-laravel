@extends('layouts.admin')

@section('title', 'Edit Material')
@section('subtitle', 'Update study material details')

@section('content')
@include('admin.printables._form', [
    'action'    => route('admin.printables.update', $printable->id),
    'method'    => 'PATCH',
    'printable' => $printable,
    'btnText'   => 'Save Changes',
])
@endsection

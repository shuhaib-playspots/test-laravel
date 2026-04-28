@extends('layouts.admin')

@section('title', 'Upload Post')
@section('subtitle', 'Add a new image to the posts feed')

@section('content')
    @include('admin.posts._form', [
        'action' => route('admin.posts.store'),
    ])
@endsection

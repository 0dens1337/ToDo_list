@extends('layouts.app')
@section('title')
    Home
@endsection
@section('main')
    <main class="px-3 h-100">
        <div class="h-100 m-auto d-flex flex-column justify-content-center flex-grow-1">
            <h1>Create your own To-Do lists in one press!</h1>
            <p class="lead">Fast & Simple solution for everyone!<br> Click the button below and create your 1st list.</p>
            <p class="lead">
                <a href="/tasks/create" class="btn btn-lg btn-outline-info">Create</a>
                <a href="/tasks" class="btn btn-lg btn-outline-secondary w-10">Tasks</a>
            </p>
        </div>
    </main>
@endsection

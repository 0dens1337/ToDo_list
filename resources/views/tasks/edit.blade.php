@extends('layouts.app')

@include('tasks.form', [
    'method' => 'PUT',
    'action' => route('tasks.update', $task),
])

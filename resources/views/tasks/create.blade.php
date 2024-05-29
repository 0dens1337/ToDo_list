@extends('layouts.app')

@include('tasks.form', [
    'method' => 'POST',
    'action' => route('tasks.store'),
])

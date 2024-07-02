@extends('layouts.app')
@include('folders.form', [
    'method' => 'PUT',
    'action' => route('folders.update', $folder)
])

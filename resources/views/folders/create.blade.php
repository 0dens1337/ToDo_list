@extends('layouts.app')
@include('folders.form', [
    'method' => 'POST',
    'action' => route('folders.store')
    ])

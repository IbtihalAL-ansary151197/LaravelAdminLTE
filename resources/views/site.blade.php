@extends('layouts.app')
@section('content')
    <br>
    <br>
    <br>
    <div class="container">
        <p class="alert alert-success"> You are user And You Are Login </p>
    </div>
    <form action="{{route('test.login', ['id'=>1])}}"></form>
    @stop
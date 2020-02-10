@extends('admin.layouts.master')
@section('title','Admin Dashboard')
@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}""
        </div>
    @endif
    <div class="content-text"><p class="text">Dashboard</p></div>
@endsection


<?php
$title = '投稿登録';
?>
@extends('back.layouts.base')
 
@section('content')
    <div class="card-header">{{ $title }}</div>
    <div class="card-body">
        {{ Form::open(['route' => 'back.reports.store']) }}
        @include('back.reports._form')
        {{ Form::close() }}
    </div>
@endsection
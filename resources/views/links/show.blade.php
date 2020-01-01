@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <a href="/links" class="btn btn-default mt-2">Go back</a>
            <div class="card mt-3">
                <div class="card-body">
                <a href="{$link->url}"><h3>{{$link->title}}</h3></a>
                <p>
                    {{$link->description}}
                </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
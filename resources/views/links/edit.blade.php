@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row mx-auto">
        
        <div class="col-md-8">
            <h3>Add a new Link</h3>
            {!!Form::open(['action'=>['LinksController@update', $link->id],'method'=>'POST', 'class'=>'form'])!!}
            {{Form::hidden('_method', 'PUT')}}
            <div class="form-group">
                {{Form::label('title', 'Title')}}
                {{Form::text('title', $link->title,['class'=>'form-control','placeholder'=>'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('url','Url')}}
                {{Form::text('url', $link->url, ['class'=>'form-control', 'placeholder'=>'Url'])}}
            </div>
            <div class="form-group">
                {{Form::label('description','Description')}}
                {{Form::textarea('description', $link->description,['class'=>'form-control', 'placeholder'=>'Url Description'])}}
            </div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
        </div>
    </div>
</div>
@endsection
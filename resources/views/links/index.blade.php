@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Links</div>
    
                    <div class="card-body">
                        <a href="/links/create" class="btn btn-primary btn-sm mb-3">add link</a>
                       @if (count($links)>0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($links as $link)
                                <tr>
                                    <td>{{$link->title}}</td>
                                    <td>{{$link->description}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="/links/{{$link->id}}/edit" class="btn btn-success btn-sm">Edit</a>
                                                {!!Form::open(['action'=>['LinksController@destroy',$link->id], 'method'=>'POST', 'class'=>'ml-2'])!!}
                                                    {{Form::hidden('_method','DELETE')}}
                                                    {{Form::submit('Delete',['class'=>'btn btn-danger btn-sm '])}}
                                                {!!Form::close()!!}
                                        <a href="/links/{{$link->id}}" class="btn btn-info btn-sm ml-2">View</a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                           
                       @else
                           
                       @endif
                    </div>
                </div>
        </div>
    </div>
@endsection
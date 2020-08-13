@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{URL::to('replymessage', ['id'=>$feedback->id])}}">
                        {{ csrf_field() }}

<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-8">
        <div class="card">
            <div class="card-header">
            <div class="form-group">
            <div class="col-md-8">
            <p >{{$feedback->feedbackMessage}}</p>
            </div>
            </div>


            <div class="form-group">
            <div class="col-md-8">
            <span class="pull-right">{{$feedback->reply}}</span>
            </div>
            </div>

                <div class="form-group">
                <div class="col-md-8">
                <input type="text" id="reply" class="form-control" name="reply" placeholder="Type message here" required>
                <br>
                <button type="submit" class="btn btn-success pull-right">Send</button>
                </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
        </div>
    </div>
</div>

</div>

@endsection

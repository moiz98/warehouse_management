@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">USER Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ( Auth::user()->status )
                        You are logged in USER    
                    @else
                        Verify email
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

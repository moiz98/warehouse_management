{{-- this is where user updates his address --}}

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
            <div class="panel-heading">Edit {{$address->address_type}} Address</div>

                <div class="panel-body">
                    <form class="form-horizontal" action="{{ route('addresses.update',$address->id) }}" method="POST">
                        {{ csrf_field() }}
                        
                    {{-- <h5>Address Details</h5> --}}
                        <div class="form-group{{ $errors->has('house') ? ' has-error' : '' }}">
                            <label for="house" class="col-md-4 control-label">House/Street</label>

                            <div class="col-md-6">
                                <input id="house" type="text" class="form-control" name="house" value="{{ old('house') }}" required autofocus>

                                @if ($errors->has('house'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('house') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="country" class="col-md-4 control-label">Country</label>
                            <div class="col-md-6">
                                <select name="country" class="countries order-alpha" id="countryId">
                                        <option value="">Select Country</option>
                                </select>
                            </div> 
                        </div>
                        <div class="form-group">
                            <label for="state" class="col-md-4 control-label">Province/State</label>
                            <div class="col-md-6">
                                <select name="state" class="states order-alpha" id="stateId">
                                       <option value="">Select State</option>
                                </select>
                            </div> 
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-md-4 control-label">City</label>
                            <div class="col-md-6">
                                <select name="city" class="cities order-alpha" id="cityId">
                                        <option value="">Select City</option>
                                </select>
                            </div> 
                        </div>
                            
                    {{-- <h5>Account Details</h5> --}}
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('feeder.master')

@section('service_active')
    active
@stop

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new Feeder</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_feeder', 'method' => 'POST'])}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Feeder Code</label>
                                        <input type="text" class="form-control" placeholder="Feeder Code" name="feeder_code" value="{{old('feeder_code')}}">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Area Office</label>
                                                <select class="form-control" name="area_office" value="{{old('area_office')}}">
                                                    <option value="">
                                                        Select Area Office
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Injection/Sub</label>
                                                <select class="form-control" name="area_office" value="{{old('area_office')}}">
                                                    <option value="">
                                                        Select Injection/Sub
                                                    </option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Add Feeder</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.sessions')
                @include('layouts.errors')
            </div>
        </div>
    </div>
@stop
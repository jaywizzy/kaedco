@extends('areaoffice.master')

@section('service_active')
    active
@stop

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit Area Office</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_update', 'method' => 'PUT'])}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Area Office name" name="area_office_name" value="{{old('area_office_name')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>NERC Code</label>
                                        <input type="text" class="form-control" placeholder="Enter NERC Code" name="nerc_code" value="{{old('nerc_code')}}">
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>KAEDCO Code</label>
                                        <input type="text" class="form-control" placeholder="Enter KAEDCO Code" name="kaedc_code" value="{{old('kaedc_code')}}">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                            <div class="clearfix"></div>
                        {{ Form::close() }}
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
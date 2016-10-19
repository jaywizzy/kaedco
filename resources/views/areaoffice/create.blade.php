@extends('layouts.main')

@section('navbar')
    @include('areaoffice.navbar')
@stop

@section('areaoffice_active')
    active
@stop

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new Area Office</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_area_office', 'method' => 'POST'])}}
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
                                        <input type="text" class="form-control" placeholder="Enter NERC Code" name="nerc_code" value="{{old('nerc_code')}}" maxlength="2">
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>KAEDCO Code</label>
                                        <input type="text" class="form-control" placeholder="Enter KAEDCO Code" name="kaedc_code" value="{{old('kaedc_code')}}" maxlength="2">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
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
@extends('transformer.master')

@section('service_active')
    active
@stop

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new Transformer</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_transformer', 'method' => 'POST'])}}
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
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.sessions')
                @include('layouts.errors')
            </div>

            <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Area Office Name</th>
                            <th>NERC Code</th>
                            <th>KAEDCO Code</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Area Office Name</th>
                            <th>NERC Code</th>
                            <th>KAEDCO Code</th>                            
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach( $areaOffices as $areaoffice )
                            <tr>                                    
                                <td>{{ $areaoffice->area_office_name }} </td>
                                <td>{{ $areaoffice->nerc_code }}</td>
                                <td>{{ $areaoffice->kaedc_code }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
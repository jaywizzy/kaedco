@extends('substation.master')

@section('service_active')
    active
@stop

@section('content')
	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new Sub-Station</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_substation', 'method' => 'POST'])}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Sub-Station Name" name="substation_name" value="{{old('substation_name')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>INJECTION CODE</label>
                                        <input type="text" class="form-control" placeholder="Enter Injection Code" name="injection_code" value="{{old('injection_code')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>AREA OFFICE</label>
                                        <select class="form-control" name="area_office_name" value="{{old('area_office_name')}}">
                                            @foreach($areaoffices as $areaoffice)
                                                <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}">   
                                                    {{$areaoffice->area_office_name}}
                                                </option>
                                            @endforeach
                                        </select>

                                
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
                            <th>Sub-Station Name</th>
                            <th>Injection Code</th>
                            <th>Area Office Kaedc</th>
                            <th>Area Office Kaedc</th>
                        </tr>
                    </thead>
                  
                    <tbody>
                        @foreach( $substations as $substation )
                            <tr>                                    
                                <td>{{ $substation->substation_name }} </td>
                                <td>{{ $substation->injection_code }}</td>
                                <td>{{ $substation->area_office_nerc }}</td>
                                <td>{{ $substation->area_office_kaedc }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
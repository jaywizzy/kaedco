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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Feeder Nerc Code</label>
                                            <input type="text" class="form-control" placeholder="Feeder Nerc Code" name="feeder_nerc_code" value="{{old('feeder_nerc_code')}}" maxlength="2">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Feeder Kaedc Code</label>
                                            <input type="text" class="form-control" placeholder="Feeder Kaedc Code" name="feeder_kaedc_code" value="{{old('feeder_kaedc_code')}}" maxlength="2">
                                        </div>
                                    </div>
                                </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Area Office</label>
                                                <select class="form-control" name="area_office_name" value="{{old('area_office_name')}}" id="area_office_dropdown">
                                                    @foreach($areaoffices as $areaoffice)
                                                        <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}">{{$areaoffice->area_office_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Injection Sub-station</label>
                                                <select class="form-control" name="substation_name" value="{{old('substation_name')}}" id="substation_dropdown">
                                                   @foreach($substations as $substation)
                                                        <option value="{{$substation->injection_nerc_code . $substation->injection_kaedc_code}}">{{$substation->substation_name}}</option>
                                                    @endforeach
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

            <div class="col-md-12">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Feeder Name</th>
                            <th>Feeder Nerc Code</th>
                            <th>Feeder Kaedc Code</th>
                            <th>NERC Injection Code</th>
                            <th>KAEDC Injection Code</th>
                            <th>NERC Area Office Code</th>
                            <th>KAEDC Area Office Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($feeders as $feeder)
                            <tr>                                    
                                <td>{{ $feeder->name }} </td>
                                <td>{{ $feeder->feeder_nerc_code }}</td>
                                <td>{{ $feeder->feeder_kaedc_code }}</td>
                                <td>{{ $feeder->injection_code_nerc }}</td>
                                <td>{{ $feeder->injection_code_kaedc }}</td>
                                <td>{{ $feeder->area_office_code_nerc }}</td>
                                <td>{{ $feeder->area_office_code_kaedc }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
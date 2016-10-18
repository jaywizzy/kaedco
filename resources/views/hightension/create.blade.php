@extends('hightension.master')

@section('hightension_active')
    active
@stop

@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add new High Tension</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_hightension', 'method' => 'POST'])}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" placeholder="Name" name="name" value="{{old('name')}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>High Tension Nerc code</label>
                                        <input type="text" class="form-control" placeholder="High Tension Nerc Code" name="high_tension_nerc_code" value="{{old('high_tension_nerc_code')}}" maxlength="4">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>High Tension Kaedc Code</label>
                                        <input type="text" class="form-control" placeholder="High Tension Kaedc Code" name="high_tension_kaedc_code" value="{{old('high_tension_kaedc_code')}}" maxlength="4">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-4">
                                        <div class="form-group">
                                                <label>Area Office</label>
                                                <select class="form-control" name="area_office_name" value="{{old('area_office_name')}}">
                                                    @foreach($areaoffices as $areaoffice)
                                                        <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}">{{$areaoffice->area_office_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Substation</label>
                                        <select class="form-control" name="substation_name" value="{{old('substation_name')}}">
                                            @foreach ($substations as $substation)
                                                <option value="{{$substation->injection_nerc_code . $substation->injection_kaedc_code}}"> {{$substation->substation_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            	<div class="col-md-4">
                                    <div class="form-group">
                                        <label>Feeder</label>
                                          <select class="form-control" name="feeder_name" value="{{old('feeder_name')}}">
                                            @foreach ($feeders as $feeder)
                                                <option value="{{$feeder->feeder_nerc_code . $feeder->feeder_kaedc_code}}"> {{$feeder->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Add High Tension</button>
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
                            <th>High Tension Name</th>
                            <th>High Tension Nerc Code</th>
                            <th>High Tension Kaedc Code</th>
                            <th>Feeder Nerc Code</th>
                            <th>Feeder Kaedc Code</th>
                            <th>NERC Injection Code</th>
                            <th>KAEDC Injection Code</th>
                            <th>NERC Area Office Code</th>
                            <th>KAEDC Area Office Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($hightensions as $hightension)
                            <tr>                                    
                                <td>{{ $hightension->name }} </td>
                                <td>{{ $hightension->high_tension_nerc_code }} </td>
                                <td>{{ $hightension->high_tension_kaedc_code }} </td>
                                <td>{{ $hightension->feeder_nerc_code }}</td>
                                <td>{{ $hightension->feeder_kaedc_code }}</td>
                                <td>{{ $hightension->injection_nerc_code }}</td>
                                <td>{{ $hightension->injection_kaedc_code }}</td>
                                <td>{{ $hightension->area_office_nerc_code }}</td>
                                <td>{{ $hightension->area_office_kaedc_code }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
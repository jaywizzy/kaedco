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
                                        <input type="text" class="form-control" placeholder="Enter Transformer name" name="name" value="{{old('name')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> TRANSFORMER NERC Code</label>
                                        <input type="text" class="form-control" placeholder="Enter NERC Code" name="transformer_nerc_code" value="{{old('transformer_nerc_code')}}">
                                    </div>
                                </div>
                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>TRANSFORMER KAEDCO Code</label>
                                        <input type="text" class="form-control" placeholder="Enter KAEDCO Code" name="transformer_kaedc_code" value="{{old('transformer_kaedc_code')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> Area Office </label>
                                        <select class="form-control" name="area_office_name" value="{{old('area_office_name')}}">
                                            @foreach($areaoffices as $areaoffice)
                                                <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}">{{$areaoffice->area_office_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                </div>  
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label> Injection Substation </label>
                                        <select class="form-control" name="substation_name" value="{{old('substation_name')}}">
                                            @foreach ($substations as $substation)
                                                <option value="{{$substation->injection_nerc_code . $substation->injection_kaedc_code}}"> {{$substation->substation_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>                                    
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Feeder</label>
                                          <select class="form-control" name="feeder_name" value="{{old('feeder_name')}}">
                                            @foreach ($feeders as $feeder)
                                                <option value="{{$feeder->feeder_nerc_code . $feeder->feeder_kaedc_code}}"> {{$feeder->name}} </option>
                                            @endforeach
                                        </select>
                                    </div>                              
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>High Tension</label>
                                          <select class="form-control" name="high_tension_name" value="{{old('high_tension')}}">
                                            @foreach ($hightensions as $hightension)
                                                <option value="{{$hightension->high_tension_nerc_code . $hightension->high_tension_kaedc_code}}"> {{$hightension->name}} </option>
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
                            <th>Transformer Name</th>
                            <th>Transformer NERC Code</th>
                            <th>Transformer KAEDC Code</th>
                            <th>High Tension NERC Code</th>
                            <th>High Tension KAEDC Code</th>
                            <th>Injection NERC Code</th>
                            <th>Injection KAEDC Code</th>
                            <th>Feeder NERC Code</th>
                            <th>Feeder KAEDC Code</th>
                            <th>Area Office NERC Code</th>
                            <th>Area Office KAEDC Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach( $transformers as $transformer )
                            <tr>                                    
                                <td>{{ $transformer->name }} </td>
                                <td>{{ $transformer->transformer_nerc_code }}</td>
                                <td>{{ $transformer->transformer_kaedc_code }}</td>
                                <td>{{ $transformer->hightension_code_nerc }}</td>
                                <td>{{ $transformer->hightension_code_kaedc }}</td>
                                <td>{{ $transformer->injection_code_nerc }}</td>
                                <td>{{ $transformer->injection_code_kaedc }}</td>
                                <td>{{ $transformer->feeder_code_nerc }}</td>
                                <td>{{ $transformer->feeder_code_kaedc }}</td>
                                <td>{{ $transformer->areaoffice_code_nerc }}</td>
                                <td>{{ $transformer->areaoffice_code_kaedc }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
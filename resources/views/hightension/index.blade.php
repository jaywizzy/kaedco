
@extends('layouts.main')

@section('navbar')
    @include('hightension.navbar')
@stop

@section('hightension_active')
    active
@stop

@section('stylesheets')
    <link href="/css/responsivemodal.css" rel="stylesheet" />
    <style media="screen">
        body {
            overflow-x: hidden;
            overflow-y: hidden;
        }
    </style>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.errors')
            @include('layouts.sessions')
        </div>
        
        <div class="row">
            @if(count($hightensions) < 1)
                <div>No High Tension yet!</div>
            @else
                @foreach($hightensions as $hightension)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="content">
                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">High Tension Name</p><span style="font-size:15px;">
                                        {{$hightension->name}}</span>
                                </h6><hr>
                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">High Tension NERC Code</p><span style="font-size:15px;">
                                        {{$hightension->high_tension_nerc_code}}</span>
                                </h6><hr>
                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">High Tension KAEDC Code</p><span style="font-size:15px;">
                                        {{$hightension->high_tension_kaedc_code}}</span>
                                </h6><hr>
                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">Feeder Nerc Code</p><span style="font-size:15px;">
                                        {{$hightension->feeder_nerc_code}}</span>
                                </h6><hr>
                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">Feeder Kaedc Code</p><span style="font-size:15px;">
                                        {{$hightension->feeder_kaedc_code}}</span>
                                </h6><hr>

                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">NERC Injection Code</p><span style="font-size:15px;">
                                        {{$hightension->injection_nerc_code}}</span>
                                </h6><hr>

                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">KAEDC Injection Code</p><span style="font-size:15px;">
                                        {{$hightension->injection_kaedc_code}}</span>
                                </h6><hr>

                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">NERC Area Office Code</p><span style="font-size:15px;">
                                        {{$hightension->area_office_nerc_code}}</span>
                                </h6><hr>

                                <h6 style="word-wrap: break-word;text-transform:none;">
                                    <p class="category">KAEDC Area Office Code</p><span style="font-size:15px;">
                                        {{$hightension->area_office_kaedc_code}}</span>
                                </h6>
                                
                                <div class="row">
                                    <div class="modal fade m-medium" id="modal_edit_{{$hightension->high_tension_nerc_code}}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-businessunit" data-backdrop="false">
                                        <div class="modal-dialog" role="document">
                                            {{Form::open(['route' => ['update_hightension', $hightension->nerc_code], 'method' => 'PUT', 'id' => 'showForm'])}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Edit High Tension?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control" placeholder="E.g: Old Airport Business Unit" name="name" value="{{$hightension->area_office_name}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label>High Tension Nerc code</label>
                                        							<input type="text" class="form-control" placeholder="E.g: 1234" name="high_tension_nerc_code" value="{{$hightension->nerc_code}}" maxlength="4">
                                                                </div>
                                                            </div>
                                                 
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                	<label>High Tension Kaedc Code</label>
                                        							<input type="text" class="form-control" placeholder="E.g: 1234" name="high_tension_kaedc_code" value="{{$hightension->kaedc_code}}" maxlength="4">
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
						                                            <label>Area Office</label>
						                                            <select class="form-control" name="area_office_name">
						                                            	<option value="">Select an Area Office</option>
						                                                @foreach($areaoffices as $areaoffice)
						                                                    <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}">{{$areaoffice->area_office_name}}</option>
						                                                    @endforeach
						                                            </select>
						                                           
						                                        </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Substation</label>
							                                        <select class="form-control" name="feeder_name">
							                                          	<option value="">Select a Substation</option>
							                                            @foreach ($substations as $substation)
							                                                <option value="{{$substation->injection_nerc_code . $substation->injection_kaedc_code}}"> {{$substation->substation_name}} </option>
							                                            @endforeach
							                                        </select>
                                                                </div>
                                                            </div>
                                                       
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Feeder</label>
							                                        <select class="form-control" name="feeder_name" value="{{old('feeder_name')}}">
							                                          	<option value="">Select a Feeder</option>
							                                            @foreach ($feeders as $feeder)
							                                                <option value="{{$feeder->feeder_nerc_code . $feeder->feeder_kaedc_code}}"> {{$feeder->name}} </option>
							                                            @endforeach
							                                        </select>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        {{Form::submit('Save', ['class' => 'btn btn-info btn-fill pull-right', 'id' => 'submitBtn'])}}
                                                    </div>
                                                </div>
                                            {{Form::close()}}
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="modal fade m-medium" id="modal_delete_{{$hightension->nerc_code}}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-businessunit" data-backdrop="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Delete Business Unit?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="s-text">Remove <strong>'{{ $hightension->name }}'</strong> from your list of business units? </br><span class="p-text">This cannot be undone.</span></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('delete_hightension', $hightension->nerc_code)}}" class="btn btn-fill btn-danger pull-right">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <a data-toggle="modal" data-target="#modal_edit_{{$hightension->high_tension_nerc_code}}" id="edit-bu-btn" style="cursor:pointer;">
                                            <i class="fa fa-pencil text-warning"></i> Edit
                                        </a>
                                        <a data-toggle="modal" data-target="#modal_delete_{{$hightension->nerc_code}}" id="delete-bu-btn" style="cursor:pointer;margin-left:10px;">
                                            <i class="pe-7s-trash text-warning"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@stop

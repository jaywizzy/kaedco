@extends('layouts.main')

@section('feeder_active')
    active
@stop

@section('navbar')
    @include('feeder.navbar')
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
			@if(count($feeders) < 1)
				<div>No Feeders yet!</div>
			@else
				@foreach($feeders as $feeder)
					<div class="col-md-3">
						<div class="card">
							<div class="content">
								<h6 style="word-wrap: break-word;text-transform: none;"> 
									<p class="category">NAME</p><span style="font-size: 15px;">{{$feeder->name}}</span>
								</h6><hr>
								<h6 style="word-wrap: break-word;text-transform: none;"> 
									<p class="category">CODE</p><span style="font-size: 15px;">{{$feeder->feeder_nerc_code + '/' + $feeder->feeder_kaedc_code}}</span>
								</h6><hr>
								<h6 style="word-wrap: break-word;text-transform: none;"> 
									<p class="category">INJECTION CODE</p><span style="font-size: 15px;">{{$feeder->injection_nerc_code + '/' + $feeder->injection_kaedc_code}}</span>
								</h6><hr>
								<h6 style="word-wrap: break-word;text-transform: none;"> 
									<p class="category">AREA OFFICE CODE</p><span style="font-size: 15px;">{{$feeder->area_office_nerc_code + '/' + $feeder->area_office_kaedc_code}}</span>
								</h6>
								<div class="row">
									<div class="modal fade m-medium" id="modal_edit_{{$feeder->feeder_nerc_code + '/' + $feeder->feeder_kaedc_code}}" tabindex="-1" role="dialog" aria-labelledby="modal-edit-undertaking" data-backdrop="false">
                                        <div class="modal-dialog" role="document">
                                            {{Form::open(['route' => ['update_feeder', $feeder->feeder_nerc_code + '/' + $feeder->feeder_kaedc_code], 'method' => 'PUT', 'id' => 'showForm'])}}
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Edit Feeder?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control" placeholder="E.g: Old Airport Feeder" name="name" value="{{$feeder->name}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Area Office</label>
                                                                    <select name="area_office" class="form-control">
                                                                        <option value="">Area Office</option>
                                                                        @foreach($areaoffices as $areaoffice)
                                                                            <option value="{{ $areaoffice->name }}">{{ $areaoffice->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Injection/Sub station</label>
                                                                    <select name="substation" class="form-control">
                                                                        <option value="">Injection/Sub station</option>
                                                                        @foreach($substations as $substation)
                                                                            <option value="{{ $substation->name }}">{{ $substation->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Feeder</label>
                                                                    <select name="feeder" class="form-control">
                                                                        <option value="">Feeder</option>
                                                                        @foreach($feeders as $feeder)
                                                                            <option value="{{ $feeder->name }}">{{ $feeder->name }}</option>
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
                                    <div class="modal fade m-medium" id="modal_delete_{{$feeder->feeder_nerc_code}}" tabindex="-1" role="dialog" aria-labelledby="modal-delete-undertaking" data-backdrop="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Delete Feeder?</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="s-text">Remove <strong>'{{ $feeder->name }}'</strong> from your list of feeders? </br><span class="p-text">This cannot be undone.</span></p>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{route('delete_feeder', $feeder->feeder_nerc_code)}}" class="btn btn-fill btn-danger pull-right">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr>
                                    <div class="stats">
                                        <a data-toggle="modal" data-target="#modal_edit_{{$feeder->feeder_nerc_code}}" id="edit-bu-btn" style="cursor:pointer;">
                                            <i class="fa fa-pencil text-warning"></i> Edit
                                        </a>
                                        <a data-toggle="modal" data-target="#modal_delete_{{$feeder->feeder_nerc_code}}" id="delete-bu-btn" style="cursor:pointer;margin-left:10px;">
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

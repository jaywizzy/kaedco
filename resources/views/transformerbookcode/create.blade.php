@extends('transformerbookcode.master')

@section('transformerbookcode_active')
    active
@stop

@section('content')

	<div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add New Transformer Book Code</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_transformerbookcode', 'method' => 'POST'])}}
                            <div class="row">
                            	<div class="col-md-4">
                                    <div class="form-group">
                                        <label>Area Office</label>
                                        <select class="form-control" name="area_office_name" value="{{old('area_office_name')}}" id="areaoffice_dropdown">
                                            <option placeholder="Select Area Office">Select Area Office</option>
                                            @foreach($areaoffices as $areaoffice)
                                                <option value="{{$areaoffice->nerc_code . $areaoffice->kaedc_code}}">{{$areaoffice->area_office_name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Transformer</label>
                                        <select class="form-control" name="transcode" value="{{old('transformer_name')}}" id="transformer_dropdown">
                                            <option value="">Select Transformer</option>
                                            @foreach ($transformers as $transformer)
                                                <option value=""> </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            	<div class="col-md-4">
                                    <div class="form-group">
                                        <label>Book Code</label>
                                          <select class="form-control" name="bookcode" value="{{old('bookcode')}}" id="bookcode_dropdown">
                                          <option value="">Select Bookcode</option>
                                            @foreach ($bookcodes as $bookcode)
                                                <option value=""></option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="_token" id="_token" value="{{{ csrf_token() }}}">

                            <button type="submit" class="btn btn-info btn-fill pull-right" id="submitBtn">Add Transformer Book Code</button>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.sessions')
                @include('layouts.errors')
            </div>

            <script type="text/javascript">
                $(function() {
                    var updatetransformerDropdown = function() {
                        if ($('#areaoffice_dropdown').val() == '') {
                            $('#transformer_dropdown').prop('disabled', true);
                        } else {
                            $('#transformer_dropdown').prop('disabled', false);
                        }
                    };
                    updatetransformerDropdown();

                    //csrf token
                    var tok = $('#_token').val();

                    // disable submit button when clicked
                    $("#submitBtn").on("click", function() {
                        $("#submitBtn").addClass("disabled");
                    });
                    
                    $('#areaoffice_dropdown').change(function() {
                        updatetransformerDropdown();

                        $.ajax({
                            "type":"POST",
                            "url": "{{route('ajax_areaoffice')}}",
                            "data": {
                                "_token": tok,
                                "areaofficecode": $('#areaoffice_dropdown').val(),
                            },
                            success: function(data) {
                                $('#transformer_dropdown').empty();
                                $.each(data, function(i, substation) {
                                    $('#transformer_dropdown').append($("<option>").text(transformer['transformer_name']).attr('value', transformer['injection_nerc_code']));
                                });
                                updatesubstationDropdown();
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                            }
                        });
                    });

                    $('#substation_dropdown').change(function() {
                        

                        $.ajax({
                            "type":"POST",
                            "url": "{{route('ajax_substation')}}",
                            "data": {
                                "_token": tok,
                                "substationcode": $('#substation_dropdown').val(),
                            },
                            success: function(data) {
                                $('#feeder_dropdown').empty();
                                $.each(data, function(i, feeder) {
                                    $('#feeder_dropdown').append($("<option>").text(feeder['name']).attr('value', feeder['feeder_nerc_code']));
                                });
                               
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                            }
                        });
                    });
                });
            </script>

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
                </table>
            </div>
        </div>
    </div>

@stop
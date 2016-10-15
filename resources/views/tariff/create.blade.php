@extends('tariff.master')

@section('service_active')
    active
@stop
<style type="text/css">
    .modal-body .form-horizontal .col-sm-2,
    .modal-body .form-horizontal .col-sm-10 {
        width: 100%
    }

    .modal-body .form-horizontal .control-label {
        text-align: left;
    }
    .modal-body .form-horizontal .col-sm-offset-2 {
        margin-left: 15px;
    }
</style>
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Add a Tariff Plan</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'store_tariff', 'method' => 'POST'])}}
                            {{ csrf_token() }}
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tariff Name</label>
                                        <input type="text" class="form-control" placeholder="Service Description" name="tariff_name" value="{{old('tariff_name')}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category" value="{{old('category')}}">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                               
                            </div>

                            <!-- <div class="row">
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="type" value="{{old('type')}}">
                                            <option> type1 </option>
                                            <option> type2 </option>
                                            <option> type3 </option>
                                        </select>
                                    </div>
                                </div>                               
                            </div> -->

                            <div class="row">
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label>Rate</label>
                                        <input type="text" class="form-control" placeholder="Rate" name="rate" value="{{old('rate')}}">
                                    </div>
                                </div>                               
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Add Service</button>
                            <div class="clearfix"></div>
                        {{ Form::close() }}
                    </div>                    
                </div>
            </div>
            <div class="col-md-4">
                @include('layouts.sessions')
                @include('layouts.errors')
            </div>


            <div class="col-md-12">
                <table id="example" class="table hover table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Tariff Name</th>
                            <th>Category</th>
                            <th>Rate</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tariff Name</th>
                            <th>Category</th>
                            <th>Rate</th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($tariffs as $tariff )
                            <tr>                                    
                                <td>{{ $tariff->tariff_name }}</td>
                                <td>{{ $tariff->category->category }}</td>
                                <td>{{ $tariff->rate }}</td>                                    
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <!-- <div class="row"> -->
        <!-- Button trigger modal -->
        

        <!-- Modal -->
        

        <!-- modal ends -->

    <!-- </div> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    <p class="text-center">
        <button class="btn btn-default" data-toggle="modal" data-target="#loginModal">Login</button>
    </p>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="Login" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">Login</h5>
                </div>

                <div class="modal-body">
                    <!-- The form is placed inside the body of modal -->
                    <form id="loginForm" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-3 control-label">Username</label>
                            <div class="col-xs-5">
                                <input type="text" class="form-control" name="username" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-3 control-label">Password</label>
                            <div class="col-xs-5">
                                <input type="password" class="form-control" name="password" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-5 col-xs-offset-3">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#loginForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                username: {
                    validators: {
                        notEmpty: {
                            message: 'The username is required'
                        }
                    }
                },
                password: {
                    validators: {
                        notEmpty: {
                            message: 'The password is required'
                        }
                    }
                }
            }
        });
    });
</script>
@stop

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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tariff Name</th>
                            <th>Category</th>
                            <th>Rate</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($tariffs as $tariff )
                            <tr>                                    
                                <td>{{ $tariff->tariff_name }}</td>
                                <td>{{ $tariff->category->category }}</td>
                                <td>{{ $tariff->rate }}</td>                                    
                                <td>
                                    <a href="{{ route('get_edit') }}" class="btn btn-info btn-fill" >Edit</a>
                                    <a class="btn btn-danger btn-fill" ">Delete</a>
                                </td>
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
        <div class="modal fade" id="myModalHorizontal" tabindex="10000" role="dialog" 
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <button type="button" class="close" 
                           data-dismiss="modal">
                               <span aria-hidden="true">&times;</span>
                               <span class="sr-only">Close</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Edit Tariff Plan</h4>
                    </div>
            
                    <!-- Modal Body -->
                    <div class="modal-body">                    
                        <form class="form-horizontal" role="form" action="">
                            <div class="form-group">
                                <label  class="col-sm-2 control-label" for="tariff_name">Tariff Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tariff_name" class="form-control" value="" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="inputPassword3" >Category</label>
                                <div class="col-sm-10">
                                    <input type="text" name="category" class="form-control"  placeholder="Password"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="rate" >Rate</label>
                                <div class="col-sm-10">
                                    <input type="text" name="rate" class="form-control" placeholder="Rate"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">Sign in</button>
                                </div>
                            </div>
                        </form>        
                    </div>
                    
                    <!-- Modal Footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                    </div>
                </div>
            </div>
        </div>

    <!-- </div> -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@stop

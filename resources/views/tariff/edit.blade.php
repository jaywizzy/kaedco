@extends('tariff.master')

@section('service_active')
    active
@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title">Edit a Tariff Plan</h4>
                    </div>
                    <div class="content">
                        {{Form::open(['route' => 'post_update', 'method' => 'POST'])}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tariff Name</label>
                                        <input type="text" class="form-control" placeholder="Service Description" name="tariff_name" value="{{old('tariff_name') ? old(tariff_name) : $tariff->tariff_name}}">
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
                                    <a href="#" class="btn btn-info btn-fill" >Edit</a>
                                    <a class="btn btn-danger btn-fill" ">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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

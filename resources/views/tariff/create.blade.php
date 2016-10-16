@extends('tariff.master')

@section('service_active')
    active
@stop

<style type="text/css">
    .btn-pad {
        padding-right: 400;
        padding-left: 400;
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
                                        <input type="text" class="form-control" placeholder="Enter Tariff Name" name="tariff_name" value="{{old('tariff_name')}}">
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
                                        <label>Pre Rate</label>
                                        <input type="text" class="form-control" placeholder="Enter Pre Rate" name="pre_rate" value="{{old('pre_rate')}}">
                                    </div>
                                </div>                               
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                     <div class="form-group">
                                        <label>Post Rate</label>
                                        <input type="text" class="form-control" placeholder="Enter Post Rate" name="post_rate" value="{{old('post_rate')}}">
                                    </div>
                                </div>                               
                            </div>

                            <button type="submit" class="btn btn-info btn-fill pull-right btn-pad" style="padding-right: 40; padding-left: 40;">Save Tariff</button>
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
                            <th>Pre Rate</th>
                            <th>Post Rate</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tariff Name</th>
                            <th>Category</th>
                            <th>Pre Rate</th>
                            <th>Post Rate</th>
                            
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($tariffs as $tariff )
                            <tr>                                    
                                <td>{{ $tariff->tariff_name }}</td>
                                <td>{{ $tariff->category->category }}</td>
                                <td>{{ $tariff->pre_rate }}</td>
                                <td>{{ $tariff->post_rate }}</td>
                                
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


@stop

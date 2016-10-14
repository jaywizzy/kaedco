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
                                        <input type="text" class="form-control" placeholder="Service Category" name="category" value="{{old('category')}}">
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
                                <td>{{ $tariff->category }}</td>
                                <td>{{ $tariff->rate }}</td>                                    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>


        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@stop

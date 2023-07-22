@extends('admin.master')

@section('body')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All Training Info</h4>
                    <h5 class="text-success text-center">{{session('message')}}</h5>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Title</th>
                            <th>Starting Date</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($trainings as $training)
                            <tr class="{{$training->status == 1 ? ' ' : 'bg-warning text-white' }}">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$training->title}}</td>
                                <td>{{$training->starting_date}}</td>
                                <td>{{$training->price}}</td>
                                <td>{{$training->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td class="d-flex">
                                    <a href="{{route('admin.training-detail', ['id' => $training->id])}}" class="btn btn-info btn-sm mr-1">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{route('admin.update-training-status', ['id' => $training->id])}}" class="btn btn-success btn-sm mr-1">
                                        <i class="fa fa-arrow-circle-up"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

@endsection


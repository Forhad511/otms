@extends('teacher.master')

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
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$training->title}}</td>
                                <td>{{$training->starting_date}}</td>
                                <td>{{$training->price}}</td>
                                <td>{{$training->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                <td class="d-flex">
                                    <a href="{{route('training.detail', ['id' => $training->id])}}" class="btn btn-info btn-sm mr-1">
                                        <i class="fa fa-book-open"></i>
                                    </a>
                                    <a href="{{route('training.edit', ['id' => $training->id])}}" class="btn btn-success btn-sm mr-1">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('training.delete', ['id' => $training->id])}}" method="POST" onsubmit="return confirm('Are you sure to delete this..')">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
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

@extends('layouts.admin.master')

@section('title')
    Projects
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a class="d-inline-block" href="{{route('project.create')}}"><button type="button" class="btn btn-sm btn-block btn-outline-primary">Add new</button></a>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="60%">Title</th>
                            <th>Created at</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($projects as $project)
                            <tr>
                                <td>{{$project->title}}</td>
                                <td>{{$project->created_at}}</td>
                                <td class="text-right">
                                    <a class="btn btn-primary btn-sm" href="#">
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm" href="{{route('project.edit', $project->id)}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="d-inline-block" onclick="return confirm('Delete it. Are you sure?')">
                                        <form action="{{ route('project.destroy', $project->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input class="btn btn-danger btn-sm" type="submit" value="Delete"/>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

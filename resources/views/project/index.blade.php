@extends('layouts.app') @section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Daftar Project</h4>
                    <p class="card-description">
                        <a href="{{ route('project.create') }}"> <button class="btn btn-primary">Tambah Project</button> </a>
                    </p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Project</th>
                                <th>File</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp @foreach($data as $value)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->file}}</td>
                                <td>
                                    <a type="button" href="{{ route('project.edit',$value->id) }}" class="btn btn-primary ">Edit</a>
                                    <button onclick="candidateDelete( '{{$value->id}}' )" type="button" class="btn btn-danger">Detete</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

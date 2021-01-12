@extends('layouts.app') @section('content')
<div class="row"> 
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Project</h4>
                <form class="forms-sample" action="{{ route('project.update', $data->id) }}"  enctype="multipart/form-data"  method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PATCH">
                    <input type="hidden" name="id" value="{{ $data->id }}">

                    @include('project.form')

                    <button type="submit" class="btn btn-success mr-2">Simpan</button>
                    <button class="btn btn-light">Batal</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection
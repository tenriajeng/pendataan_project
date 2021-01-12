@extends('layouts.app') 
@section('content')
<div class="row"> 
    <div class="col-md-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tambah Project</h4>
                <form class="forms-sample" action="{{ route('project.store') }}" enctype="multipart/form-data" method="POST">
                    {{ csrf_field() }}

                    @include('project.form')

                    <button type="submit" class="btn btn-success mr-2">Simpan</button>
                    <button class="btn btn-light">Batal</button>
                </form>
            </div>
        </div>
    </div> 
</div>
@endsection
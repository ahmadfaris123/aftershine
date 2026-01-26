@extends('admin.layout.admin')

@section('title')
    {{ $title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-8">{{ $title }}</h6>
                    <p>Halaman untuk mengelola data event.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
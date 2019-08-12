@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/dist/kartik-v-bootstrap-fileinput/css/fileinput.min.css">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Brand
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'brands.store', 'enctype'=>'multipart/form-data']) !!}

                        @include('brands.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="/dist/kartik-v-bootstrap-fileinput/js/fileinput.min.js"></script>
@endsection

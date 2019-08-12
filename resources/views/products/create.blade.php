@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="/dist/kartik-v-bootstrap-fileinput/css/fileinput.min.css">
<link rel="stylesheet" href="/dist/bootstrap3-wysihtml5/bootstrap3-wysihtml5.min.css">
<link rel="stylesheet" href="/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'products.store', 'enctype'=>'multipart/form-data']) !!}

                        @include('products.fields')

                    {!! Form::close() !!}

                     <!-- Hidden color field for ext extended Color Feild -->
                        <div class="extended-div hidden">
                            <div class="col-sm-6 colors input-group">
                            {!! Form::text('color[]', null, [
                                'id' => 'color', 
                                'class' => 'form-control colorpicker1', 
                                'multiple' => 'multiple',
                                'placeholder' => 'Colors'] ) !!}
                            <div class="input-group-btn">
                                <button class="btn btn-danger remove-div"><i class="fa fa-times"></i></button>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="/dist/kartik-v-bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="/dist/bootstrap3-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script src="/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<script src="/bower_components/select2/dist/js/select2.min.js"></script>
<script>
$(document).ready(function(){
    //bootstrap3-wysihtml5
    $('.wysihtml5').wysihtml5();

    //Colorpicker
    $('.colorpicker1').colorpicker();

    //Initialize Select2 Elements
    $('.select2').select2();
});
   
</script>
@endsection

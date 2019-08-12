@extends('layouts.app')

@section('css')
    @include('layouts.datatables_css')
@endsection

@section('content')
    
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Categories</li>
</ol>
<section class="content-header">
    <h1 class="pull-left">Categories</h1>
    <h1 class="pull-right">
    <?php $url = route('categories.create'); ?>
        <button class="btn btn-primary pull-right" 
        onclick="showModalForm('Add Category', '{!! $url !!}')" style="margin-top: -10px;margin-bottom: 5px">Add New</button>
    </h1>
</section>
   
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('categories.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

    @include('vendor.flash.modal')
@endsection

@section('scripts')
    @include('layouts.datatables_js')
    <script>
        $(function () {
            $('table').DataTable();
        });
        
    </script>
@endsection
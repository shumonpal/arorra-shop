@extends('layouts.app')



@section('content')
    
<ol class="breadcrumb">
    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Subcategories</li>
</ol>
<section class="content-header">
    <h1 class="pull-left">Categories</h1>
    <h1 class="pull-right">
    <?php $url = route('subcategories.create'); ?>
        <button class="btn btn-primary pull-right" 
        onclick="showModalForm('Add SubCategory', '{!! $url !!}')" style="margin-top: -10px;margin-bottom: 5px">Add New</button>
    </h1>
</section>
   
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('subcategories.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

    @include('vendor.flash.modal')
@endsection



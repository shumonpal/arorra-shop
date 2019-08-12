@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Subcategory
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($subcategory, ['route' => ['subcategories.update', $subcategory->id], 'method' => 'patch']) !!}

                        @include('subcategories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
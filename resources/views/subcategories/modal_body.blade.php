@if(isset($subcategory))
    {!! Form::model($subcategory, ['route' => ['subcategories.update', $subcategory->id], 'method' => 'patch', 'class' => 'errora-form']) !!}
@else
    {!! Form::open(['route' => 'subcategories.store', 'class' => 'errora-form']) !!}
@endif

    @include('subcategories.fields')

{!! Form::close() !!}
@if(isset($category))
    {!! Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch', 'class' => 'errora-form']) !!}
@else
    {!! Form::open(['route' => 'categories.store', 'class' => 'errora-form']) !!}
@endif

    @include('categories.fields')

{!! Form::close() !!}
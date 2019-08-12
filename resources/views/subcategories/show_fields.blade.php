<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $subcategory->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $subcategory->name !!}</p>
</div>

<!-- Descp Field -->
<div class="form-group">
    {!! Form::label('descp', 'Descp:') !!}
    <p>{!! $subcategory->descp !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $subcategory->created_at->diffForHumans() !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $subcategory->updated_at->diffForHumans() !!}</p>
</div>


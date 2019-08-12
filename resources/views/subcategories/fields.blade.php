<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control name']) !!}
</div>

<!-- Descp Field -->
<div class="form-group col-sm-12">
    {!! Form::label('descp', 'Descp:') !!}
    {!! Form::textarea('descp', null, ['class' => 'form-control descp']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="button" class="btn btn-primary" onclick="saveItem('{{$category->id or null}}')">Save</button>
    <a href="{!! route('subcategories.index') !!}" class="btn btn-default">Cancel</a>
</div>

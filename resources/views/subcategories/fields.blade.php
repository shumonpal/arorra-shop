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

<!-- Category Field -->
<div class="form-group col-sm-12">
    {!! Form::label('category_id', 'Name:') !!}
    <?php $categories = $categories->pluck('name', 'id') ?>
    {!! Form::select('category_id', $categories, 'Select Category', ['placeholder' => 'Select Category...', 'class' => 'form-control category_id select2'] ) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="button" class="btn btn-primary" onclick="saveItem('{{$category->id or null}}')">Save</button>
    <a href="{!! route('subcategories.index') !!}" class="btn btn-default">Cancel</a>
</div>

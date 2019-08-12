<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Logo Field -->
<div class="form-group col-sm-12">
    {!! Form::label('logo', 'Logo:') !!}
    <input type="file" name="logo" class="file" data-show-caption="true" data-allowed-file-extensions='["jpg", "png", "jpeg"]' data-msg-placeholder="Select for upload">
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('brands.index') !!}" class="btn btn-default">Cancel</a>
</div>

<!-- Invoice Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoice_id', 'Invoice Id:') !!}
    {!! Form::text('invoice_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Invoice Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invoice_description', 'Invoice Description:') !!}
    {!! Form::text('invoice_description', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::number('status', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('orders.index') !!}" class="btn btn-default">Cancel</a>
</div>


<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $category->name !!}</p>
</div>

<!-- Descp Field -->
<div class="form-group">
    {!! Form::label('descp', 'Descp:') !!}
    <p>{!! $category->descp !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $category->created_at->diffForHumans() !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $category->updated_at->diffForHumans() !!}</p>
</div>

<!-- Submit Field -->
<div class="form-group">
    <button  class="btn btn-default" data-izimodal-close="" data-izimodal-transitionout="bounceOutDown" >Cancel</button>
</div>


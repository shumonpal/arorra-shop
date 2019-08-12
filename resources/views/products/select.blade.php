

<!-- Subcategory Field -->
{!! Form::label('subcategory_id', 'Name:') !!}
<?php $subcategories = $subcategories->pluck('name', 'id') ?>
{!! Form::select('subcategory_id', $subcategories, 'Select Subcategory', ['placeholder' => 'Select Subcategory...', 'class' => 'form-control  select2'] ) !!}

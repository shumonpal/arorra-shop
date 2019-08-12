<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Brad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('brand_id', 'Brand Name:') !!}
    <?php $brands = App\Models\Brand::all(); ?>
    <?php $brands = $brands->pluck('name', 'id') ?>
    {!! Form::select('brand_id', $brands, 'Select Brand', ['placeholder' => 'Select Brand...', 'class' => 'form-control  select2'] ) !!}
</div>
<div class="clearfix"></div>

<!-- Category Field -->
<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Name:') !!}
    <?php $categories = App\Models\Category::all(); ?>
    <?php $categories = $categories->pluck('name', 'id') ?>
    {!! Form::select('category_id', $categories, 'Select Category', ['placeholder' => 'Select Category...',
     'class' => 'form-control  select2 select_item', 'data-url' => route('select')] ) !!}
</div>

<!-- Subcategory Field -->
<div class="form-group col-sm-6 get_item">
    {!! Form::label('subcategory_id', 'Name:') !!}
    {!! Form::select('subcategory_id', [old('subcategory_id') => 'Select Category First'], 'Select Category first', [ 'class' => 'form-control  select2'] ) !!}
</div>


<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Up Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('up_price', 'Up Price:') !!}
    {!! Form::text('up_price', null, ['class' => 'form-control']) !!}
</div>

<!-- short-Descp Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('short_descp', 'Short Description:') !!}
    {!! Form::textarea('short_descp', null, ['class' => 'form-control wysihtml5']) !!}
</div>

<!-- Descp Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('descp', 'Description:') !!}
    {!! Form::textarea('descp', null, ['class' => 'form-control wysihtml5']) !!}
</div>

<!-- Is Featured Field -->
<div class="form-group ">
    <div class="col-sm-6">
        {!! Form::label('is_featured', 'Is Featured:') !!}
        <label class="radio-inline">
            {!! Form::radio('is_featured', "1", null) !!} Yes
        </label>

        <label class="radio-inline">
            {!! Form::radio('is_featured', "0", 'checked') !!} No
        </label>
    </div>

    <!-- Is Discount Field -->
    <div class="col-sm-6">
        {!! Form::label('is_discount', 'Is Discount:') !!}
        <label class="radio-inline">
            {!! Form::radio('is_discount', "1", null) !!} Yes
        </label>

        <label class="radio-inline">
            {!! Form::radio('is_discount', "0", 'checked') !!} No
        </label>

    </div>
</div>



<!-- In Stock Field -->
<div class="form-group col-sm-6">
    {!! Form::label('in_stock', 'In Stock:') !!}
    {!! Form::number('in_stock', null, ['class' => 'form-control']) !!}
</div>

<!-- Composition Field -->
<div class="form-group col-sm-6">
    {!! Form::label('composition_id', 'Composition:') !!}
    <?php $compositions = App\Models\Composition::all(); ?>
    <?php $compositions = $compositions->pluck('name', 'id'); ?>
    {!! Form::select('composition_id', $compositions, 'Select Compositions', ['placeholder' => 'Select Composition...',
     'class' => 'form-control  select2'] ) !!}
</div>

<!-- Banner Image Field -->
<div class="form-group col-sm-12">
    {!! Form::label('banner_image', 'Banner Image:') !!}
    <input type="file" name="banner_image" class="file" data-show-caption="true" data-allowed-file-extensions='["jpg", "png", "jpeg"]' data-msg-placeholder="Select for upload">
</div>
<div class="clearfix"></div>

<!-- Images.... -->
<div class="form-group col-sm-12">
    {!! Form::label('Images(multiple):', null, ['class' => 'control-label']) !!}
        {!! Form::file('image[]', [
            'id' => 'image', 
            'class' => 'file', 
            'multiple' => 'true', 
            'data-show-upload' => false,
            'data-fileinput-upload-btn' => false,
            'data-allowed-file-extensions' => '["jpg", "png", "gif"]'] ) !!}
</div>

<!-- Colors.... -->
<div class="form-group col-sm-12">
    {!! Form::label('Colors(multiple):', null, ['class' => 'control-label']) !!}
    <div class="increment">
        <div class="col-sm-6 colors input-group">
            {!! Form::text('color[]', null, [
            'id' => 'color', 
            'class' => 'form-control colorpicker1', 
            'multiple' => 'multiple',
            'placeholder' => 'Colors'] ) !!}
            <div class="input-group-btn">
            <button class="btn btn-info extended-btn"><i class="fa fa-plus"></i></button>
            </div>
        </div>
    </div>
</div>
              
<!-- Sizes -->
<div class="form-group  col-sm-12">
  {!! Form::label('Sizes(Multiple)', null, ['class' => ' control-label']) !!}
  {!! Form::select('size[]', [
            'small' => 'Small',
            'medium' => 'Medium',
            'large' => 'Large',
            'X' => 'X'
            ], 
            'Select Size', ['placeholder' => 'Select Size...', 'Multiple' => 'Multiple', 'class' => 'form-control select2'] ) !!}
   
</div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>

 
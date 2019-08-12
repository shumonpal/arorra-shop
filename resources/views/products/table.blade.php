<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Brand Id</th>
        <th>Categories Id</th>
        <th>Subcategories Id</th>
        <th>Price</th>
        <th>Up Price</th>
        <th>Descp</th>
        <th>Composition</th>
        <th>Is Featured</th>
        <th>Is Discount</th>
        <th>In Stock</th>
        <th>Banner Image</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            <td>{!! $product->name !!}</td>
            <td>{!! $product->brand_id !!}</td>
            <td>{!! $product->categories_id !!}</td>
            <td>{!! $product->subcategories_id !!}</td>
            <td>{!! $product->price !!}</td>
            <td>{!! $product->up_price !!}</td>
            <td>{!! $product->descp !!}</td>
            <td>{!! $product->composition !!}</td>
            <td>{!! $product->is_featured !!}</td>
            <td>{!! $product->is_discount !!}</td>
            <td>{!! $product->in_stock !!}</td>
            <td>{!! $product->banner_image !!}</td>
            <td>
                {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
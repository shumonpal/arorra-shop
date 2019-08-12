<table class="table table-responsive" id="subcategories-table">
    <thead>
        <tr>
            <th>Name</th>
        <th>Descp</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subcategories as $subcategory)
        @include('subcategories.table_row')        
    @endforeach
    </tbody>
</table>
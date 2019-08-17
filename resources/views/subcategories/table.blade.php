
<table id="example1" class="table table-bordered table-striped table-responsive">
    <thead>
        <tr>
            <th>Name</th>
            <th>Descp</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($subcategories as $subcategory)
        @include('subcategories.table_row')        
    @endforeach
    
    </tbody>
    
</table>


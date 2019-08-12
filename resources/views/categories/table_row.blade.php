<tr class="row-{!! $category->id !!}">
    <td>{!! $category->name !!}</td>
    <td>{!! str_limit($category->descp) !!}</td>
    <td width="100">
        <div class='btn-group'>
            <?php $url = route('categories.show', [$category->id]); ?>
            <button onclick="showModalForm('Details: {!! $category->name !!}', '{!! $url !!}')" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></button>
            <?php $url = route('categories.edit', [$category->id]); ?>
            <button onclick="showModalForm('Edit Category', '{!! $url !!}')" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></button>
            <?php $url = route('categories.destroy', [$category->id]); ?>
            <button onclick="showConfirmModal('Are you sure to delete?', '{!! $url !!}')" class='btn btn-danger btn-xs'><i class="glyphicon glyphicon-trash"></i></button>
        </div>
    </td>
</tr>


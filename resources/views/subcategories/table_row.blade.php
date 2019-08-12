<tr class="row-{!! $subcategory->id !!}">
    <td>{!! $subcategory->name !!}</td>
    <td>{!! str_limit($subcategory->descp) !!}</td>
    <td>
        <td width="100">
            <div class='btn-group'>
                <?php $url = route('subcategories.show', [$subcategory->id]); ?>
                <button onclick="showModalForm('Details: {!! $subcategory->name !!}', '{!! $url !!}')" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></button>
                <?php $url = route('subcategories.edit', [$subcategory->id]); ?>
                <button onclick="showModalForm('Edit subcategory', '{!! $url !!}')" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></button>
                <?php $url = route('subcategories.destroy', [$subcategory->id]); ?>
                <button onclick="showConfirmModal('Are you sure to delete?', '{!! $url !!}')" class='btn btn-danger btn-xs'><i class="glyphicon glyphicon-trash"></i></button>
            </div>
        </td>
    </td>
</tr>
<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
            <tr>
                <th>Payer Id</th>
        <th>Invoice Id</th>
        <th>Invoice Description</th>
        <th>Discount</th>
        <th>User Id</th>
        <th>Payer Email</th>
        <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{!! $order->payer_id !!}</td>
            <td>{!! $order->invoice_id !!}</td>
            <td>{!! $order->invoice_description !!}</td>
            <td>{!! $order->discount !!}</td>
            <td>{!! $order->user_id !!}</td>
            <td>{!! $order->payer_email !!}</td>
            <td>{!! $order->status !!}</td>
                <td>
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

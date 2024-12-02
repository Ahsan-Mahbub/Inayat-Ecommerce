@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Customer Order Table
                </h3>
            </div>
            <div class="block-content block-content-full">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-vcenter">
                        <thead>
                            <tr>
                                <th class="text-center">S/L</th>
                                <th class="text-center">Order Invoice</th>
                                <th class="text-center">Date</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Total Price</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($all_order as $order)
                                <tr>
                                    <td class="text-center">{{ $sl++ }}</td>
                                    <th class="text-center">#{{ $order->invoice }}</th>
                                    <td class="text-center"><?php $date = date('d-m-Y', strtotime($order->created_at)); ?>{{ $date }}</td>
                                    <td class="text-center">{{ $order->customer_id ? 'Customer' : 'Guest' }}</td>
                                    <td class="text-center">{{ $order->name }}</td>
                                    <td class="text-center">৳ {{ $order->total_ammount }}</td>
                                    <td class="text-center">
                                        @if ($order->status == 1)
                                            <span class="badge bg-success">Deliverd</span>
                                        @elseif($order->status == 2)
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($order->status == 0)
                                            <span class="badge bg-danger">Rejected</span>
                                        @endif
    
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <form action="{{ route('order.destroy', $order->id) }}" method="post"
                                                accept-charset="utf-8">
                                                @if ($order->status == 0 || $order->status == 2)
                                                    <div class="btn-group" role="group" aria-label="Third group">
                                                        <button type="button" class="btn btn-secondary dropdown-toggle"
                                                            id="toolbarDrop" data-bs-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">Status</button>
                                                        <div class="dropdown-menu" aria-labelledby="toolbarDrop">
                                                            <a class="dropdown-item"
                                                                href="{{ url('admin/order/status/' . $order->id . '?status=2') }}">
                                                                <i class="fa fa-fw fa-crosshairs opacity-50 me-1"></i>Pending
                                                            </a>
                                                            <a class="dropdown-item"
                                                                href="{{ url('admin/order/status/' . $order->id . '?status=1') }}">
                                                                <i class="fa fa-fw fa-check opacity-50 me-1"></i>Deliverd
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item"
                                                                href="{{ url('admin/order/status/' . $order->id . '?status=0') }}">
                                                                <i class="fa fa-fw fa-trash opacity-50 me-1"></i>Rejected
                                                            </a>
                                                        </div>
                                                    </div>
                                                @endif
                                                <a href="{{ route('order.invoice', $order->id) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
    
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="btn btn-sm btn-danger js-bs-tooltip-enabled delete-confirm">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $all_order->appends(request()->except('page'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

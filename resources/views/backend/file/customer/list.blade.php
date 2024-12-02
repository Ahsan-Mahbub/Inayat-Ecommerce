@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Customer Table
                </h3>
                <a href="{{ route('customer.create') }}" class="btn btn-alt-primary"><i class="fa fa-plus"></i> Add
                    Customer</a>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Customer Name &nbsp;</th>
                            <th class="text-center">Email &nbsp;</th>
                            <th class="text-center">Phone &nbsp;</th>
                            <th class="text-center">Address &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($all_customer as $customer)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">{{ $customer->name }}</td>
                                <td class="text-center">{{ $customer->email }}</td>
                                <td class="text-center">{{ $customer->phone }}</td>
                                <td class="text-center">{{ $customer->address }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('customer.destroy', $customer->id) }}" method="post"
                                            accept-charset="utf-8">
                                            <a href="{{ route('customer.edit', $customer->id) }}"
                                                class="btn btn-sm btn-info js-bs-tooltip-enabled">
                                                <i class="fa fa-edit"></i>
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
            </div>
        </div>
    </div>
@endsection

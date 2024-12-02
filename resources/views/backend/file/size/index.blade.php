@extends('backend.layouts.app')

@section('product') open @endsection
@section('product-size') active @endsection

@section('content')
<!-- Page Content -->
<div class="content">

    <div class="row">
        <!-- Row #2 -->
        <div class="col-md-12">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">
                        All Product Watt
                    </h3>
                    <a href="{{ route('product-watt.create') }}" class="btn btn-success ">Add New</a>
                </div>
                <div class="block-content block-content-full">
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th width="15" class="text-center"></th>
                                <th class="d-none d-sm-table-cell">Name</th>
                                <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                                <th class="text-center" style="width: 15%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sizes as $size)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="d-none d-sm-table-cell">{{ $size->name }}</td>
                                <td class="d-none d-sm-table-cell">
                                    @if ($size->status == 1)
                                    <a href="{{ route('product-watt.show',$size->id) }}"> <span
                                            style="font-size: 30px; color:green;"><i
                                                class="fa-solid fa-toggle-on"></i></span>
                                    </a>
                                    @else
                                    <a href="{{ route('product-watt.show',$size->id) }}">
                                        <span style="font-size: 30px; color:red;"><i
                                                class="fa-solid fa-toggle-off"></i></span>
                                    </a>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('product-watt.edit', $size->id) }}"
                                        class="btn btn-sm btn-success me-2" title="Edit size" style="float: left">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('product-watt.destroy', $size->id) }}" method="POST" id="size_form"
                                        style="float: left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger delete-confirm"
                                            title="Delete size">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
        <!-- END Row #2 -->
    </div>

</div>
<!-- END Page Content -->
@endsection
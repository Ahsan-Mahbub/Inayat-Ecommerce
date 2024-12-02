@extends('backend.layouts.app')
@section('product') open @endsection
@section('product-size') active @endsection

@section('content')
<!-- Page Content -->
<div class="content">

    <div class="row">
        <!-- Row #2 -->
        <div class="col-md-6 mx-auto">
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">@isset($id) Edit Product Watt @else Add Product Watt @endisset </h3>
                </div>
                <div class="block-content">
                    <div class="row">
                        <div class="col-12">
                            <!-- Form Horizontal - Default Style -->
                            <form class="mb-5" action="@isset($id) {{ route('product-watt.update', $size->id) }} @else {{ route('product-watt.store') }} @endisset" method="POST">
                                @csrf
                                @isset($id) @method('PUT') @endisset
                                <div class="mb-4">
                                    <label class="form-label" for="name">Watt Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Enter watt name.." @isset($id) value="{{ $size->name }}"
                                        @else value="{{ old('name') }}" @endisset>
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <button type="submit" class="btn btn-primary">@isset($id) Update @else Submit
                                        @endisset </button>
                                </div>
                            </form>
                            <!-- END Form Horizontal - Default Style -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END Row #2 -->
    </div>

</div>
<!-- END Page Content -->
@endsection
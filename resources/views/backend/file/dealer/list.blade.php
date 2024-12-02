@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Dealer Request
                </h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Dealer Info &nbsp;</th>
                            <th class="text-center">Address &nbsp;</th>
                            <th class="text-center">Company Info &nbsp;</th>
                            <th class="text-center">Company Address &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($all_dealer as $dealer)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">
                                    Name : {{ $dealer->name }} <br>
                                    Phone : {{ $dealer->phone }} <br>
                                    Email : {{ $dealer->email }}
                                </td>
                                <td class="text-center">{{ $dealer->address }}</td>
                                <td class="text-center">
                                    Name : {{ $dealer->company_name }} <br>
                                    Phone : {{ $dealer->company_phone }} <br>
                                    Email : {{ $dealer->company_email }}
                                </td>
                                <td class="text-center">{{ $dealer->company_address }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('dealer.destroy', $dealer->id) }}" method="post"
                                            accept-charset="utf-8">
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

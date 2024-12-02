@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    User Message
                </h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">User Name &nbsp;</th>
                            <th class="text-center">Email &nbsp;</th>
                            <th class="text-center">Phone &nbsp;</th>
                            <th class="text-center">Message &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($all_message as $message)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">{{ $message->name }}</td>
                                <td class="text-center">{{ $message->email }}</td>
                                <td class="text-center">{{ $message->phone }}</td>
                                <td class="text-center">{{ $message->message }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('message.destroy', $message->id) }}" method="post"
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

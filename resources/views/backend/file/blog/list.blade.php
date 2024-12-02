@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Blog Table
                </h3>
                <a href="{{ route('blog.create') }}" class="btn btn-alt-primary"><i class="fa fa-plus"></i> Add
                    Blog</a>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
                    <thead>
                        <tr>
                            <th class="text-center">S/L &nbsp;</th>
                            <th class="text-center">Blog Name &nbsp;</th>
                            <th class="text-center">Image &nbsp;</th>
                            <th class="text-center">Access &nbsp;</th>
                            <th class="text-center">Action &nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $sl = 1; @endphp
                        @foreach ($all_blog as $blog)
                            <tr>
                                <td class="text-center">{{ $sl++ }}</td>
                                <td class="text-center">{{ $blog->blog_name }}</td>
                                <td class="text-center"><img style="width: auto; height: 50px;"
                                        src="{{ $blog->image ? '/' . $blog->image : '/demo.svg' }}"></td>
                                <td class="text-center">
                                    @if ($blog->status == 1)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="post"
                                            accept-charset="utf-8">
                                            <a href="{{ route('blog.status', $blog->id) }}"
                                                class="btn btn-sm {{ $blog->status == 1 ? 'btn-success' : 'btn-danger' }} mb-2 js-bs-tooltip-enabled">
                                                <i class="fa fa-refresh"></i>
                                            </a>

                                            <a href="{{ route('blog.edit', $blog->id) }}"
                                                class="btn btn-sm btn-info mb-2">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="btn btn-sm btn-danger mb-2 js-bs-tooltip-enabled delete-confirm">
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

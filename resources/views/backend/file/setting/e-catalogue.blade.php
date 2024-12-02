@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Update Site Information</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('setting.update', $information->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">E-Catalogue</label>
                                    <input type='file' class="form-group" name="e_catalogue"
                                    onchange="readURL(this);" />
                                    <embed src="{{ asset($information->e_catalogue) }}" type="application/pdf" width="50%" height="auto" />
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


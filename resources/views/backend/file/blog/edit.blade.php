@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Update Blog</h3>
                <div class="block-options">
                    <a href="{{ route('blog.index') }}" class="btn btn-alt-primary"><i class="fa fa-list"></i> Blog List</a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('blog.update', $blog->id) }}" method="post" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="col-12">Priority</label>
                                    <div class="col-lg-12">
                                        <input type='number' class="form-control" value="{{$blog->priority}}" name="priority"
                                            placeholder="Priority">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-12">Blog Name <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" required
                                            value="{{ $blog->blog_name }}" name="blog_name"
                                            placeholder="Blog Name">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-12">Short Details <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" id="mega-bio" name="short_details" placeholder="Short Details">{{ $blog->short_details }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-12">Details <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control form-control-lg editor" id="mega-bio" name="details">{{ $blog->details }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-12">Meta Keyword</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" name="meta_keyword" value="{{$blog->meta_keyword}}"
                                            placeholder="Meta Keyword">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Meta Description</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" name="meta_description" value="{{$blog->meta_description}}"
                                            placeholder="Meta Description">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-12">Feature Image (860 × 430) <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image"
                                            onchange="readURL(this);" />
                                        <img id="blah"
                                            src="{{ $blog->image ? '/' . $blog->image : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="blog" /><br>
                                        <input type='text' class="form-control" name="image_alt" value="{{$blog->image_alt}}"
                                            placeholder="Image alt tag">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-left mt-4 mb-4">
                        <button type="submit" class="btn btn-square btn-primary min-width-125">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

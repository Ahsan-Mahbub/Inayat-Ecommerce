@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Update team</h3>
                <div class="block-options">
                    <a href="{{ route('team.index') }}" class="btn btn-alt-primary"><i class="fa fa-list"></i> team List</a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('team.update', $team->id) }}" method="post" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="col-12">Priority </label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control"
                                            value="{{ $team->priority }}" name="priority"
                                            placeholder="Priority">
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-12">Name <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" required
                                            value="{{ $team->name }}" name="name"
                                            placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Designation <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" required
                                            value="{{ $team->designation }}" name="designation"
                                            placeholder="Designation">
                                    </div>
                                </div>


                                <div class="form-group col-md-12">
                                    <label class="col-12">Details <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control form-control-lg editor" id="mega-bio" name="details">{{ $team->details }}</textarea>
                                    </div>
                                </div>

                                
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image" value="{{$team->image}}"
                                            onchange="readURL(this);" />
                                        <img id="blah"
                                            src="{{ $team->image ? '/' . $team->image : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="team" /><br>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="form-group text-center mt-4 mb-4">
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
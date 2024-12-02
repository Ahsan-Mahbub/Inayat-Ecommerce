@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Update Promotional</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('banner.update', $banner->id) }}" method="post" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            {{-- <div class="row">
                                <label class="col-12 pb-2">Home Page Top Banner </label>
                                <div class="form-group col-md-6 pb-2">
                                    <div class="mb-4">
                                        <div class="space-x-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" value="1"
                                                    {{ $banner->status == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status" value="0"
                                                    {{ $banner->status == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label">Deactive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 pb-4">
                                        <div>
                                            <input type='text' class="form-control" value="{{ $banner->link }}"
                                                name="link" placeholder="Banner Link">
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <label>(360 × 330 px)</label>
                                        <input type='file' class="form-group" name="image" onchange="readURL(this);" />
                                        <img id="blah" src="{{ $banner->image ? '/' . $banner->image : '/demo.svg' }}"
                                            class="pt-2" height="200" width="100%" style="object-fit: contain"
                                            alt="banner" /><br>
                                    </div>
                                </div>


                                <div class="form-group col-md-6 pb-2">
                                    <div class="mb-4">
                                        <div class="space-x-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status2" value="1"
                                                    {{ $banner->status2 == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status2" value="0"
                                                    {{ $banner->status2 == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label">Deactive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 pb-4">
                                        <div>
                                            <input type='text' class="form-control" value="{{ $banner->link2 }}"
                                                name="link2" placeholder="Banner Link">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>(360 × 330 px)</label>
                                        <input type='file' class="form-group" name="image2"
                                            onchange="readURL2(this);" />
                                        <img id="blah2"
                                            src="{{ $banner->image2 ? '/' . $banner->image2 : '/demo.svg' }}" class="pt-2"
                                            height="200" width="100%" style="object-fit: contain" alt="banner" /><br>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 pb-2">
                                    <div class="mb-4">
                                        <div class="space-x-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status3" value="1"
                                                    {{ $banner->status3 == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status3" value="0"
                                                    {{ $banner->status3 == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label">Deactive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 pb-4">
                                        <div>
                                            <input type='text' class="form-control" value="{{ $banner->link3 }}"
                                                name="link3" placeholder="Banner Link">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>(1000 × 200 px)</label>
                                        <input type='file' class="form-group" name="image3"
                                            onchange="readURL3(this);" />
                                        <img id="blah3"
                                            src="{{ $banner->image3 ? '/' . $banner->image3 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="100%" style="object-fit: contain"
                                            alt="banner" /><br>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 pb-2">
                                    <div class="mb-4">
                                        <div class="space-x-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status4"
                                                    value="1" {{ $banner->status4 == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status4"
                                                    value="0" {{ $banner->status4 == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label">Deactive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 pb-4">
                                        <div>
                                            <input type='text' class="form-control" value="{{ $banner->link4 }}"
                                                name="link4" placeholder="Banner Link">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>(360 × 30 px)</label>
                                        <input type='file' class="form-group" name="image4"
                                            onchange="readURL4(this);" />
                                        <img id="blah4"
                                            src="{{ $banner->image4 ? '/' . $banner->image4 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="100%" style="object-fit: contain"
                                            alt="banner" /><br>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="row">
                                <div class="form-group col-md-6 pb-2">
                                    <label class="col-12 pb-2 pt-5">Home Page Middle Banner </label>
                                    <div class="mb-4">
                                        <div class="space-x-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status5"
                                                    value="1" {{ $banner->status5 == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status5"
                                                    value="0" {{ $banner->status5 == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label">Deactive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 pb-4">
                                        <div>
                                            <input type='text' class="form-control" value="{{ $banner->link5 }}"
                                                name="link5" placeholder="Banner Link">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>(1200 × 200 px)</label>
                                        <input type='file' class="form-group" name="image5"
                                            onchange="readURL5(this);" />
                                        <img id="blah5"
                                            src="{{ $banner->image5 ? '/' . $banner->image5 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="100%" style="object-fit: contain"
                                            alt="banner" /><br>
                                    </div>
                                </div>
                                <div class="form-group col-md-6 pb-2">
                                    <label class="col-12 pb-2 pt-5">Home Page Footer Banner </label>
                                    <div class="mb-4">
                                        <div class="space-x-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status6"
                                                    value="1" {{ $banner->status6 == 1 ? 'checked' : '' }}>
                                                <label class="form-check-label">Active</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="status6"
                                                    value="0" {{ $banner->status6 == 0 ? 'checked' : '' }}>
                                                <label class="form-check-label">Deactive</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 pb-4">
                                        <div>
                                            <input type='text' class="form-control" value="{{ $banner->link6 }}"
                                                name="link6" placeholder="Banner Link">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>(1200 × 200 px)</label>
                                        <input type='file' class="form-group" name="image6"
                                            onchange="readURL6(this);" />
                                        <img id="blah6"
                                            src="{{ $banner->image6 ? '/' . $banner->image6 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="100%" style="object-fit: contain"
                                            alt="banner" /><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-center mb-4">
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

        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah2')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL3(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah3')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah4')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL5(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah5')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function readURL6(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah6')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection

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
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Phone Number</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->phone }}" name="phone" placeholder="Enter Phone Number..">
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Mobile Number</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->mobile }}" name="mobile"
                                        placeholder="Enter Mobile Number..">
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Whatsapp Number</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->whatsapp_number }}" name="whatsapp_number"
                                        placeholder="Enter Whatsapp Number..">
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Call For Price Number</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->call_price }}" name="call_price"
                                        placeholder="Enter Call For Price Number..">
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Email</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->email }}" name="email" placeholder="Enter Email..">
                                </div>
                            </div>
                        </div>


                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Facebook Link</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->fb_link }}" name="fb_link"
                                        placeholder="Enter Facebook Link..">
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Tiktok Link</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->tiktok_link }}" name="tiktok_link"
                                        placeholder="Enter Tiktok Link..">
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Twitter Link</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->twitter_link }}" name="twitter_link"
                                        placeholder="Enter Twitter Link..">
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Youtube Link</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->youtube_link }}" name="youtube_link"
                                        placeholder="Enter Youtube Link..">
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Linkedin Link</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->linkedin_link }}" name="linkedin_link"
                                        placeholder="Enter Linkedin Link..">
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Instagram Link</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->instagram_link }}" name="instagram_link"
                                        placeholder="Enter Instagram Link..">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 pb-2">
                            <label class="form-label" for="mega-firstname">Website Title</label>
                            <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                value="{{ $information->title }}" name="title"
                                placeholder="Enter Website Title..">
                        </div>
                        <div class="pb-2 col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Website Meta Keyword</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->keyword }}" name="keyword"
                                        placeholder="Enter Website Keyword..">
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Website Meta Description</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->description }}" name="description"
                                        placeholder="Enter Website Description..">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="pb-2 col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Youtube Video 1 (embed code - width:
                                        100%;
                                        height: 450px)</label>
                                    <textarea class="form-control form-control-lg" rows="3" name="video1">{{ $information->video1 }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Youtube Video 2 (embed code - width:
                                        100%;
                                        height: 450px)</label>
                                    <textarea class="form-control form-control-lg" rows="3" name="video2">{{ $information->video2 }}</textarea>
                                </div>
                            </div>
                        </div> --}}
                        <div class="pb-2 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Office Location</label>
                                    <textarea class="form-control form-control-lg" rows="3" name="location">{{ $information->location }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Google Map Iframe (width: 100%; height: 300)</label>
                                    <textarea class="form-control form-control-lg" rows="3" name="google_map">{{ $information->google_map }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">About Details</label>
                                    <textarea class="form-control form-control-lg editor" id="mega-bio" name="about_details">{{ $information->about_details }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Privacy Policy Details</label>
                                    <textarea class="form-control form-control-lg editor" id="mega-bio" name="privacy_details">{{ $information->privacy_details }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Terms & Condition Details</label>
                                    <textarea class="form-control form-control-lg editor" id="mega-bio" name="terms_details">{{ $information->terms_details }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Return Policy</label>
                                    <textarea class="form-control form-control-lg editor" id="mega-bio" name="return_policy">{{ $information->return_policy }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Messenger Script</label>
                                    <textarea class="form-control form-control-lg" rows="3" name="messenger_script">{{ $information->messenger_script }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="pb-2 col-md-12">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Header Script</label>
                                    <textarea class="form-control form-control-lg" rows="3" name="head_script">{{ $information->head_script }}</textarea>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="pb-2 col-md-8">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Copyright</label>
                                    <textarea class="form-control editor" id="mega-firstname"
                                    name="copyright"
                                    placeholder="Enter Copyright Text..">{{ $information->copyright }}</textarea>
                                </div>
                            </div>
                        </div> --}}
                        <div class="pb-2 col-md-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Website Logo</label>
                                    <input type='file' class="form-group" name="image"
                                    onchange="readURL(this);" />
                                    <img id="blah"
                                        src="{{ $information->image ? '/' . $information->image : '/demo.svg' }}"
                                        class="pt-2" height="200" width="100%" style="object-fit: contain"
                                        alt="logo" /><br>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-square btn-primary min-width-125">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
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


@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Update Promo</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('setting.update', $information->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Promo 1</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->promo1 }}" name="promo1" placeholder="Enter Promo 1..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Promo 2</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->promo2 }}" name="promo2"
                                        placeholder="Enter Promo 2..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Promo 3</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->promo3 }}" name="promo3"
                                        placeholder="Enter Promo 3..">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Promo 4</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->promo4 }}" name="promo4" placeholder="Enter Promo 4..">
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <label class="form-label" for="mega-firstname">Promo 5</label>
                                    <input type="text" class="form-control form-control-lg" id="mega-firstname"
                                        value="{{ $information->promo5 }}" name="promo5" placeholder="Enter Promo 5..">
                                </div>
                            </div>
                        </div> --}}


                    <div class="mb-4">
                        <button type="submit" class="btn btn-square btn-primary min-width-125">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



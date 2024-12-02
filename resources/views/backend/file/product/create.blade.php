@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Add Product</h3>
                <div class="block-options">
                    <a href="{{ route('product.index') }}" class="btn btn-alt-primary"><i class="fa fa-list"></i> Product
                        List</a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-12">Product Name <small>(For scan please click product name
                                            filed)</small> <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" required name="product_name"
                                            placeholder="Product Name or Scan Product Here">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Product Code <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" required name="product_code"
                                            placeholder="Product Code">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Category Name <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="category_id" id="category_id" required
                                            onclick="getSubCategory()">
                                            <option value="">Select One</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Sub Category Name </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="subcategory_id" id="subcategory_id">
                                            <option value="">Select One</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Stock Status <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="stock_status" required>
                                            <option value="">Select One</option>
                                            <option value="1">Stock</option>
                                            <option value="0">Pre Order</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Price <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input type='number' class="form-control" required name="price"
                                            placeholder="Product Price">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-12">Discount </label>
                                    <div class="col-lg-12">
                                        <input type='number' class="form-control" name="discount" min="0"
                                            value="0" placeholder="Discount">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Select Temperature </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="temperature[]" multiple>
                                            @foreach ($all_temperature as $temperature)
                                            <option value="{{ $temperature->name }}">{{ $temperature->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-12">Select Space </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="space_id[]" multiple>
                                            @foreach ($all_space as $space)
                                            <option value="{{ $space->id }}">{{ $space->space_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-12">Select Color </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="color[]" multiple>
                                            @foreach ($all_color as $color)
                                                <option value="{{ strtolower($color->name) }}">{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-12">Select Watt </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="size[]" multiple>
                                            @foreach ($all_size as $size)
                                                <option value="{{ strtolower($size->name) }}">{{ $size->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group col-md-4">
                                    <label class="col-12">Select Dimmable Type </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="dimmable_type[]" multiple>
                                                <option value="dimmable">Dimmable </option>
                                                <option value="non dimmable">Non Dimmable </option>
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group col-md-3">
                                    <label class="col-12">Stock Quantity </label>
                                    <div class="col-lg-12">
                                        <input type='number' class="form-control" name="stock" min="0"
                                            value="0" placeholder="Stock Quantity">
                                    </div>
                                </div> --}}

                                <div class="form-group col-md-12">
                                    <label class="col-12">Youtube Link </label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control form-control-lg" name="youtube_link" placeholder="Youtube Link"></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="col-12">Details <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control form-control-lg editor" id="mega-bio" name="details"></textarea>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-12">Meta Keyword</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" name="meta_keyword"
                                            placeholder="Meta Keyword">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Meta Description</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" name="meta_description"
                                            placeholder="Meta Description">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-12">Front Image <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" required name="image" id="blahinput"
                                            onchange="readURL(this);" />
                                        <div class="button-box"><span id="blahremove" class="image-cross"
                                                style="display: none;">X</span></div>

                                        <img id="blah" src="/demo.svg" class="pt-2" height="200"
                                            width="auto" alt="product" /><br>

                                        <input type='text' class="mt-2 form-control" name="image_alt"
                                            placeholder="Image alt tag">
                                    </div>
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Back Image <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" required name="image2" id="blah2input"
                                            onchange="readURL2(this);" />
                                        <div class="button-box"><span id="blah2remove" class="image-cross"
                                                style="display: none;">X</span></div>
                                        <img id="blah2" src="/demo.svg" class="pt-2" height="200"
                                            width="auto" alt="product" /><br>
                                        <input type='text' class="mt-2 form-control" name="image_alt2"
                                            placeholder="Image alt tag">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label>Extra Image</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image3" id="blah3input"
                                            onchange="readURL3(this);" />
                                        <div class="button-box"><span id="blah3remove" class="image-cross"
                                                style="display: none;">X</span></div>
                                        <img id="blah3" src="/demo.svg" class="pt-2" height="200"
                                            width="auto" alt="product" /><br>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image4" id="blah4input"
                                            onchange="readURL4(this);" />
                                        <div class="button-box"><span id="blah4remove" class="image-cross"
                                                style="display: none;">X</span></div>
                                        <img id="blah4" src="/demo.svg" class="pt-2" height="200"
                                            width="auto" alt="product" /><br>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image5" id="blah5input"
                                            onchange="readURL5(this);" />
                                        <div class="button-box"><span id="blah5remove" class="image-cross"
                                                style="display: none;">X</span></div>
                                        <img id="blah5" src="/demo.svg" class="pt-2" height="200"
                                            width="auto" alt="product" /><br>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image6" id="blah6input"
                                            onchange="readURL6(this);" />
                                        <div class="button-box"><span id="blah6remove" class="image-cross"
                                                style="display: none;">X</span></div>
                                        <img id="blah6" src="/demo.svg" class="pt-2" height="200"
                                            width="auto" alt="product" /><br>
                                    </div>
                                </div><div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image7" id="blah7input"
                                            onchange="readURL7(this);" />
                                        <div class="button-box"><span id="blah7remove" class="image-cross"
                                                style="display: none;">X</span></div>
                                        <img id="blah7" src="/demo.svg" class="pt-2" height="200"
                                            width="auto" alt="product" /><br>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image8" id="blah8input"
                                            onchange="readURL8(this);" />
                                        <div class="button-box"><span id="blah8remove" class="image-cross"
                                                style="display: none;">X</span></div>
                                        <img id="blah8" src="/demo.svg" class="pt-2" height="200"
                                            width="auto" alt="product" /><br>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="form-group text-center mt-4 mb-4">
                        <button type="submit" class="btn btn-square btn-primary min-width-125">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        function getSubCategory() {
            let id = $("#category_id").val();
            let url = '/admin/product/subcategory/' + id;
            $.ajax({
                type: "get",
                url: url,
                dataType: "json",
                success: function(response) {
                    let html = '';
                    console.log(response)
                    html += `<option value="">` + 'Select One' + `</option>`
                    response.forEach(element => {
                        html += '<option value=' + element.id + '>' + element.subcategory_name +
                            '</option>'
                    });
                    $("#subcategory_id").html(html);
                }
            });
        }
    </script>
@endsection

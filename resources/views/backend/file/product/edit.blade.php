@extends('backend.layouts.app')
@section('content')
    <div class="content">
        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">Update Product</h3>
                <div class="block-options">
                    <a href="{{ route('product.index') }}" class="btn btn-alt-primary"><i class="fa fa-list"></i> Product List</a>
                </div>
            </div>
            <div class="block-content">
                <form action="{{ route('product.update', $product->id) }}" method="post" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="col-12">Product Name <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" required
                                            value="{{ $product->product_name }}" name="product_name"
                                            placeholder="Product Name">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Product Code <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" required
                                            value="{{ $product->product_code }}" name="product_code"
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
                                                <option value="{{ $category->id }}"
                                                    {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Sub Category Name </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="subcategory_id" id="subcategory_id">
                                            <option value="">Select One</option>
                                            @if ($subcategory)
                                                <option value="{{ $subcategory->id }}" selected>
                                                    {{ $subcategory->subcategory_name }}</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Stock Status <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="stock_status" required>
                                            <option value="">Select One</option>
                                            <option value="1" {{$product->stock_status == 1 ? 'selected' : ''}}>Stock</option>
                                            <option value="0" {{$product->stock_status == 0 ? 'selected' : ''}}>Pre Order</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Price <span class="text-danger">*</span></label>
                                    <div class="col-lg-12">
                                        <input type='number' class="form-control" required value="{{ $product->price }}"
                                            name="price" placeholder="Product Price">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-12">Discount </label>
                                    <div class="col-lg-12">
                                        <input type='number' class="form-control" name="discount"
                                            value="{{ $product->discount ? $product->discount : 0 }}" min="0"
                                            placeholder="Discount">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Select Temperature </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="temperature[]" multiple>
                                            <option disabled>Select One</option>
                                            @foreach ($all_temperature as $temperature)
                                                <option value="{{ $temperature->name }}" {{ in_array($temperature->name, $product_temperatures) ? 'selected' : '' }}>{{ $temperature->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @if($product->space_id)
                                <div class="form-group col-md-6">
                                    <label class="col-12">Select Space </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="space_id[]" multiple>
                                            <option disabled>Select One</option>
                                            @foreach ($all_space as $space)
                                            <option value="{{ $space->id }}" {{ in_array($space->id, json_decode($product->space_id)) ? 'selected' : '' }}>{{ $space->space_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @else
                                <div class="form-group col-md-6">
                                    <label class="col-12">Select Space </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="space_id[]" multiple>
                                            <option disabled>Select One</option>
                                            @foreach ($all_space as $space)
                                            <option value="{{ $space->id }}" >{{ $space->space_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="form-group col-md-4">
                                    <label class="col-12">Select Color </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="color[]" multiple>
                                            <option disabled>Select One</option>
                                            @foreach ($all_color as $color)
                                                <option value="{{ strtolower($color->name) }}" {{ in_array($color->name, $product_colors) ? 'selected' : '' }}>{{ $color->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="col-12">Select Watt </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="size[]" multiple>
                                            <option value="">Select One</option>
                                            @foreach ($all_size as $size)
                                                <option value="{{ strtolower($size->name) }}" {{ in_array($size->name, $product_sizes) ? 'selected' : '' }}>{{ $size->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="col-12">Select Dimmable Type </label>
                                    <div class="col-lg-12">
                                        <select class="form-select js-select2" name="dimmable_type[]" multiple>
                                            <option value="">Select One</option>
                                                <option value="dimmable" {{ in_array('dimmable', $product_dimmable_type) ? 'selected' : '' }}>Dimmable </option>
                                                <option value="non dimmable" {{ in_array('non dimmable', $product_dimmable_type) ? 'selected' : '' }}>Non Dimmable </option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label class="col-12">Youtube Link </label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control form-control-lg" name="youtube_link" placeholder="Youtube Link">{{ $product->youtube_link ? $product->youtube_link : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="col-12">Details <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <textarea class="form-control form-control-lg editor" id="mega-bio" name="details">{{ $product->details }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Meta Keyword</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" name="meta_keyword" value="{{$product->meta_keyword}}"
                                            placeholder="Meta Keyword">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Meta Description</label>
                                    <div class="col-lg-12">
                                        <input type='text' class="form-control" name="meta_description" value="{{$product->meta_description}}"
                                            placeholder="Meta Description">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="col-12">Front Image <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image" id="blahinput" value="{{$product->image}}"
                                            onchange="readURL(this);" />
                                        @if($product->image)
                                            <div class="button-box"><span id="blahremove" class="image-cross">X</span></div>
                                        @endif
                                        <img id="blah"
                                            src="{{ $product->image ? '/' . $product->image : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="product" /><br>
                                        <input type='text' class="mt-2 form-control" name="image_alt" value="{{$product->image_alt}}"
                                            placeholder="Image alt tag">

                                        <input type="hidden" id="remove_image" name="remove_image" value="0">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="col-12">Back Image <span class="text-danger">*</span> </label>
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image2" id="blah2input" value="{{$product->image2}}"
                                            onchange="readURL2(this);" />
                                        @if($product->image2)
                                            <div class="button-box"><span id="blah2remove" class="image-cross">X</span></div>
                                        @endif
                                        <img id="blah2"
                                            src="{{ $product->image2 ? '/' . $product->image2 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="product" /><br>
                                        <input type='text' class="mt-2 form-control" name="image_alt2" value="{{$product->image_alt2}}"
                                            placeholder="Image alt tag">

                                        <input type="hidden" id="remove_image2" name="remove_image2" value="0">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="">Extra Image</label>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image3" id="blah3input" value="{{$product->image3}}"
                                            onchange="readURL3(this);" />
                                        @if($product->image3)
                                            <div class="button-box"><span id="blah3remove" class="image-cross">X</span></div>
                                        @endif
                                        <img id="blah3"
                                            src="{{ $product->image3 ? '/' . $product->image3 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="product" /><br>

                                        <input type="hidden" id="remove_image3" name="remove_image3" value="0">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image4" id="blah4input" value="{{$product->image4}}"
                                            onchange="readURL4(this);" />

                                        @if($product->image4)
                                            <div class="button-box"><span id="blah4remove" class="image-cross">X</span></div>
                                        @endif
                                        <img id="blah4"
                                            src="{{ $product->image4 ? '/' . $product->image4 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="product" /><br>

                                            <input type="hidden" id="remove_image4" name="remove_image4" value="0">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image5" id="blah5input" value="{{$product->image5}}"
                                            onchange="readURL5(this);" />

                                        @if($product->image5)
                                            <div class="button-box"><span id="blah5remove" class="image-cross">X</span></div>
                                        @endif
                                        <img id="blah5"
                                            src="{{ $product->image5 ? '/' . $product->image5 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="product" /><br>

                                            <input type="hidden" id="remove_image5" name="remove_image5" value="0">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image6" id="blah6input" value="{{$product->image6}}"
                                            onchange="readURL6(this);" />
                                        
                                        @if($product->image6)
                                            <div class="button-box"><span id="blah6remove" class="image-cross">X</span></div>
                                        @endif
                                        <img id="blah6"
                                            src="{{ $product->image6 ? '/' . $product->image6 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="product" /><br>

                                            <input type="hidden" id="remove_image6" name="remove_image6" value="0">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image7" id="blah7input" value="{{$product->image7}}"
                                            onchange="readURL7(this);" />
                                        
                                        @if($product->image7)
                                            <div class="button-box"><span id="blah7remove" class="image-cross">X</span></div>
                                        @endif
                                        <img id="blah7"
                                            src="{{ $product->image7 ? '/' . $product->image7 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="product" /><br>

                                            <input type="hidden" id="remove_image7" name="remove_image7" value="0">
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <div class="col-lg-12">
                                        <input type='file' class="form-group" name="image8" id="blah8input" value="{{$product->image8}}"
                                            onchange="readURL8(this);" />
                                        
                                        @if($product->image8)
                                            <div class="button-box"><span id="blah8remove" class="image-cross">X</span></div>
                                        @endif
                                        <img id="blah8"
                                            src="{{ $product->image8 ? '/' . $product->image8 : '/demo.svg' }}"
                                            class="pt-2" height="200" width="auto" alt="product" /><br>

                                            <input type="hidden" id="remove_image8" name="remove_image8" value="0">
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

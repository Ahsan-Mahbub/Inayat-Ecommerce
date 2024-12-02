@extends('backend.layouts.app')
@section('content')
<style type="text/css">
	.block{
		margin-bottom: 0;
	}
</style>
<div class="content">
	<div class="block block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"> All Product</h3>
			<a href="{{route('stock.index')}}" class="btn btn-alt-primary"><i class="fa fa-list"></i> Stock List</a>
	    </div>
	    <div style="max-height: 410px; overflow-y: scroll;">
	    	<div class="container mt-4 mb-4">
				<form action="javascript:void(0)" method="GET">
					<div class="form-group row offset-lg-2">
						<label class="col-3 col-form-label text-end">Search Product :</label>
						<div class="col-6">
							<input class="form-control" name="product_name" id="search"
								placeholder="Product Name">
						</div>
					</div>
				</form>
				<div class="show_search_product">
					@include('backend.file.stock.search-product')
				</div>
	    	</div>
	    </div>
	</div>
	<div class="row mt-0">
		<div class="col-12">
			<p style="background: gray; color:white; padding: 5px 0; text-align: center; font-weight: 700; ">
				Product Stock</p>
		</div>
	</div>
	<form role="form" action="{{ route('stock.store') }}" method="post" enctype="multipart/form-data" name="myForm" onsubmit="return validateForm()">
		@csrf
		<div class="row p-3">
			<div class="col-md-12">
				<div class="block-content"
					style="padding: 1rem; padding-top: 0px; padding-bottom: 0px;">
					<div class="row pt-2 mb-3" style="background: #cdf78d">
						<div class="col-2">
							<label class="form-label">Product Name</label>
						</div>
						<div class="col-1">
							<label class="form-label">Color</label>
						</div>
						<div class="col-1">
							<label class="form-label">Watt</label>
						</div>   
						<div class="col-2">
							<label class="form-label">Temperature</label>
						</div>
						<div class="col-2">
							<label class="form-label">Dimmable Type</label>
						</div>
						<div class="col-1">
							<label class="form-label">Qty</label>
						</div>
						<div class="col-2">
							<label class="form-label">Price</label>
						</div>
						<div class="col-1">
							<label class="form-label">Action</label>
						</div>
					</div>
					<div class="add_item" id="add_item">

					</div>
				</div>
			</div>
		</div>
		<div class="text-center">
			<button type="submit" id="submit" class="btn btn-primary mt-4 mx-2 mb-3">Stock</button>
		</div>
	</form>
</div>

<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">

        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$("body").on("keyup", "#search", function () {
		let searchData = $("#search").val();
		let searchDataLength = searchData.length;
		$.ajax({
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
			},
			type: "POST",
			url: "stock-search-product",
			data: {
				search: searchData,
				searchDataLength: searchDataLength,
			},
			success: function (result) {
				$(".show_search_product").html(result);
			},
		});
	});


	$(document).ready(function(){
        var counter = 0;
        $(document).on("click", ".addEvenMore", function(){
            let product_id = $(this).attr('product_id');
            var whole_extra_item_add = $("#whole_extra_item_add").html();
            var addItem = $("#add_item");
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '{{route("get-product-details")}}',
                type: "POST",
                data: {product_id:product_id},
                success: function(resp){ 
                    // console.log(resp);                   
                    addItem.append(`
                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                            <div class="form-row">
                                <div class="row mb-1">
                                    <input type="hidden" name="product_id[]" value="${resp.productDetails.id}">
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="product_name[]" placeholder="Product Name.." value="${resp.productDetails.product_name}" readonly>
                                    </div>
                                   
                                    <div class="col-1">
                                        <select class="form-select js-select2 colorList-${resp.productDetails.id}-${resp.rand}" name="color[]" id="" required="">
                                        <option value="">Select One</option>
                                        </select>
                                    </div>

                                    <div class="col-1">
                                        <select class="form-select js-select2 sizeList-${resp.productDetails.id}-${resp.rand}" name="watt[]" id="" required="">
                                        <option value="">Select One</option>
                                        </select>
                                    </div>    
						  
						  			<div class="col-2">
                                        <select class="form-select js-select2 temperatureList-${resp.productDetails.id}-${resp.rand}" name="temperature[]" id="" required="">
                                        <option value="">Select One</option>
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <select class="form-select js-select2 dimmable_typeList-${resp.productDetails.id}-${resp.rand}" name="dimmable_type[]" id="" required="">
                                        <option value="">Select One</option>
                                        </select>
                                    </div>  

                                    <div class="col-1">
                                        <input type="number" class="form-control buy_quantity buyingQty-${resp.productDetails.id}-${resp.rand}" name="quantity[]" placeholder="Qty.." required>
                                    </div>

									<div class="col-2">
                                        <input type="number" class="form-control price-${resp.productDetails.id}-${resp.rand}" name="price[]" placeholder="Price.." value="${resp.productDetails.main_price}" required>
                                    </div>

                                    <div class="col-1">
                                        <button type="button" class="btn btn-danger me-1 mb-1 removeEvenMore">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);
                    $('.js-select2').select2();

                    const size = resp.productDetails.size;
                    const sizeArray = size.split(',');
                    let sizeListElements = document.getElementsByClassName('sizeList-'+resp.productDetails.id+'-'+resp.rand);

                    const color = resp.productDetails.color;
                    const colorArray = color.split(',');
                    let colorListElements = document.getElementsByClassName('colorList-'+resp.productDetails.id+'-'+resp.rand);

					const temperature = resp.productDetails.temperature;
                    const temperatureArray = temperature.split(',');
					let temperatureListElements = document.getElementsByClassName('temperatureList-'+resp.productDetails.id+'-'+resp.rand);

                    const dimmable_type = resp.productDetails.dimmable_type;
                    const dimmable_typeArray = dimmable_type.split(',');
                    let dimmable_typeListElements = document.getElementsByClassName('dimmable_typeList-'+resp.productDetails.id+'-'+resp.rand);

                    let buyingQtyElements = document.getElementsByClassName('buyingQty-'+resp.productDetails.id+'-'+resp.rand);

                    Array.from(sizeListElements).forEach((sizeListElement) => {
                        sizeListElement.innerHTML = '<option value="">Select One</option>';
                        sizeArray.forEach((size) => {
                            var size_option = document.createElement('option');
                            size_option.textContent = size;
                            size_option.value = size;
                            sizeListElement.appendChild(size_option);
                        });
                    });
                    Array.from(colorListElements).forEach((colorListElement) => {
                        colorListElement.innerHTML = '<option value="">Select One</option>';
                        colorArray.forEach((color) => {
                            var color_option = document.createElement('option');
                            color_option.textContent = color;
                            color_option.value = color;
                            colorListElement.appendChild(color_option);
                        });
                    });
					Array.from(temperatureListElements).forEach((temperatureListElement) => {
                        temperatureListElement.innerHTML = '<option value="">Select One</option>';
                        temperatureArray.forEach((temperature) => {
                            var temperature_option = document.createElement('option');
                            temperature_option.textContent = temperature;
                            temperature_option.value = temperature;
                            temperatureListElement.appendChild(temperature_option);
                        });
                    });
                    Array.from(dimmable_typeListElements).forEach((dimmable_typeListElement) => {
                        dimmable_typeListElement.innerHTML = '<option value="">Select One</option>';
                        dimmable_typeArray.forEach((dimmable_type) => {
                            var dimmable_type_option = document.createElement('option');
                            dimmable_type_option.textContent = dimmable_type;
                            dimmable_type_option.value = dimmable_type;
                            dimmable_typeListElement.appendChild(dimmable_type_option);
                        });
                    });
                },
                error: function(){
                    toastr.error(" Something is wrong", "Error");
                }
            });
            counter ++;
        });
        $(document).on("click", ".removeEvenMore", function(event){
            $(this).closest(".delete_whole_extra_item_add").remove();
            counter -= 1;
            getTotalAmount();
        });
    });
</script>
@endsection

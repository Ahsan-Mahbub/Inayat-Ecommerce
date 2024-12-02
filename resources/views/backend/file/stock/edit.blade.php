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
	        <h3 class="block-title"> Update Stock</h3>
			<a href="{{route('stock.index')}}" class="btn btn-alt-primary"><i class="fa fa-list"></i> Stock List</a>
	    </div>
	</div>
	<form role="form" action="{{ route('stock.update', $stock->id) }}" method="post" enctype="multipart/form-data">
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
						<div class="col-2">
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
					</div>
					<div class="add_item" id="add_item">
                        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                            <div class="form-row">
                                <div class="row mb-1">
                                    <input type="hidden" name="product_id" value="{{$stock->product_id}}">
                                    <div class="col-2">
                                        <input type="text" class="form-control" name="product_name" placeholder="Product Name.." value="{{$product->product_name}}" readonly>
                                    </div>
                                   <?php
                                        $sizes = explode(',', $product->size);
                                        $colors = explode(',', $product->color);
                                        $temperatures = explode(',', $product->temperature);
                                        $dimmable_types = explode(',', $product->dimmable_type);
                                   ?>
                                    <div class="col-1">
                                        <select class="form-select js-select2" name="color" id="" required="">
                                            <option value="">Select One</option>
                                            @foreach($colors as $color)
                                                <option value="{{ $color }}" {{$color == $stock->color ? 'selected' :''}}>{{$color}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <select class="form-select js-select2" name="watt" id="" required="">
                                            <option value="">Select One</option>
                                            @foreach($sizes as $size)
                                                <option value="{{ $size }}" {{$size == $stock->watt ? 'selected' :''}}>{{$size}}</option>
                                            @endforeach
                                        </select>
                                    </div>    
						  
						  			<div class="col-2">
                                        <select class="form-select js-select2" name="temperature" id="" required="">
                                            <option value="">Select One</option>
                                            @foreach($temperatures as $temperature)
                                                <option value="{{ $temperature }}" {{$temperature == $stock->temperature ? 'selected' :''}}>{{$temperature}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-2">
                                        <select class="form-select js-select2" name="dimmable_type" id="" required="">
                                            <option value="">Select One</option>
                                            @foreach($dimmable_types as $dimmable_type)
                                                <option value="{{ $dimmable_type }}" {{$dimmable_type == $stock->dimmable_type ? 'selected' :''}}>{{$dimmable_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>  

                                    <div class="col-1">
                                        <input type="number" class="form-control buy_quantity" value="{{$stock->quantity}}" name="quantity" placeholder="Qty.." required>
                                    </div>

									<div class="col-2">
                                        <input type="number" class="form-control" name="price" placeholder="Price.." value="{{$stock->price}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="text-center">
			<button type="submit" id="submit" class="btn btn-primary mt-4 mx-2 mb-3">Update Stock</button>
		</div>
	</form>
</div>

@endsection
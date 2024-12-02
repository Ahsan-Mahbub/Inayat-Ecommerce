@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
		<div class="block-content block-content-full">
			<form action="{{route('report.stock.get')}}" method="GET">
				<div class="form-group row offset-lg-2">
					<label class="col-md-3 col-form-label text-end">Sort by Category :</label>
					<div class="col-md-5">
						<select class="form-select" name="category_id" required>
							<option value="">Select One</option>
							@foreach($p_categories as $category)
							<option value="{{$category->id}}" {{$category->id == $categoryId ? 'selected' : ''}}>{{$category->category_name}}</option>
							@endforeach
						  </select>
					</div>
					<div class="col-md-2">
						<button class="btn btn-primary" type="submit">Filter</button>
					</div>
				</div>
			</form>
		</div>
	    <div class="block-content block-content-full">
		    <div class="table-responsive">
				<table class="table table-bordered table-striped table-vcenter">
					<thead>
						<tr>
							<th class="text-center">Category &nbsp;</th>
							<th class="text-center">Product Name &nbsp;</th>
							<th class="text-center">Now Stock &nbsp;</th>
							<th class="text-center">Total Stock &nbsp;</th>
						</tr>
					</thead>
					<tbody>
						@foreach($all_product as $product)
						  <tr>
							<td class="text-center">{{$product->category ? $product->category->category_name : 'Not Set'}}</td>
							<td class="text-center">{{$product->product_name}}</td>
							<td class="text-center">{{$product->stock}}</td>
							<td class="text-center">
								<?php
									$total_stock = $product->stock + $product->sale;
								?>
								{{$total_stock}}
							</td>
						  </tr>
						  @endforeach
					</tbody>
				</table>
				{{ $all_product->appends(request()->except('page'))->links() }}
			</div>
	    </div>
	</div>
</div>
@endsection
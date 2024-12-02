@extends('backend.layouts.app')
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Stock List Table
	        </h3>
	        <a href="{{route('stock.create')}}" class="btn btn-alt-primary"><i class="fa fa-plus"></i> Add Stock</a>
	    </div>
	    <div class="block-content block-content-full">
		    <table class="table table-bordered table-striped table-vcenter js-dataTable-responsive">
		        <thead>
		          <tr>
	                <th class="text-center">S/L &nbsp;</th>
					<th class="text-center">Product Name &nbsp;</th>
	                <th class="text-center">Color &nbsp;</th>
	                <th class="text-center">Watt &nbsp;</th>
	                <th class="text-center">Temperature &nbsp;</th>
	                <th class="text-center">Dimmable Type &nbsp;</th>
	                <th class="text-center">Quantity &nbsp;</th>
	                <th class="text-center">Action &nbsp;</th>
	            </tr>
		        </thead>
		        <tbody>
		        	@php $sl = 1; @endphp
	                @foreach($all_stock as $stock)
		          	<tr>
			            <td class="text-center">{{$sl++}}</td>
			            <td class="text-center">{{$stock->product ? $stock->product->product_name : 'Not Set'}}</td>
						<td class="text-center">{{$stock->color}}</td>
						<td class="text-center">{{$stock->watt}}</td>
						<td class="text-center">{{$stock->temperature}}</td>
						<td class="text-center">{{$stock->dimmable_type}}</td>
			            <td class="text-center">{{$stock->quantity}}</td>
			            <td class="text-center">
							<div class="btn-group">
								<form action="{{ route('stock.destroy', $stock->id) }}" method="post"
									accept-charset="utf-8">

									<a href="{{ route('stock.edit', $stock->id) }}"
										class="btn btn-sm btn-info mb-2">
										<i class="fa fa-edit"></i>
									</a>
									@csrf
									@method('delete')
									<button type="submit"
										class="btn btn-sm btn-danger mb-2 js-bs-tooltip-enabled delete-confirm">
										<i class="fa fa-times"></i>
									</button>
								</form>
							</div>
						</td>
		          	</tr>
		          	@endforeach
		        </tbody>
		    </table>
	    </div>
	</div>
</div>
@endsection
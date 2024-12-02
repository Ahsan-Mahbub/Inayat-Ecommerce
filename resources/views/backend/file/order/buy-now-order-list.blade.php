@extends('backend.layouts.app')
@section('buy-now-order') active @endsection
@section('content')
<div class="content">
	<div class="block block-rounded">
	    <div class="block-header block-header-default">
	        <h3 class="block-title">
	      	  Pre Order List
	        </h3>
	        {{-- <button type="button" class="btn btn-alt-primary" data-bs-toggle="modal" data-bs-target="#add_modal"><i class="fa fa-plus"></i> Add Employee</button> --}}
	    </div>
	    <div class="block-content block-content-full">
		    <div class="table-responsive">
				<table class="table table-bordered table-striped table-vcenter">
					<thead>
					  <tr>
						<th class="text-center">S/L &nbsp;</th>
						<th class="text-center">Product Info &nbsp;</th>
						<th class="text-center">Name &nbsp;</th>
						<th class="text-center">Phone &nbsp;</th>
						<th class="text-center">Email &nbsp;</th>
						<th class="text-center">Address &nbsp;</th>
						{{-- <th class="text-center">Action &nbsp;</th> --}}
					</tr>
					</thead>
					<tbody>
						@php $sl = 1; @endphp
						@foreach($all_data as $item)
						  <tr>
							<td class="text-center">{{$sl++}}</td>						
							<td class="text-center">{{$item->product ? $item->product->product_name : ''}}</td>
							<td class="text-center">{{$item->name}}</td>
							<td class="text-center">{{$item->phone}}</td>
							<td class="text-center">{{$item->email}}</td>
							<td class="text-center">{{$item->address}}</td>
							{{-- <td class="text-center">
								<div class="btn-group">
									<form action="{{route('item.destroy',$item->id)}}" method="post" accept-charset="utf-8">
										<a data-bs-toggle="modal" data-bs-target="#edit_modal" id="edititem" data="{{$item->id}}" class="btn btn-sm btn-secondary js-bs-tooltip-enabled">
											<i class="fa fa-edit"></i>
										</a>
										@csrf
										@method('delete')
										<button type="submit" class="btn btn-sm btn-secondary js-bs-tooltip-enabled delete-confirm">
											<i class="fa fa-times"></i>
										</button>
									</form>
								</div>
							</td> --}}
						  </tr>
						  @endforeach
					</tbody>
				</table>
			</div>
			{{ $all_data->appends(request()->except('page'))->links() }}
	    </div>
	</div>
</div>

@endsection
@section('script')

@endsection
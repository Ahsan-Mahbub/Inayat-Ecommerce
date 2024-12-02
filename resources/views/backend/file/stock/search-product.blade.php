<div class="row mt-5">
    @foreach($products as $value)
    <div class="col-md-3 col-xl-2 col-6  mb-2"  style="cursor: pointer;">
        <a class="block block-link-shadow addEvenMore" product_size="{{ $value->size }}" product_color="{{ $value->color }}"
            product_id="{{ $value->id }}" product_name="{{ $value->product_name }}" product_temperature="{{ $value->temperature }}">
            <div class="block-content block-content-full text-center p-0 pb-1" style="border-radius: 10px;
            box-shadow: 1px 1px 1px 2px ">
                <p class="font-size-lg font-w600 mb-0">
                    {{ $value->product_name  }}
                </p>
            </div>
        </a>
    </div>
    @endforeach
</div>
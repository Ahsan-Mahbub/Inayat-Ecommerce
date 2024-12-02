<div class="row mt-5">
    @foreach ($products as $value)
        <div class="col-md-3 col-xl-2 col-6 stock_product mb-2" data-id="{{ $value }}" style="cursor: pointer;">
            <a class="block block-link-shadow addEvenMore" product_id="{{ $value->id }}">
                <div class="block-content block-content-full text-center p-0 pb-1"
                    style="border-radius: 10px;
            box-shadow: 1px 1px 1px 2px ">
                    <div class="p-2 mb-2">
                        <img width="100%" height="120" src=/{{ $value->image }}>
                    </div>
                    <p class="font-size-lg font-w600 mb-0" style="height: 25px; overflow: hidden">
                        {{ $value->product_name }}
                    </p>
                </div>
            </a>
        </div>
    @endforeach
</div>

<div>
    <!--breadcrumbs area start-->
    <div class="breadcrumbs_area" style="background-image: url({{ asset('assets/img/banner/bg' . rand(2, 7) . '.jpg') }}); ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <h1 class="text-white">Search Item</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs area end-->
    <!--shop  area start-->
    <div class="shop_area shop_reverse">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_inner">
                            <div class="widget_list widget_categories">
                                <h2>categories</h2>
                                <ul>
                                    @forelse ($categories as $item)
                                        <li><a
                                                href="{{ route('productPage.category', ['mainCategory_id' => $item->id, 'mainCategory_name' => $item->name_bn]) }}">{{ session()->get('language') == 'english' ? $item->name_en : $item->name_bn }}</a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">
                    <!--shop wrapper start-->
                    <!--shop toolbar start-->

                    <div class="shop_toolbar_wrapper">
                        <div class="page_amount">
                            <p >Showing {{ count($products) }} results</p>
                        </div>
                        <div class="shop_toolbar_btn">

                            <button data-role="grid_3" type="button" class="active btn-grid-3" data-toggle="tooltip"
                                title="3"></button>

                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip"
                                title="4"></button>

                        </div>
                       
                        <div wire:ignore class="nice-select" tabindex="0"><span class="current" id="sortcurrent">Sort by Newness</span>
                            <ul class="list">
                                <li data-value="1" class="option" wire:click="sort(1)">Sort by Newness</li>
                                <li data-value="2" class="option" wire:click="sort(2)">Sort by price: low to high</li>
                                <li data-value="3" class="option" wire:click="sort(3)">Sort by price: high to low</li>
                                <li data-value="4" class="option"  wire:click="sort(4)">Product Name: A-Z</li>
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <div class="row shop_wrapper">

                        @forelse ($products as $item)
                            <div class="col-lg-4 col-md-4 col-12 ">
                                <div class="single_product">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('product.detail', $item->id) }}"><img
                                                src="{{ Storage::url($item->ProductImage[0]->path) }}"
                                                alt=""></a>
                                        <a class="secondary_img" href="{{ route('product.detail', $item->id) }}"><img
                                                src="{{ Storage::url($item->ProductImage[1]->path) }}"
                                                alt=""></a>
                                        <div class="label_product">
                                            <span
                                                class="label_sale">-{{ $item->discount == 0 ? 0 : $item->discount }}%</span>
                                        </div>
                                        <div class="product_name">
                                            <h3><a
                                                    href="{{ route('product.detail', $item->id) }}">{{ session()->get('language') == 'english' ? $item->title_en : $item->title_bn }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="product_content">
                                        <div class="product_ratings">
                                            <div class="price_box">
                                                @if ($item->discount == 0 || $item->discount == null)
                                                    <span class="regular_price">{{ $item->price }}৳
                                                        <del>1500৳</del></span>
                                                @else
                                                    @php
                                                        $originalPrice = $item->price;
                                                        $discountPercentage =
                                                            $item->discount == 0 ? 0 : $item->discount;
                                                        $discountedAmount =
                                                            $originalPrice * ($discountPercentage / 100);
                                                    @endphp
                                                    <span
                                                        class="regular_price">{{ round($originalPrice - $discountedAmount) }}৳
                                                        <del>{{ $item->price }}৳</del></span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="product_footer d-flex align-items-center">
                                            <div class="mini_cart_wrapper cart_links_btn">
                                                <a href="javascript:void(0)"
                                                    wire:click="addtocart({{ $item->id }})">
                                                    {{ session()->get('language') == 'english' ? 'Add to cart' : 'অর্ডার করুন' }}</a>
                                            </div>
                                            <div class="add_to_cart">
                                                <ul>
                                                    <li class="quick_button"><a data-bs-toggle="modal"
                                                            wire:click="setvalue({{ $item->id }})"
                                                            data-bs-target="#modal_box" title="quick view"> <span
                                                                class="lnr lnr-magnifier"></span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h1>No Product Found!</h1>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function ShowProductCategoryPage($mainCategory_id, $mainCategory_name)
    {
        $site = Site::find(1);
        return view('frontend/category/product',compact('site','mainCategory_id'));
    }
    public function ShowProductSearch($search_name)
    {
        $site = Site::find(1);
        return view('frontend/category/search',compact('site','search_name'));
    }
}

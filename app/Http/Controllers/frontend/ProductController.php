<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\OrderReceivedNotification;

class ProductController extends Controller
{
    public function product(){

        $products = Product::simplePaginate(12);

        $latestCategories = Category::latest()->limit(5)->get();

        //Latest Products
        $latestProducts = Product::where('status',1)->latest()->limit(7)->get();

        $total_products = Product::count();

        $products_has_discount = Product::whereNotNull('discount')->latest()->limit(4)->get();

        return view('frontend.pages.product.shop',compact('products','latestCategories','latestProducts','total_products','products_has_discount'));
    }

    public function productDetails($id){
        $routeName = 'details';
        $url = route($routeName, ['id' => $id]);
       
        $details = Product::find($id);
        return view('frontend.pages.product.details',compact('details'));
    }

    public function productCheckout($id){
        $products = Product::find($id);

        $cartItems = session()->get('cart', []);
        $subtotal = 0;

        if ($cartItems !== null) {
            foreach ($cartItems as $item) {
                $subtotal += $item['subtotal'];
            }
        }

        return view('frontend.pages.product.checkout', compact('products', 'cartItems', 'subtotal'));

    }


  

}

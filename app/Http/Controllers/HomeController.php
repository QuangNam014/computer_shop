<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Specification_type_laptop;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('frontend.components.home.index');
    }

    public function product()
    {
        $products = Product::where('active',1)->latest()->paginate(20);  
        return view('frontend.components.home.product', compact('products'));
    }

    public function detail($id)
    {
        // $spec_laptop = $spec_pc = $spec_monitor = $spec_keyboard = $spec_mouse = ""
        $product = Product::find($id); 
        $productType = $product->type_id;
        // switch ($productType) {
        //     case 1:
        //         $spec_laptop = $product->specLaptop;
        //         break;
        //     case 2:
        //         $spec_pc = $product->specPC;
        // dd($spec_pc);

        //         break;
        //     case 3:
        //         $spec_monitor = $product->specMonitor;
        //         break;
        //     case 4:
        //         $spec_keyboard = $product->specKeyBoard;
        //         break;
        //     case 5:
        //         $spec_mouse = $product->specMouse;
        //         break;
        //     default: break;
        // }
        // ,'spec_laptop','spec_pc','spec_monitor','spec_keyboard','spec_mouse'
        return view('frontend.components.home.detail', compact('product'));
    } 
}

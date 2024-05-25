<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function PHPUnit\Framework\returnValue;

class AmazonController extends Controller
{
    function contactUs(){
        return view('amazon.contactUs');
    }

    function aboutUs(){
        return view('amazon.aboutUs');
    }

    function products(){
        $products = [
            ["name"=>'Samsung A53s', 'price'=>51566, 'description'=>"samsung description"],
            ["name"=>'Iphone 15 pro', 'price'=>256333, 'description'=>"iphone description"],
            ["name"=>'Dell 5570', 'price'=>214768, 'description'=>"sell description"]
        ];

        return view('amazon.products',['products'=>$products]);
    }
    //
}

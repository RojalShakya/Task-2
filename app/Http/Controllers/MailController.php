<?php

namespace App\Http\Controllers;

use App\Jobs\ProductReceipt;
use App\Models\Product;
use App\Mail\ProductMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail($id){

        $product=Product::findOrFail($id);
        // dd(Auth::user()->email);
        // Mail::to(Auth::user()->email)->send(new ProductMail($product));

        ProductReceipt::dispatch($product);
        return "Sucess";

    }
}

<?php

namespace App\Jobs;

use App\Models\Product;
use App\Mail\ProductMail;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductReceipt implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public $product;

    public function __construct($product)
    {
        //

        $this->product=$product;

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

    Mail::to("rojal@yopmail.com")->send(new ProductMail($this->product));

}}

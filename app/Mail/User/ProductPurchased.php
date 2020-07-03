<?php

namespace App\Mail\User;

use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductPurchased extends Mailable
{
    use Queueable, SerializesModels;

    public $sale;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.products.purchased')
            ->subject("Megoevent - Your Order #" . $this->sale->id);
    }
}

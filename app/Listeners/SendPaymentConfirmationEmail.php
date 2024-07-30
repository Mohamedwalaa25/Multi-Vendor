<?php

namespace App\Listeners;

use App\Events\PaymentCompleted;
use App\Mail\PaymentConfirmationEmail;
use Illuminate\Support\Facades\Mail;

class SendPaymentConfirmationEmail
{
    /**
     * Handle the event.
     *
     * @param  PaymentCompleted  $event
     * @return void
     */
    public function handle(PaymentCompleted $event)
    {
        $payment = $event->payment;
        $order = $payment->order;



            // إرسال البريد الإلكتروني
            Mail::to($payment->order->user->email)->send(new PaymentConfirmationEmail($order));

    }
}

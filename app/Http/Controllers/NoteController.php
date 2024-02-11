<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use http\Env\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\Order;

class NoteController extends Controller
{
    public function checkout(Note $note)
    { 
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $lineItems = [
            [
                'price_data' => [
                    'currency' => 'brl',
                    'product_data' => [
                        'name' => $note->product_name,
                        'images' => [$note->image]
                    ],
                    'unit_amount' => $note->price * 100,
                ],
                'quantity' => 1,
            ]
        ];

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('notes.payment.checkout-success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('notes.payment.checkout-cancel', [], true),
        ]);

        $order = new Order();
        $order->status = 'unpaid';
        $order->total_price = $note->price;
        $order->session_id = $session->id;

        return redirect($session->url);
    }
}

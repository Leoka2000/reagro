<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use http\Env\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

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

        $user = auth()->user();
$user->orders()->save($order);


        return redirect($session->url);
    }

    public function success(Request $request)
{
    \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
    $sessionId = $request->get('session_id');

  
       
       

        return view('notes.payment.checkout-success');
   

}

public function cancel()
{

    return view('notes.payment.checkout-cancel');
}


public function webhook()
{
    // This is your Stripe CLI webhook secret for testing your endpoint locally.
    $endpoint_secret = env('STRIPE_WEBHOOK_SECRET');

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    $event = null;

    try {
        $event = \Stripe\Webhook::constructEvent(
            $payload, $sig_header, $endpoint_secret
        );
    } catch (\UnexpectedValueException $e) {
        // Invalid payload
        return response('', 400);
    } catch (\Stripe\Exception\SignatureVerificationException $e) {
        // Invalid signature
        return response('', 400);
    }

// Handle the event
    switch ($event->type) {
        case 'checkout.session.completed':
            $session = $event->data->object;

            $order = Order::where('session_id', $session->id)->first();
            if ($order && $order->status === 'unpaid') {
                $order->status = 'paid';
                $order->save();
                // Send email to customer
            }
            $user = $order->user;

            if ($user) {
                $user->coins += 2;
                $user->save();
            }
        // ... handle other event types
        default:
            echo 'Received unknown event type ' . $event->type;
    }

    return response('');
}
}

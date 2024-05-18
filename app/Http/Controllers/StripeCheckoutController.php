<?php

namespace App\Http\Controllers;

use App\Repositories\cartRepository;
use Illuminate\Http\Request;

class StripeCheckoutController extends Controller
{
    public function create()
    {
        return view('payement.create');
    }

    public function paymentIntent()
    {
        // This is your test secret API key.
        \Stripe\Stripe::setApiKey(config('stripe.test_secret_key'));
        $cartTotal = (new cartRepository())->total();
        header('Content-Type: application/json');

        try {
            // retrieve JSON from POST body
            $jsonStr = file_get_contents('php://input');
            $jsonObj = json_decode($jsonStr);

            // Create a PaymentIntent with amount and currency
            $paymentIntent = \Stripe\PaymentIntent::create([
                'amount' => $cartTotal,
                'currency' => 'eur',
                'automatic_payment_methods' => [
                    'enabled' => true,
                ],
            ]);

            $output = [
                'clientSecret' => $paymentIntent->client_secret,
            ];

            echo json_encode($output);
        } catch (Error $e) {
            http_response_code(500);
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function thanks() {
        return view('payement.success');
    }
}

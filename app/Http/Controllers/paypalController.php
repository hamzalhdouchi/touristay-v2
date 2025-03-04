<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Omnipay\Omnipay;
use PharIo\Manifest\Url;

class paypalController extends Controller
{
    private $geteway;

    public function __construct()
    {
        $this->geteway = Omnipay::create('PayPal_Rest');
        $this->geteway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->geteway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->geteway->setTestMode(true);
    }

    public function pay(Request $request)
    {

       
        try {
            

            $response = $this->geteway->purchase(array(
                'amount' => $request->amount,
                'returnUrl' => Url('success'),
                'cancelUrl' => Url('error'),
            ))->send();

            if (true) {
                
                return redirect()->away($response->getRedirectUrl());
            }
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}

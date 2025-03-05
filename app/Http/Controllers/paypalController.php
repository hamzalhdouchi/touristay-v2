<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\payment;

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
                'currency' => 'USD',
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



    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->geteway->completePurchase([
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
            ])->send();
    
            $response = $transaction->getData();
    
            if ($transaction->isSuccessful()) {
                $arr = $response;
    
                $payment = new payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->status = $arr['state'];
                $payment->amount = $arr['transactions'][0]['amount']['total']; 
                $payment->save(); 
                
                session()->flash('success','Payment successful');
                
                return to_route('readAll.properties');
            } else {
                session()->flash('error',$transaction->getMessage());
                return to_route('readAll.properties');
            }
        } else {
            session()->flash('error', 'Payment declined');
            return to_route('readAll.properties');
        }
    }
    
    public function error()  {

        session()->flash('error','user dicline the payment');
        return to_route('readAll.properties');
    }
}

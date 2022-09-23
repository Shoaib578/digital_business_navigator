<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Checkout extends Controller
{
    public function BuySubscriptioncheckout($price,$subscription_id)
    {   

        if(auth()->user()->is_admin == 1){
            return redirect()->route('admin_home');
        }


        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Li9vSLrpfnp4zWJmdpNm8vuzpLLpwbbVGzfytQbeVWeYDE9wXSH48h1Rsufx08gqTyqefTlYhSop6AZJh3vprXJ00xTEddr3r');
        		
		$amount = $price;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'By From Digital Business Navigator',
			'amount' => $amount,
			'currency' => 'USD',
			
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.credit-card',compact('intent'),["amount"=>$price,"subscription_id"=>$subscription_id]);

    }

    public function afterBuySubscriptionpayment($subscription_id)
    {
        if(auth()->user()->is_admin == 1){
            return redirect()->route('admin_home');
        }
        return redirect()->route('final_buy_subscription',$subscription_id);
       
    }


    public function BuyServiceCheckout($price,$service_id)
    {   

        if(auth()->user()->is_admin == 1){
            return redirect()->route('admin_home');
        }


        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Li9vSLrpfnp4zWJmdpNm8vuzpLLpwbbVGzfytQbeVWeYDE9wXSH48h1Rsufx08gqTyqefTlYhSop6AZJh3vprXJ00xTEddr3r');
        		
		$amount = $price;
		$amount *= 100;
        $amount = (int) $amount;
        
        $payment_intent = \Stripe\PaymentIntent::create([
			'description' => 'By From Digital Business Navigator',
			'amount' => $amount,
			'currency' => 'USD',
			
			'payment_method_types' => ['card'],
		]);
		$intent = $payment_intent->client_secret;

		return view('checkout.service-credit-card',compact('intent'),["amount"=>$price,"service_id"=>$service_id]);

    }

    public function afterBuyServicepayment($service_id)
    {
        if(auth()->user()->is_admin == 1){
            return redirect()->route('admin_home');
        }
        return redirect()->route('buy_service',$service_id);
       
    }

}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Subscription extends BaseController
{
    public function index()
    {
        return view('saas/subscription');
    }

    public function subscribe()
    {
        // Placeholder for Stripe/LemonSqueezy integration
        $plan = $this->request->getPost('plan');

        // TODO: Redirect to payment gateway

        return redirect()->back()->with('message', "Subscribed to $plan plan!");
    }
}

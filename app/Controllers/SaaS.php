<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SaaS extends BaseController
{
    public function index()
    {
        return view('saas/landing');
    }

    public function register()
    {
        return view('saas/register');
    }

    public function attempt_register()
    {
        // Placeholder for tenant registration logic
        // 1. Validate input
        // 2. Create tenant in 'tenants' table
        // 3. Create admin user for tenant
        // 4. Redirect to dashboard or login

        $tenantData = [
            'name' => $this->request->getPost('company_name'),
            'domain' => $this->request->getPost('domain'),
            'email' => $this->request->getPost('email'),
        ];

        // TODO: Implement actual registration once DB is connected

        return redirect()->to('login')->with('message', 'Registration successful! Please login.');
    }
}

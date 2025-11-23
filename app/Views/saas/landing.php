<?= view('partial/header') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h1 class="display-4 mb-4">Welcome to OSPOS SaaS</h1>
            <p class="lead mb-5">The ultimate Point of Sale solution for your business. Manage sales, inventory, and
                employees with ease.</p>

            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Start Free Trial</h5>
                            <p class="card-text">Try OSPOS SaaS for 14 days. No credit card required.</p>
                            <a href="<?= site_url('saas/register') ?>" class="btn btn-primary">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Login</h5>
                            <p class="card-text">Already have an account? Sign in to your dashboard.</p>
                            <a href="<?= site_url('login') ?>" class="btn btn-outline-light">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= view('partial/footer') ?>
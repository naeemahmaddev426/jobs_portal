@extends('layouts.public')

@section('content')

<section class="page-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1>Top Companies Hiring</h1>
            <p class="lead">Discover leading companies and organizations across Pakistan posting jobs on our platform. All verified and trusted.</p>
        </div>
    </div>
</section>

<section class="section section-companies">
    <div class="section-heading-row mb-4">
        <div>
            <p class="eyebrow">Verified Employers</p>
            <h2>Companies hiring now</h2>
        </div>
    </div>

    <div class="companies-grid">
        <div class="company-card">
            <div class="company-logo-large">
                <i class="fas fa-g"></i>
            </div>
            <h4>Google</h4>
            <p class="company-count">285+ jobs</p>
            <p class="company-desc">Tech & Search Infrastructure</p>
            <a href="{{ route('jobs.list', ['company' => 'google']) }}" class="btn btn-sm btn-outline-primary">View Jobs</a>
        </div>
        <div class="company-card">
            <div class="company-logo-large" style="background: #00a4ef;">
                <i class="fas fa-m"></i>
            </div>
            <h4>Microsoft</h4>
            <p class="company-count">192+ jobs</p>
            <p class="company-desc">Cloud & Software Solutions</p>
            <a href="{{ route('jobs.list', ['company' => 'microsoft']) }}" class="btn btn-sm btn-outline-primary">View Jobs</a>
        </div>
        <div class="company-card">
            <div class="company-logo-large" style="background: #1b4f72;">
                <i class="fas fa-s"></i>
            </div>
            <h4>Systems Ltd</h4>
            <p class="company-count">156+ jobs</p>
            <p class="company-desc">IT Solutions & Services</p>
            <a href="{{ route('jobs.list', ['company' => 'systems-ltd']) }}" class="btn btn-sm btn-outline-primary">View Jobs</a>
        </div>
        <div class="company-card">
            <div class="company-logo-large" style="background: #e74c3c;">
                <i class="fas fa-n"></i>
            </div>
            <h4>10Pearls</h4>
            <p class="company-count">203+ jobs</p>
            <p class="company-desc">Digital Agency & Development</p>
            <a href="{{ route('jobs.list', ['company' => '10pearls']) }}" class="btn btn-sm btn-outline-primary">View Jobs</a>
        </div>
        <div class="company-card">
            <div class="company-logo-large\" style="background: #27ae60;">
                <i class="fas fa-a"></i>
            </div>
            <h4>Arbisoft</h4>
            <p class="company-count">98+ jobs</p>
            <p class="company-desc">Software Engineering & Consulting</p>
            <a href="{{ route('jobs.list', ['company' => 'arbisoft']) }}" class="btn btn-sm btn-outline-primary">View Jobs</a>
        </div>
        <div class="company-card">
            <div class="company-logo-large" style="background: #f39c12;">
                <i class="fas fa-t"></i>
            </div>
            <h4>TechWave</h4>
            <p class="company-count">145+ jobs</p>
            <p class="company-desc">Innovative Tech Solutions</p>
            <a href="{{ route('jobs.list', ['company' => 'techwave']) }}" class="btn btn-sm btn-outline-primary">View Jobs</a>
        </div>
    </div>
</section>

<section class="cta-banner mt-5">
    <div class="cta-content">
        <div>
            <p class="eyebrow">Ready to apply?</p>
            <h2>Browse all jobs and get hired</h2>
        </div>
        <a href="{{ route('jobs.list') }}" class="btn btn-primary cta-btn">Browse All Jobs</a>
    </div>
</section>

@endsection

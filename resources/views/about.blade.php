@extends('layouts.public')

@section('content')

<section class="page-hero">
    <div class="row align-items-center">
        <div class="col-md-7">
            <h1>About Job Portal</h1>
            <p class="lead">We connect talented professionals with Pakistan's fastest-growing companies. Our mission is to make hiring efficient, fair and transparent.</p>
            <p>Founded to simplify the job search and hiring process, we combine powerful search, verified employers and a friendly candidate experience.</p>
            <a href="{{ route('jobs.list') }}" class="btn btn-primary mt-3">Browse Jobs</a>
        </div>
        <div class="col-md-5">
            <div class="hero-illustration">
                <svg viewBox="0 0 600 360" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="About illustration">
                    <rect x="0" y="0" width="600" height="360" rx="18" fill="#fff" opacity="0.04"/>
                    <g transform="translate(40,60)">
                        <rect x="0" y="0" width="120" height="120" rx="12" fill="#60a5fa" opacity="0.18"/>
                        <rect x="150" y="0" width="200" height="28" rx="8" fill="#fff" opacity="0.14"/>
                        <rect x="150" y="44" width="160" height="20" rx="6" fill="#fff" opacity="0.12"/>
                        <rect x="150" y="76" width="220" height="20" rx="6" fill="#fff" opacity="0.12"/>
                    </g>
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="about-section">
    <div class="row">
        <div class="col-md-4">
            <h3>Mission</h3>
            <p>Deliver the best hiring outcomes by matching skills, culture and growth potential.</p>
        </div>
        <div class="col-md-4">
            <h3>Vision</h3>
            <p>Build the most trusted talent marketplace for Pakistan and remote-first companies.</p>
        </div>
        <div class="col-md-4">
            <h3>Values</h3>
            <p>Transparency, speed and respect for every candidate and employer.</p>
        </div>
    </div>

    <div class="numbers-grid mt-4">
        <div class="number-card">
            <h2>50,000+</h2>
            <p>Jobs Listed</p>
        </div>
        <div class="number-card">
            <h2>5,000+</h2>
            <p>Companies</p>
        </div>
        <div class="number-card">
            <h2>100,000+</h2>
            <p>Candidates</p>
        </div>
    </div>
</section>

<!-- Company Story Section -->
<section class="section section-story">
    <div class="section-heading-row">
        <div>
            <p class="eyebrow">Our Journey</p>
            <h2>How we grew</h2>
        </div>
    </div>

    <div class="story-timeline">
        <div class="timeline-item">
            <div class="timeline-marker">
                <i class="fas fa-lightbulb"></i>
            </div>
            <div class="timeline-content">
                <h4>2024 - Idea Started</h4>
                <p>We saw a gap in Pakistan's hiring market. Too slow, too opaque, too complicated. We decided to build better.</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-marker">
                <i class="fas fa-building"></i>
            </div>
            <div class="timeline-content">
                <h4>2025 - First 100 Companies</h4>
                <p>Launched with 5 companies. Within months, reached 100+ verified employers. Companies loved our simplicity.</p>
            </div>
        </div>
        <div class="timeline-item">
            <div class="timeline-marker">
                <i class="fas fa-chart-line"></i>
            </div>
            <div class="timeline-content">
                <h4>2026 - 10,000+ Active Jobs</h4>
                <p>Today, we serve 5,000+ companies and 100,000+ job seekers. We're Pakistan's fastest-growing job platform.</p>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="section section-why-choose">
    <div class="section-heading-row">
        <div>
            <p class="eyebrow">Why Choose Job Portal</p>
            <h2>What makes us different</h2>
        </div>
    </div>

    <div class="why-choose-grid">
        <div class="why-choose-card">
            <div class="why-icon">
                <i class="fas fa-badge-check"></i>
            </div>
            <h4>Verified Employers</h4>
            <p>Every company is manually verified. No scams, no false promises. Only legitimate job opportunities.</p>
        </div>
        <div class="why-choose-card">
            <div class="why-icon">
                <i class="fas fa-bolt"></i>
            </div>
            <h4>Fast Hiring Process</h4>
            <p>Apply in seconds. Get responses in hours. Interviews scheduled within days. Fast, transparent hiring.</p>
        </div>
        <div class="why-choose-card">
            <div class="why-icon">
                <i class="fas fa-earth-americas"></i>
            </div>
            <h4>Remote Opportunities</h4>
            <p>Work from anywhere. Thousands of remote jobs for Pakistan-based talent and international companies.</p>
        </div>
        <div class="why-choose-card">
            <div class="why-icon">
                <i class="fas fa-rocket"></i>
            </div>
            <h4>Career Growth</h4>
            <p>Find roles that match your skills and ambitions. Upskill, grow, and reach your full potential.</p>
        </div>
        <div class="why-choose-card">
            <div class="why-icon">
                <i class="fas fa-file-pdf"></i>
            </div>
            <h4>Resume Support</h4>
            <p>Optimize your profile with our AI-powered resume feedback. Get noticed by top companies.</p>
        </div>
    </div>
</section>

<section class="cta-banner mt-5">
    <div class="cta-content">
        <div>
            <p class="eyebrow">Join the movement</p>
            <h2>Employers and candidates: get started today</h2>
        </div>
        <a href="{{ route('jobs.list') }}" class="btn btn-primary cta-btn">Get Started</a>
    </div>
</section>

@endsection

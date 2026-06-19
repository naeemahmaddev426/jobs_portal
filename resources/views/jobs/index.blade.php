@extends('layouts.public')

@section('content')

<section class="hero-wrapper">
    <div class="row align-items-center gx-5">
        <div class="col-lg-7">
            <span class="hero-badge">#1 Job Portal in Pakistan</span>
            <h1 class="hero-title">Find Your Dream Career Today</h1>
            <p class="hero-desc">Connect with top companies and discover thousands of opportunities across Pakistan.</p>

            <form action="{{ route('jobs.list') }}" method="GET" class="hero-search">
                <div class="search-area">
                    <div class="search-field">
                        <label for="keyword" class="sr-only">Keyword</label>
                        <input id="keyword" type="text" name="keyword" placeholder="Job title, keyword">
                    </div>
                    <div class="search-field">
                        <label for="location" class="sr-only">Location</label>
                        <input id="location" type="text" name="location" placeholder="Location">
                    </div>
                    <div class="search-field">
                        <label for="category" class="sr-only">Category</label>
                        <select id="category" name="category">
                            <option value="">Category</option>
                            <option value="software-development">Software Development</option>
                            <option value="marketing">Marketing</option>
                            <option value="design">Design</option>
                            <option value="sales">Sales</option>
                        </select>
                    </div>
                    <div class="search-field">
                        <label for="job_type" class="sr-only">Job Type</label>
                        <select id="job_type" name="job_type">
                            <option value="">Job Type</option>
                            <option value="full_time">Full Time</option>
                            <option value="part_time">Part Time</option>
                            <option value="contract">Contract</option>
                            <option value="remote">Remote</option>
                        </select>
                    </div>
                    <button type="submit" class="search-btn">Search</button>
                </div>
            </form>
        </div>

        <div class="col-lg-5">
            <div class="hero-side">
                <div class="hero-illustration" aria-hidden="true">
                    <!-- Simple illustrative SVG for job search / hiring -->
                    <svg viewBox="0 0 600 360" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Job search illustration">
                        <defs>
                            <linearGradient id="g1" x1="0" x2="1">
                                <stop offset="0" stop-color="#60a5fa"/>
                                <stop offset="1" stop-color="#f97316"/>
                            </linearGradient>
                        </defs>
                        <rect x="0" y="0" width="600" height="360" rx="20" fill="url(#g1)" opacity="0.08"/>
                        <g fill="#0f172a" opacity="0.9">
                            <circle cx="120" cy="120" r="36" fill="#fff" opacity="0.14"/>
                            <rect x="180" y="80" width="300" height="40" rx="8" fill="#fff" opacity="0.18"/>
                            <rect x="180" y="140" width="260" height="32" rx="6" fill="#fff" opacity="0.12"/>
                            <rect x="180" y="190" width="200" height="28" rx="6" fill="#fff" opacity="0.12"/>
                        </g>
                        <g transform="translate(36,96)">
                            <text x="0" y="-12" font-size="18" fill="#0f172a" font-weight="700">Job Search</text>
                            <text x="0" y="18" font-size="14" fill="#0f172a">Resume</text>
                            <text x="120" y="18" font-size="14" fill="#0f172a">Hiring</text>
                            <text x="240" y="18" font-size="14" fill="#0f172a">Career Growth</text>
                        </g>
                    </svg>
                </div>
                <div class="hero-mini-card hero-mini-card-top">
                    <div class="mini-item">
                        <span class="mini-icon">✔</span>
                        <div>
                            <strong>10,000+</strong>
                            <p>Active Jobs</p>
                        </div>
                    </div>
                    <div class="mini-item">
                        <span class="mini-icon">🏢</span>
                        <div>
                            <strong>500+</strong>
                            <p>Companies</p>
                        </div>
                    </div>
                </div>
                <div class="hero-mini-card hero-mini-card-bottom">
                    <div class="mini-item">
                        <span class="mini-icon">🎯</span>
                        <div>
                            <strong>2,000+</strong>
                            <p>Successful Hires</p>
                        </div>
                    </div>
                    <div class="mini-item">
                        <span class="mini-icon">⭐</span>
                        <div>
                            <strong>4.8/5</strong>
                            <p>Candidate Rating</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row stats-row text-center mb-5 gx-4">
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 stats-card">
            <div class="card-body">
                <h2 class="fw-bold text-primary">1000+</h2>
                <p>Active Jobs</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 stats-card">
            <div class="card-body">
                <h2 class="fw-bold text-success">500+</h2>
                <p>Companies</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card border-0 shadow-sm h-100 stats-card">
            <div class="card-body">
                <h2 class="fw-bold text-danger">2000+</h2>
                <p>Candidates</p>
            </div>
        </div>
    </div>
</div>

<section class="section section-numbers">
    <div class="numbers-grid">
        <div class="number-card">
            <h2>50,000+</h2>
            <p>Jobs</p>
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

<section class="section section-categories">
    <div class="section-heading-row">
        <div>
            <p class="eyebrow">Browse by category</p>
            <h2>Find roles that match your skills</h2>
        </div>
        <a href="{{ route('jobs.list') }}" class="link-btn">Explore all jobs</a>
    </div>

    <div class="category-grid">
        <a href="{{ route('jobs.list', ['category' => 'software-development']) }}" class="category-card">
            <span>Software Development</span>
            <small>1200+ jobs</small>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'marketing']) }}" class="category-card">
            <span>Marketing</span>
            <small>430+ jobs</small>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'design']) }}" class="category-card">
            <span>Design</span>
            <small>320+ jobs</small>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'sales']) }}" class="category-card">
            <span>Sales</span>
            <small>280+ jobs</small>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'ai-ml']) }}" class="category-card">
            <span>AI & ML</span>
            <small>220+ jobs</small>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'data-science']) }}" class="category-card">
            <span>Data Science</span>
            <small>180+ jobs</small>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'devops']) }}" class="category-card">
            <span>DevOps</span>
            <small>150+ jobs</small>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'cyber-security']) }}" class="category-card">
            <span>Cyber Security</span>
            <small>95+ jobs</small>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'mobile-apps']) }}" class="category-card">
            <span>Mobile Apps</span>
            <small>210+ jobs</small>
        </a>
    </div>
</section>

<section class="section section-brands">
    <div class="section-heading-row">
        <div>
            <p class="eyebrow">Trusted by top brands</p>
            <h2>Companies hiring right now</h2>
        </div>
    </div>

    <div class="brand-grid">
        <div class="brand-item">
            <!-- Dummy SVG logo -->
            <svg width="100" height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="100" height="36" rx="6" fill="#2563EB"/><text x="12" y="23" fill="#fff" font-weight="700" font-size="12">TechWave</text></svg>
        </div>
        <div class="brand-item">
            <svg width="100" height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="100" height="36" rx="6" fill="#10B981"/><text x="12" y="23" fill="#fff" font-weight="700" font-size="12">AtlasHR</text></svg>
        </div>
        <div class="brand-item">
            <svg width="100" height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="100" height="36" rx="6" fill="#7C3AED"/><text x="12" y="23" fill="#fff" font-weight="700" font-size="12">Nova</text></svg>
        </div>
        <div class="brand-item">
            <svg width="100" height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="100" height="36" rx="6" fill="#F97316"/><text x="12" y="23" fill="#fff" font-weight="700" font-size="12">BluePeak</text></svg>
        </div>
        <div class="brand-item">
            <svg width="100" height="36" viewBox="0 0 100 36" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="100" height="36" rx="6" fill="#EF4444"/><text x="12" y="23" fill="#fff" font-weight="700" font-size="12">PulseWorks</text></svg>
        </div>
    </div>
</section>

<section class="section section-why">
    <div class="section-heading-row">
        <div>
            <p class="eyebrow">Why choose us</p>
            <h2>More than just job listings</h2>
        </div>
    </div>

    <div class="why-grid">
        <div class="why-card">
            <h3>Verified employers</h3>
            <p>We work only with trusted companies so you can apply with confidence.</p>
        </div>
        <div class="why-card">
            <h3>Fast applications</h3>
            <p>Submit your profile quickly and receive responses from hiring managers.</p>
        </div>
        <div class="why-card">
            <h3>Local and remote roles</h3>
            <p>Find jobs across Pakistan and remote opportunities with leading firms.</p>
        </div>
    </div>
</section>

<section class="section section-featured-jobs">
    <div class="section-heading-row">
        <div>
            <p class="eyebrow">Featured jobs</p>
            <h2>Latest opportunities</h2>
        </div>
        <a href="{{ route('jobs.list') }}" class="link-btn">View all jobs</a>
    </div>

    @if($jobs->count())
        <div class="job-grid">
            @foreach($jobs->take(6) as $job)
                <div class="card border-0 shadow-sm h-100 job-card">
                    <div class="card-body d-flex flex-column">
                        <div class="job-card-top mb-3">
                            <div class="company-logo">{{ strtoupper(substr($job->company->company_name ?? 'JP', 0, 2)) }}</div>
                            <span class="badge bg-primary text-white py-2 px-3">{{ ucfirst(str_replace('_', ' ', $job->job_type ?: 'Full Time')) }}</span>
                        </div>
                        <h4 class="fw-bold mb-1">{{ $job->title }}</h4>
                        <p class="job-company mb-2">{{ $job->company->company_name ?? 'Company Name' }}</p>
                        <div class="job-meta mb-3">
                            <span>Remote</span>
                            <span>•</span>
                            <span>{{ $job->location }}</span>
                        </div>
                        <p class="fw-semibold text-success mb-4">Rs {{ number_format($job->salary) }}</p>
                        <div class="job-actions mt-auto d-flex gap-2 flex-column">
                            <a href="{{ route('jobs.show',$job->slug) }}" class="btn btn-primary w-100">Apply Now</a>
                            <a href="{{ route('jobs.show',$job->slug) }}" class="btn btn-outline-primary w-100">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="no-results-card">
            <p>There are no jobs available right now. Please check back later or update your search filters.</p>
        </div>
    @endif
</section>

<section class="section section-steps">
    <div class="section-heading-row">
        <div>
            <p class="eyebrow">Simple and fast</p>
            <h2>How it works</h2>
        </div>
    </div>

    <div class="steps-grid">
        <div class="step-card">
            <div class="step-number">1</div>
            <h3>Search roles</h3>
            <p>Browse thousands of verified job openings and choose what fits your profile.</p>
        </div>
        <div class="step-card">
            <div class="step-number">2</div>
            <h3>Apply quickly</h3>
            <p>Submit your details in a few clicks and get noticed by top employers.</p>
        </div>
        <div class="step-card">
            <div class="step-number">3</div>
            <h3>Get hired</h3>
            <p>Track your applications and connect with leading companies instantly.</p>
        </div>
    </div>
</section>

<section class="cta-banner">
    <div class="cta-content">
        <div>
            <p class="eyebrow">Start your next chapter</p>
            <h2>Find your dream job with the market's best hiring platform.</h2>
        </div>
        <a href="{{ route('jobs.list') }}" class="btn btn-primary cta-btn">Start searching now</a>
    </div>
</section>

<section class="section section-testimonials">
    <div class="section-heading-row">
        <div>
            <p class="eyebrow">What Candidates Say</p>
            <h2>Trusted by job seekers across Pakistan</h2>
        </div>
    </div>

    <div class="testimonial-grid">
        <div class="testimonial-card">
            <h3>Ahmed</h3>
            <p>Got hired in 2 weeks. The application process was smooth and fast.</p>
        </div>
        <div class="testimonial-card">
            <h3>Ali</h3>
            <p>Found a remote job without any hassle. The platform is very professional.</p>
        </div>
        <div class="testimonial-card">
            <h3>Sara</h3>
            <p>Best hiring experience. The employers are verified and responsive.</p>
        </div>
    </div>
</section>

@endsection

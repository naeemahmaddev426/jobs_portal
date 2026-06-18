@extends('layouts.public')

@section('content')

<section class="page-hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h1>Job Categories</h1>
            <p class="lead">Explore opportunities across all job categories. Find roles that match your skills and interests.</p>
        </div>
    </div>
</section>

<section class="section section-all-categories">
    <div class="section-heading-row mb-4">
        <div>
            <p class="eyebrow">Browse by Category</p>
            <h2>All Categories</h2>
        </div>
    </div>

    <div class="category-large-grid">
        <a href="{{ route('jobs.list', ['category' => 'software-development']) }}" class="category-large-card">
            <div class="cat-icon">
                <i class="fas fa-code"></i>
            </div>
            <h4>Software Development</h4>
            <p class="cat-count">1,200+ jobs</p>
            <span class="cat-arrow"><i class="fas fa-arrow-right"></i></span>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'ai-ml']) }}" class="category-large-card">
            <div class="cat-icon">
                <i class="fas fa-brain"></i>
            </div>
            <h4>AI & Machine Learning</h4>
            <p class="cat-count">220+ jobs</p>
            <span class="cat-arrow"><i class="fas fa-arrow-right"></i></span>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'marketing']) }}" class="category-large-card">
            <div class="cat-icon">
                <i class="fas fa-megaphone"></i>
            </div>
            <h4>Marketing</h4>
            <p class="cat-count">430+ jobs</p>
            <span class="cat-arrow"><i class="fas fa-arrow-right"></i></span>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'design']) }}" class="category-large-card">
            <div class="cat-icon">
                <i class="fas fa-palette"></i>
            </div>
            <h4>Design</h4>
            <p class="cat-count">320+ jobs</p>
            <span class="cat-arrow"><i class="fas fa-arrow-right"></i></span>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'cyber-security']) }}" class="category-large-card">
            <div class="cat-icon">
                <i class="fas fa-shield\"></i>
            </div>
            <h4>Cyber Security</h4>
            <p class="cat-count">95+ jobs</p>
            <span class="cat-arrow"><i class="fas fa-arrow-right"></i></span>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'devops']) }}" class="category-large-card">
            <div class="cat-icon">
                <i class="fas fa-server"></i>
            </div>
            <h4>DevOps</h4>
            <p class="cat-count">150+ jobs</p>
            <span class="cat-arrow"><i class="fas fa-arrow-right"></i></span>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'data-science']) }}" class="category-large-card">
            <div class="cat-icon">
                <i class="fas fa-chart-bar"></i>
            </div>
            <h4>Data Science</h4>
            <p class="cat-count">180+ jobs</p>
            <span class="cat-arrow"><i class="fas fa-arrow-right"></i></span>
        </a>
        <a href="{{ route('jobs.list', ['category' => 'mobile-apps']) }}" class="category-large-card">
            <div class="cat-icon">
                <i class="fas fa-mobile-alt"></i>
            </div>
            <h4>Mobile Apps</h4>
            <p class="cat-count">210+ jobs</p>
            <span class="cat-arrow"><i class="fas fa-arrow-right"></i></span>
        </a>
    </div>
</section>

<section class="cta-banner mt-5">
    <div class="cta-content">
        <div>
            <p class="eyebrow">Can't decide?</p>
            <h2>Explore all job listings and find your perfect role</h2>
        </div>
        <a href="{{ route('jobs.list') }}" class="btn btn-primary cta-btn">All Jobs</a>
    </div>
</section>

@endsection

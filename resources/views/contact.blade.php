@extends('layouts.public')

@section('content')
@if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif

<section class="page-hero">
    <div class="row align-items-center">
        <div class="col-md-7">
            <h1>Contact Us</h1>
            <p class="lead">Questions? Feedback? We're here to help. Reach out and we'll get back to you within 2 business days.</p>
        </div>
        <div class="col-md-5">
            <div class="hero-illustration">
                <svg viewBox="0 0 600 360" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Contact illustration">
                    <rect x="0" y="0" width="600" height="360" rx="18" fill="#fff" opacity="0.04"/>
                    <g transform="translate(40,60)">
                        <rect x="0" y="0" width="120" height="120" rx="12" fill="#34d399" opacity="0.18"/>
                        <rect x="150" y="0" width="200" height="28" rx="8" fill="#fff" opacity="0.14"/>
                        <rect x="150" y="44" width="160" height="20" rx="6" fill="#fff" opacity="0.12"/>
                    </g>
                </svg>
            </div>
        </div>
    </div>
</section>

<section class="contact-section mt-4">
    <div class="row">
        <div class="col-md-6">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Your name</label>
                    <input type="text" name="name" class="form-control" placeholder="Ahmed Khan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="you@company.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="5" placeholder="How can we help you?" required></textarea>
                </div>
                <button class="btn btn-primary">Send Message</button>
            </form>
        </div>
        <div class="col-md-6">
            <div class="contact-cards">
                <div class="contact-card-single">
                    <div class="card-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5>Office Location</h5>
                    <p>Karachi, Pakistan</p>
                </div>
                <div class="contact-card-single">
                    <div class="card-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h5>Email</h5>
                    <p>support@jobportal.com</p>
                </div>
                <div class="contact-card-single">
                    <div class="card-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h5>Phone</h5>
                    <p>+92 300 0000000</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="section section-map">
    <div class="section-heading-row mb-4">
        <div>
            <p class="eyebrow">Visit Us</p>
            <h2>Our Location</h2>
        </div>
    </div>
    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.4432700843596!2d67.03753227594263!3d24.86136077411615!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e06651d4d15%3A0x94e15a93cc3d7e0!2sKarachi%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1718699164000" width="100%" height="450" style="border:0; border-radius: 14px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

@endsection

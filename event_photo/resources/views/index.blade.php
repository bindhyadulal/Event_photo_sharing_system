@extends('layouts.app')
@section('content')
@guest
{{-- <div class="main-content">
    <div class="header">
        <h1 class="header-title">Share Your Event Moments</h1>
        <p class="header-subtitle">Capture and share memories instantly with our QR-based photo sharing system</p>
    </div>

    <!-- Carousel for Multiple Photos -->
    <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('images/eps1.jpg')}}" class="d-block w-100" alt="Photo 1">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/eps2.jpg')}}" class="d-block w-100" alt="Photo 2">
            </div>
            <div class="carousel-item">
                <img src="{{asset('images/eps1.jpg')}}" class="d-block w-100" alt="Photo 3">
            </div>
            <!-- Add more carousel items as needed -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <a href="{{route('login')}}" class="btn-custom" style="text-decoration: none;">Get Started</a>

    <!-- How It Works Section -->
    <div class="center-text">
        <h2 style="position: center;">How It Works</h2>
        <div class="step">
            <div class="step-icon">📱</div>
            <div class="step-content">
                <h3>Scan QR Code</h3>
                <p>Find QR codes at your table</p>
            </div>
        </div>
        <div class="step">
            <div class="step-icon">📸</div>
            <div class="step-content">
                <h3>Take Photos</h3>
                <p>Capture beautiful moments</p>
            </div>
        </div>
        <div class="step">
            <div class="step-icon">🚀</div>
            <div class="step-content">
                <h3>Share Instantly</h3>
                <p>Upload and share with everyone</p>
            </div>
        </div>
    </div>
</div> --}}
<div class="main-content">
    <div class="header">
        <h1 class="header-title">Share Your Event Moments</h1>
        <p class="header-subtitle">Capture and share memories instantly with our QR-based photo sharing system</p>
    </div>

    <!-- Carousel for Multiple Photos -->
    <div class="carousel-container">
        <div id="photoCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('images/1.jpg')}}" class="d-block" alt="Photo 1">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/2.jpg')}}" class="d-block" alt="Photo 2">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/3.jpg')}}" class="d-block" alt="Photo 3">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('images/4.jpg')}}" class="d-block" alt="Photo 4">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#photoCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#photoCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <a href="{{route('login')}}" class="btn-custom">Get Started</a>

    <!-- How It Works Section -->
    <div class="center-text">
        <h2>How It Works</h2>
        <div class="step-container">
            <div class="step">
                <div class="step-icon">📱</div>
                <div class="step-content">
                    <h3>Scan QR Code</h3>
                    <p>Find QR codes at your table</p>
                </div>
            </div>
            <div class="step">
                <div class="step-icon">📸</div>
                <div class="step-content">
                    <h3>Take Photos</h3>
                    <p>Capture beautiful moments</p>
                </div>
            </div>
            <div class="step">
                <div class="step-icon">🚀</div>
                <div class="step-content">
                    <h3>Share Instantly</h3>
                    <p>Upload and share with everyone</p>
                </div>
            </div>
        </div>
    </div>

    <!-- About Us Section -->
    <div class="about-section">
        <h2>About Us</h2>
        <p>Event Moments is a platform designed to help you capture, share, and cherish your special memories effortlessly. With our innovative QR-based system, you can instantly share photos from your events and relive those moments anytime, anywhere.</p>
    </div>

    <!-- Contact Section -->
    <div class="contact-section">
        <!-- Contact Us Column -->
        <div class="contact-column">
            <h3><b>Contact Us</b></h3>
            <p>Email: <a href="mailto:event@gmail.com">event@gmail.com</a></p>
            <p>Phone:9800000000</p>
        </div>

        <!-- Address with Map Column -->
        <div class="contact-column">
            <h3><b>Our Address</b></h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3196.3317968981833!2d85.30596252546765!3d27.715383926177925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb18fca0424275%3A0x4094b9db85d64504!2sPaknajol%2C%20Kathmandu%2044600!5e1!3m2!1sen!2snp!4v1734760410911!5m2!1sen!2snp" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

</div>
@else

<div class="container">
    <!-- Statistics Section -->
    <div class="row">
        <div class="col-12 col-md-6 mb-3">
            <div class="card text-white bg-primary">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Event Bookings</h5>
                    <p class="card-text display-4">{{$events_booked}}</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Photo Contributors</h5>
                    <p class="card-text display-4">{{$photo_contributor}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h2>Event Booking Form</h2>
    @if(Session::has('status'))
        <p class="alert alert-success">{{Session::get('status')}}</p>
    @endif
    <form action="{{route('admin.event.booking')}}" method="POST">
        @csrf
        <!-- Name -->
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="name" placeholder="Enter your full name" required>
        </div>

        <!-- Email -->
        <div class="form-group">
            <label for="email">Email Address</label>
            <input type="email" id="email" name="email" placeholder="Enter your email address" required>
        </div>

        <!-- Phone -->
        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>
        </div>

        <!-- Event Type -->
        <div class="form-group">
            <label for="event_type">Event Type</label>
            <select id="event_type" name="event_type" required>
                <option value="" disabled selected>Select event type</option>
                <option value="wedding">Wedding</option>
                <option value="birthday">Birthday</option>
                <option value="corporate">Corporate Event</option>
                <option value="party">Private Party</option>
                <option value="others">Others</option>
            </select>
        </div>

        <!-- Event Date -->
        <div class="form-group">
            <label for="event_date">Event Date</label>
            <input type="date" id="event_date" name="event_date" required>
        </div>
        

        <!-- Submit Button -->
        <button type="submit" class="btn-submit">Book Event</button>
    </form>
</div>
@endguest
@endsection
@push('scripts')
<script>
    // Set min date to today's date
    const eventDateInput = document.getElementById('event_date');
    const today = new Date().toISOString().split('T')[0];
    eventDateInput.setAttribute('min', today);
</script>
@endpush
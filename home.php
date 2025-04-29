<?php 
include 'admin/db_connect.php'; 
?>

<!-- Clean theme styling -->
<style>
:root {
    --primary-color: #3a7bd5;
    --secondary-color: #ff7e5f;
    --accent-color: #feb47b;
    --primary-gradient: linear-gradient(135deg, #f5f7fa 0%, #e4e9f2 100%);
    --secondary-gradient: linear-gradient(45deg, #ff7e5f, #feb47b);
    --text-light: #fff;
    --text-dark: #333;
    --text-muted: #777;
    --section-padding: 80px 0;
    --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    --card-hover-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

body {
    background-color: #f5f7fa;
    color: var(--text-dark);
    margin: 0;
    padding: 0;
    overflow-x: hidden;
}

/* Global section styling */
section {
    padding: var(--section-padding);
    position: relative;
    overflow: hidden;
    margin: 0;
    background: var(--primary-gradient);
}

.section-title {
    color: var(--text-dark);
    position: relative;
    margin-bottom: 30px;
    display: inline-block;
}

.section-title:after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: var(--secondary-color);
}

.divider {
    max-width: 100px;
    margin: 20px auto;
    background-color: var(--secondary-color);
}

/* Consistent card styling */
.card {
    border: none;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: var(--card-shadow);
    margin-bottom: 30px;
    height: 100%;
    background-color: #ffffff;
    color: var(--text-dark);
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: var(--card-hover-shadow);
}

.card-title, .card-text {
    color: var(--text-dark);
}

.text-muted {
    color: var(--text-muted) !important;
}
/* Carousel Styling */
.event-carousel-container {
    position: relative;
    overflow: hidden;
    padding: 20px 0;
}

.event-carousel {
    display: flex;
    overflow-x: auto;
    scroll-behavior: smooth;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE and Edge */
    padding: 20px 0;
    gap: 20px;
}

.event-carousel::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}

.event-carousel .event-card {
    flex: 0 0 auto;
    width: 350px;
    height: auto;
    transition: all 0.3s ease;
}

.event-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--card-hover-shadow);
}

.carousel-control {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 40px;
    height: 40px;
    background: var(--primary-color);
    border-radius: 50%;
    border: none;
    color: white;
    font-size: 18px;
    cursor: pointer;
    opacity: 0.9;
    z-index: 10;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.carousel-control:hover {
    opacity: 1;
    background: var(--secondary-color);
}

.carousel-control.prev {
    left: 10px;
}

.carousel-control.next {
    right: 10px;
}

.carousel-dots {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.carousel-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: rgba(58, 123, 213, 0.3);
    margin: 0 5px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.carousel-dot.active {
    background: var(--primary-color);
    transform: scale(1.2);
}

/* Make cards more consistent in the carousel */
.event-card .card-img-top {
    height: 200px;
    object-fit: cover;
}

/* Ensure proper button spacing */
.event-card .btn-outline {
    margin-top: 10px;
}

/* Animation for cards entering viewport */
@keyframes fadeInRight {
    from {
        opacity: 0;
        transform: translateX(30px);
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

.event-card {
    animation: fadeInRight 0.5s ease forwards;
}

/* Background shapes styling for events section */
.upcoming-events-section {
    position: relative;
    overflow: hidden;
    background: var(--primary-gradient);
    padding: var(--section-padding);
}

.events-shape-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 0;
}

.events-shape {
    position: absolute;
    opacity: 0.1;
    animation: floatEvents 20s linear infinite;
    z-index: 0;
}

.events-shape.circle {
    border-radius: 50%;
    background: var(--primary-color);
}

.events-shape.square {
    border-radius: 0;
    transform: rotate(45deg);
    background: var(--secondary-color);
}

.events-shape.triangle {
    width: 0 !important;
    height: 0 !important;
    background: transparent !important;
    border-left: 40px solid transparent;
    border-right: 40px solid transparent;
    border-bottom: 70px solid var(--accent-color);
    opacity: 0.1;
}

@keyframes floatEvents {
    0% {
        transform: translateY(0) translateX(0) rotate(0deg);
        opacity: 0.08;
    }
    25% {
        opacity: 0.12; 
    }
    50% {
        transform: translateY(-20px) translateX(20px) rotate(180deg);
        opacity: 0.06;
    }
    75% {
        opacity: 0.1;
    }
    100% {
        transform: translateY(0) translateX(0) rotate(360deg);
        opacity: 0.08;
    }
}

/* Make section content appear above the shapes */
.upcoming-events-section .container {
    position: relative;
    z-index: 2;
}

/* Button styling */
.btn {
    padding: 12px 28px;
    border-radius: 50px;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-primary {
    background: var(--secondary-color);
    border-color: var(--secondary-color);
    color: var(--text-light);
}

.btn-primary:hover {
    background: transparent;
    border-color: var(--secondary-color);
    color: var(--secondary-color);
}

.btn-outline {
    color: var(--primary-color);
    border: 2px solid var(--primary-color);
    background: transparent;
}

.btn-outline:hover {
    background: var(--primary-color);
    color: white;
}

/* Hero section styling */
.hero-section {
    position: relative;
    width: 100%;
    height: 100vh;
    min-height: 600px;
    padding: 0;
    margin: 0;
    overflow: hidden;
}

/* Video slider styling */
.video-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
}

.video-slider {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
}

.video-slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1s ease-in-out;
}

.video-slide.active {
    opacity: 1;
}

.video-slide video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.6);
    z-index: 2;
}

.hero-section {
    position: relative;
    width: 100%;
    height: 100vh;
    min-height: 600px;
    padding: 0;
    margin: 0;
    overflow: hidden;
}

.hero-content {
    position: relative;
    z-index: 3;
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: flex-start;
    text-align: left;
    color: var(--text-light);
}

.hero-text {
    animation: fadeInUp 1.5s ease-out;
    max-width: 600px;
    padding-left: 15px;
}

.hero-title {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    color: white;
    text-align: left;
}

.hero-subtitle {
    font-size: 1.5rem;
    margin-bottom: 2rem;
    color: rgba(255, 255, 255, 0.9);
    text-align: left;
}

.hero-btn {
    animation: fadeInUp 2s ease-out;
    display: inline-block;
    padding: 15px 40px;
    font-size: 1.1rem;
    font-weight: 600;
    background: var(--secondary-color);
    color: white;
    border: 2px solid var(--secondary-color);
    border-radius: 50px;
    transition: all 0.3s ease;
    text-decoration: none;
}

.hero-btn:hover {
    background: transparent;
    color: white;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* No events container styling */
.no-events-container {
    background: #ffffff;
    padding: 40px;
    border-radius: 12px;
    box-shadow: var(--card-shadow);
    position: relative;
    overflow: hidden;
    margin: 0 auto;
    max-width: 600px;
    border-left: 5px solid var(--secondary-color);
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { box-shadow: 0 0 0 0 rgba(255, 126, 95, 0.4); }
    70% { box-shadow: 0 0 0 15px rgba(255, 126, 95, 0); }
    100% { box-shadow: 0 0 0 0 rgba(255, 126, 95, 0); }
}

.no-events-icon {
    font-size: 60px;
    color: var(--secondary-color);
    margin-bottom: 20px;
}

.no-events-title {
    font-size: 24px;
    font-weight: 700;
    margin-bottom: 15px;
    color: var(--text-dark);
}

.no-events-message {
    font-size: 18px;
    color: var(--text-muted);
}

/* Feature icon styling */
.feature-icon-wrapper {
    height: 100px;
    width: 100px;
    border-radius: 50%;
    background: rgba(58, 123, 213, 0.1);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 30px;
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon-wrapper {
    background: var(--primary-color);
}

.feature-icon-wrapper i {
    color: var(--primary-color);
    transition: all 0.3s ease;
}

.feature-card:hover .feature-icon-wrapper i {
    color: white;
}

/* Stats styling */
.stat-item {
    padding: 30px;
}

.stat-number {
    font-size: 3.5rem;
    font-weight: 700;
    margin-bottom: 10px;
    color: var(--text-dark);
}

.stat-label {
    font-size: 1.2rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: var(--text-dark);
}

/* Badge styling */
.badge {
    padding: 8px 15px;
    border-radius: 50px;
    margin-right: 8px;
    color: var(--text-light);
}

/* Event overlay */
.event-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.event-list:hover .event-overlay {
    opacity: 1;
}

.view-details {
    color: white;
    background: rgba(0, 0, 0, 0.7);
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
    transform: translateY(20px);
    opacity: 0;
    transition: all 0.4s ease;
}

.event-list:hover .view-details {
    transform: translateY(0);
    opacity: 1;
}

/* Stats section styling */
.stats-section {
    background: linear-gradient(135deg, #3a7bd5, #00d2ff);
    color: var(--text-light);
}

.stats-section .stat-number,
.stats-section .stat-label {
    color: var(--text-light);
}

.shape-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
}

.shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: float 15s linear infinite;
    z-index: 1;
}

.shape-circle {
    border-radius: 50%;
}

.shape-square {
    border-radius: 0;
    transform: rotate(45deg);
}

.shape-triangle {
    width: 0 !important;
    height: 0 !important;
    background: transparent !important;
    border-left: 40px solid transparent;
    border-right: 40px solid transparent;
    border-bottom: 70px solid rgba(255, 255, 255, 0.1);
    border-radius: 0;
}

@keyframes float {
    0% {
        transform: translateY(0) translateX(0) rotate(0deg);
        opacity: 1;
    }
    50% {
        transform: translateY(-20px) translateX(20px) rotate(180deg);
        opacity: 0.5;
    }
    100% {
        transform: translateY(0) translateX(0) rotate(360deg);
        opacity: 1;
    }
}

/* Add relative positioning to sections that will contain shapes */
.stats-section, .cta-section {
    position: relative;
    z-index: 1;
}

/* Make sure content stays on top of shapes */
.stats-section .container, .cta-section .container {
    position: relative;
    z-index: 2;
}
</style>

<!-- Hero Section with Video Slider -->
<section class="hero-section">
    <div class="video-container">
        <div class="video-slider">
            <div class="video-slide active">
                <video autoplay muted loop playsinline>
                    <source src="admin/assets/uploads/videos/4.mp4" type="video/mp4">
                </video>
            </div>
            <div class="video-slide">
                <video autoplay muted loop playsinline>
                    <source src="admin/assets/uploads/videos/2.mp4" type="video/mp4">
                </video>
            </div>
            <div class="video-slide">
                <video autoplay muted loop playsinline>
                    <source src="admin/assets/uploads/videos/3.mp4" type="video/mp4">
                </video>
            </div>
            <div class="video-slide">
                <video autoplay muted loop playsinline>
                    <source src="admin/assets/uploads/videos/1.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="video-slide">
                <video autoplay muted loop playsinline>
                    <source src="admin/assets/uploads/videos/5.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="video-slide">
                <video autoplay muted loop playsinline>
                    <source src="admin/assets/uploads/videos/6.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="video-slide">
                <video autoplay muted loop playsinline>
                    <source src="admin/assets/uploads/videos/7.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <div class="video-overlay"></div>
    </div>
    
    <div class="hero-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-left">
                    <div class="hero-text">
                        <h1 class="hero-title">Wixvent</h1>
                        <p class="hero-subtitle">Find and book the perfect venue for your next event</p>
                        <a href="index.php?page=venue" class="hero-btn">Book a Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="upcoming-events-section">
    <!-- Background Animated Shapes -->
    <div class="events-shape-container">
        <div class="events-shape circle" style="width: 120px; height: 120px; top: 10%; left: 5%; animation-duration: 28s;"></div>
        <div class="events-shape square" style="width: 80px; height: 80px; top: 70%; left: 15%; animation-duration: 22s; animation-delay: 2s;"></div>
        <div class="events-shape triangle" style="top: 25%; left: 80%; animation-duration: 25s; animation-delay: 1s;"></div>
        <div class="events-shape circle" style="width: 60px; height: 60px; top: 80%; left: 75%; animation-duration: 18s; animation-delay: 3s;"></div>
        <div class="events-shape square" style="width: 100px; height: 100px; top: 40%; left: 90%; animation-duration: 24s;"></div>
        <div class="events-shape circle" style="width: 50px; height: 50px; top: 15%; left: 40%; animation-duration: 20s; animation-delay: 4s;"></div>
        <div class="events-shape triangle" style="top: 60%; left: 30%; animation-duration: 26s; animation-delay: 5s;"></div>
    </div>
    
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title">Upcoming Events</h2>
                <hr class="divider my-4">
                <p class="text-muted mb-0">Check out our latest events and don't miss out on what's happening</p>
            </div>
        </div>
        
        <div class="event-carousel-container">
            <button class="carousel-control prev">
                <i class="fas fa-chevron-left"></i>
            </button>
            
            <div class="event-carousel">
                <?php
                // Changed to hardcoded events to showcase multiple upcoming events
                $events = array(
                    array(
                        'id' => 1,
                        'event' => 'Annual Tech Conference 2025',
                        'banner' => 'TC.jpg',
                        'schedule' => '2025-05-15 09:00:00',
                        'description' => 'Join us for our annual technology conference featuring keynote speakers from leading tech companies. This year\'s theme is "AI and the Future of Work" with interactive workshops, panel discussions, and networking opportunities. Perfect for professionals in the tech industry looking to stay ahead of emerging trends.',
                        'venue' => 'Grand Tech Center'
                    ),
                    array(
                        'id' => 2,
                        'event' => 'Cultural Event',
                        'banner' => 'SM.jpg',
                        'schedule' => '2025-06-20 16:00:00',
                        'description' => 'Immerse yourself in a vibrant celebration of traditions, arts, and heritage at our annual Cultural Extravaganza',
                        'venue. Experience the rich tapestry of music, dance, and customs from around the world at this unforgettable cultural festival.' => 'Riverside Park'
                    ),
                    array(
                        'id' => 3,
                        'event' => 'Art and Business Summit 2025',
                        'banner' => 'WG.jpg',
                        'schedule' => '2025-05-28 10:00:00',
                        'description' => 'Where Creativity Meets Commerce – A dynamic convergence of artists, entrepreneurs, and innovators exploring the intersection of art, technology, and business.',
                    'venue' => 'Executive Conference Hall'
                    ),
                    array(
                        'id' => 3,
                        'event' => 'Wedding',
                        'banner' => 'wedding.jpg',
                        'schedule' => '2025-10-28 8:00:00',
                        'description' => 'Where Love Meets Celebration – A magical convergence of hearts, traditions, and creativity, exploring the beautiful union of emotion, elegance, and unforgettable moments.'
                    ),
                );
                
                $delay = 0;
                foreach($events as $row):
                    $short_desc = substr(strip_tags($row['description']), 0, 150) . (strlen(strip_tags($row['description'])) > 150 ? "..." : "");
                    $delay += 100;
                ?>
                <div class="event-card card h-100 event-list" data-id="<?php echo $row['id'] ?>" style="animation-delay: <?php echo $delay; ?>ms;">
                    <div class="card-img-top position-relative" style="height: 200px; background: url('assets/img/<?php echo($row['banner']) ?>') no-repeat center center; background-size: cover;">
                        <div class="event-overlay">
                            <span class="view-details">View Details</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title"><?php echo ucwords($row['event']) ?></h3>
                        <div class="mb-3 event-meta">
                            <span class="badge" style="background-color: var(--primary-color);">
                                <i class="fa fa-calendar me-1"></i> <?php echo date("F d, Y", strtotime($row['schedule'])) ?>
                            </span>
                            <span class="badge" style="background: var(--secondary-gradient);">
                                <i class="fa fa-clock me-1"></i> <?php echo date("h:i A", strtotime($row['schedule'])) ?>
                            </span>
                        </div>
                        <p class="card-text filter-txt"><?php echo $short_desc ?></p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <button class="btn btn-outline w-100 read_more" data-id="<?php echo $row['id'] ?>">Learn More</button>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <button class="carousel-control next">
                <i class="fas fa-chevron-right"></i>
            </button>
            
            <div class="carousel-dots">
                <!-- Dots will be added dynamically with JavaScript -->
            </div>
        </div>
    </div>
</section>


<!-- Features Section -->
<section class="feature-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-title">Why Choose Us</h2>
                <hr class="divider my-4">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up">
                <div class="card h-100 feature-card">
                    <div class="card-body text-center p-5">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-search fa-3x"></i>
                        </div>
                        <h4>Find Your Perfect Venue</h4>
                        <p class="text-muted">Browse through our extensive collection of premium venues for any occasion.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 feature-card">
                    <div class="card-body text-center p-5">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-calendar-check fa-3x"></i>
                        </div>
                        <h4>Easy Booking Process</h4>
                        <p class="text-muted">Our streamlined booking system makes reserving your venue quick and hassle-free.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 feature-card">
                    <div class="card-body text-center p-5">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-star fa-3x"></i>
                        </div>
                        <h4>Premium Experience</h4>
                        <p class="text-muted">Every venue in our collection is carefully selected to ensure the highest quality.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<!-- Updated Statistics Section with Floating Shapes -->
<section class="stats-section">
    <div class="shape-container">
        <div class="shape shape-circle" style="width: 80px; height: 80px; top: 10%; left: 10%; animation-duration: 25s;"></div>
        <div class="shape shape-square" style="width: 60px; height: 60px; top: 50%; left: 15%; animation-duration: 18s; animation-delay: 2s;"></div>
        <div class="shape shape-triangle" style="top: 30%; left: 70%; animation-duration: 22s; animation-delay: 5s;"></div>
        <div class="shape shape-circle" style="width: 120px; height: 120px; top: 70%; left: 80%; animation-duration: 20s; animation-delay: 1s;"></div>
        <div class="shape shape-square" style="width: 40px; height: 40px; top: 20%; left: 40%; animation-duration: 15s; animation-delay: 3s;"></div>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4 mb-md-0" data-aos="fade-up">
                <div class="stat-item">
                    <div class="stat-number count-up" data-count="6">0</div>
                    <div class="stat-label">Venues</div>
                </div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <div class="stat-number count-up" data-count="10">0</div>
                    <div class="stat-label">Happy Clients</div>
                </div>
            </div>
            <div class="col-md-3 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <div class="stat-number count-up" data-count="10">0</div>
                    <div class="stat-label">Events Hosted</div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <div class="stat-number count-up" data-count="69">69</div>
                    <div class="stat-label">Satisfaction Rate %</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Updated Call to Action Section with Floating Shapes -->
<section class="cta-section" style="background: linear-gradient(135deg, #3a7bd5, #00d2ff); color: var(--text-light);">
    <div class="shape-container">
        <div class="shape shape-circle" style="width: 100px; height: 100px; top: 20%; left: 5%; animation-duration: 20s;"></div>
        <div class="shape shape-square" style="width: 50px; height: 50px; bottom: 30%; right: 10%; animation-duration: 17s; animation-delay: 1s;"></div>
        <div class="shape shape-triangle" style="bottom: 10%; left: 30%; animation-duration: 23s; animation-delay: 3s;"></div>
        <div class="shape shape-circle" style="width: 70px; height: 70px; top: 50%; right: 20%; animation-duration: 19s; animation-delay: 2s;"></div>
    </div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-9 text-center text-lg-left" data-aos="fade-right">
                <h2 class="mb-3 text-white">Ready to book your perfect venue?</h2>
                <p class="mb-lg-0 text-white" style="opacity: 0.9;">Explore our selection of premier venues and find the perfect space for your next event.</p>
            </div>
            <div class="col-lg-3 text-center text-lg-right" data-aos="fade-left">
                <a href="index.php?page=venue" class="btn btn-light btn-lg">Get Started</a>
            </div>
        </div>
    </div>
</section>


<script>
    // Initialize AOS animations
    $(document).ready(function() {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        
        // Animate counter
        $('.count-up').each(function() {
            const $this = $(this);
            const countTo = $this.attr('data-count');
            
            $this.waypoint(function() {
                $({ countNum: 0 }).animate({ countNum: countTo }, {
                    duration: 2000,
                    easing: 'linear',
                    step: function() {
                        $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                        $this.text(this.countNum);
                    }
                });
                this.destroy();
            }, { offset: '90%' });
        });
        
        // Event details view
        $('.read_more').click(function(){
            location.href = "index.php?page=view_event&id="+$(this).attr('data-id');
        });
        
        // Card click handler
        $('.event-list').click(function(){
            location.href = "index.php?page=view_event&id="+$(this).attr('data-id');
        });
        
        // Image viewer
        $('.banner img').click(function(){
            viewer_modal($(this).attr('src'));
        });
        
        // Filter functionality
        $('#filter').keyup(function(e){
            var filter = $(this).val();

            $('.card.event-list .filter-txt').each(function(){
                var txto = $(this).html();
                txt = txto;
                if((txt.toLowerCase()).includes((filter.toLowerCase())) == true){
                    $(this).closest('.card').toggle(true);
                }else{
                    $(this).closest('.card').toggle(false);
                }
            });
        });
        
        // Video slider functionality
        let currentSlide = 0;
        const slides = $('.video-slide');
        const slideCount = slides.length;
        
        function nextSlide() {
            slides.eq(currentSlide).removeClass('active');
            currentSlide = (currentSlide + 1) % slideCount;
            slides.eq(currentSlide).addClass('active');
        }
        
        // Change slide every 5 seconds
        setInterval(nextSlide, 5000);
    });
</script>
<script>
  $(document).ready(function() {
        // All existing JavaScript...
        
        // Carousel functionality
        const carousel = $('.event-carousel');
        const items = $('.event-card');
        const itemWidth = items.outerWidth(true);
        const visibleItems = Math.floor(carousel.width() / itemWidth);
        
        // Add dots
        const dotsContainer = $('.carousel-dots');
        const pages = Math.ceil(items.length / visibleItems);
        
        for (let i = 0; i < pages; i++) {
            dotsContainer.append(`<div class="carousel-dot ${i === 0 ? 'active' : ''}"></div>`);
        }
        
        // Carousel navigation
        $('.carousel-control.prev').click(function() {
            carousel.animate({
                scrollLeft: '-=' + (itemWidth * visibleItems)
            }, 300, function() {
                updateDots();
            });
        });
        
        $('.carousel-control.next').click(function() {
            carousel.animate({
                scrollLeft: '+=' + (itemWidth * visibleItems)
            }, 300, function() {
                updateDots();
            });
        });
        
        // Update dots based on scroll position
        function updateDots() {
            const scrollPosition = carousel.scrollLeft();
            const activePage = Math.floor(scrollPosition / (itemWidth * visibleItems));
            
            $('.carousel-dot').removeClass('active');
            $('.carousel-dot').eq(activePage).addClass('active');
        }
        
        // Dot navigation
        $('.carousel-dot').click(function() {
            const dotIndex = $(this).index();
            
            carousel.animate({
                scrollLeft: dotIndex * (itemWidth * visibleItems)
            }, 300);
            
            $('.carousel-dot').removeClass('active');
            $(this).addClass('active');
        });
        
        // Update dots on scroll
        carousel.scroll(function() {
            updateDots();
        });
        
        // Touch and swipe support for mobile
        let touchStartX = 0;
        let touchEndX = 0;
        
        carousel.on('touchstart', function(e) {
            touchStartX = e.originalEvent.touches[0].clientX;
        });
        
        carousel.on('touchend', function(e) {
            touchEndX = e.originalEvent.changedTouches[0].clientX;
            handleSwipe();
        });
        
        function handleSwipe() {
            const minSwipeDistance = 50;
            
            if (touchStartX - touchEndX > minSwipeDistance) {
                $('.carousel-control.next').click();
            } else if (touchEndX - touchStartX > minSwipeDistance) {
                $('.carousel-control.prev').click();
            }
        }
        
        // Adjust visibility of controls based on scroll position
        function checkControls() {
            const scrollPosition = carousel.scrollLeft();
            const maxScroll = carousel[0].scrollWidth - carousel.width();
            
            if (scrollPosition <= 0) {
                $('.carousel-control.prev').fadeOut();
            } else {
                $('.carousel-control.prev').fadeIn();
            }
            
            if (scrollPosition >= maxScroll - 5) {
                $('.carousel-control.next').fadeOut();
            } else {
                $('.carousel-control.next').fadeIn();
            }
        }
        
        carousel.scroll(function() {
            checkControls();
        });
        
        // Initial check
        checkControls();
        
        // Responsive adjustments
        $(window).resize(function() {
            const newVisibleItems = Math.floor(carousel.width() / itemWidth);
            
            if (newVisibleItems !== visibleItems) {
                // Update dots if necessary
                const newPages = Math.ceil(items.length / newVisibleItems);
                
                if (newPages !== pages) {
                    dotsContainer.empty();
                    
                    for (let i = 0; i < newPages; i++) {
                        dotsContainer.append(`<div class="carousel-dot ${i === 0 ? 'active' : ''}"></div>`);
                    }
                }
                
                updateDots();
                checkControls();
            }
        });
    });
</script>

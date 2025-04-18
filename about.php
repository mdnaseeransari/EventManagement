<?php
include 'admin/db_connect.php';
?>

<style>
/* About Page Styles */
:root {
    --primary-gradient: linear-gradient(45deg, #4776E6, #8E54E9);
    --secondary-gradient: linear-gradient(135deg, #8E2DE2 0%, #4A00E0 100%);
    --third-gradient: linear-gradient(45deg, #654ea3, #eaafc8);
    --light-gradient: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    --glass-bg: rgba(255, 255, 255, 0.15);
    --glass-border: rgba(255, 255, 255, 0.18);
    --text-dark: #2d3748;
    --text-medium: #4a5568;
    --text-light: #718096;
}

/* Modern Glassmorphism Effects */
.glass-effect {
    background: var(--glass-bg);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    border: 1px solid var(--glass-border);
    border-radius: 15px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
}

/* About Header with Enhanced Parallax Effect */
.about-header {
    background: var(--secondary-gradient);
    padding: 140px 0 120px;
  position: relative;
    overflow: hidden;
    text-align: center;
}

.about-header:before {
    content: '';
  position: absolute;
    width: 100%;
    height: 100%;
  top: 0;
  left: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='white' fill-opacity='0.15' fill-rule='evenodd'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.7;
}

.animated-bg {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}

.animated-circle {
  position: absolute;
  border-radius: 50%;
    background: rgba(255, 255, 255, 0.12);
    box-shadow: 0 8px 32px rgba(31, 38, 135, 0.2);
    backdrop-filter: blur(4px);
    -webkit-backdrop-filter: blur(4px);
    border: 1px solid rgba(255, 255, 255, 0.18);
    animation: float 15s infinite ease-in-out;
}

.circle-1 {
    width: 180px;
    height: 180px;
  left: 10%;
    top: 20%;
    animation-delay: 0s;
}

.circle-2 {
    width: 100px;
    height: 100px;
    right: 15%;
    top: 30%;
    animation-delay: 2s;
}

.circle-3 {
    width: 120px;
    height: 120px;
    left: 20%;
    bottom: 10%;
    animation-delay: 1s;
}

.circle-4 {
    width: 80px;
    height: 80px;
    right: 25%;
    bottom: 20%;
    animation-delay: 3s;
}

.circle-5 {
    width: 60px;
    height: 60px;
    left: 40%;
    top: 15%;
    animation-delay: 2.5s;
}

@keyframes float {
    0% {
        transform: translateY(0) rotate(0deg) scale(1);
    }
    33% {
        transform: translateY(-20px) rotate(120deg) scale(1.05);
    }
    66% {
        transform: translateY(10px) rotate(240deg) scale(0.95);
    }
    100% {
        transform: translateY(0) rotate(360deg) scale(1);
    }
}

.about-title {
    color: white;
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 15px;
    position: relative;
    z-index: 10;
    text-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    letter-spacing: -0.5px;
}

.about-subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.3rem;
    max-width: 700px;
    margin: 0 auto;
    position: relative;
    z-index: 10;
    font-weight: 300;
    line-height: 1.6;
}

.header-badge {
    display: inline-block;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 8px 16px;
    border-radius: 50px;
    font-size: 0.9rem;
    font-weight: 500;
    color: white;
    margin-bottom: 20px;
    box-shadow: 0 8px 32px rgba(31, 38, 135, 0.2);
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* About Content Section */
.about-content {
    margin-top: 0;
    margin-bottom: 0;
    padding: 80px 0;
    position: relative;
    z-index: 20;
    background: white;
}

.about-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.08);
    padding: 60px !important;
    overflow: hidden;
    position: relative;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.about-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 25px 65px rgba(0, 0, 0, 0.12);
}

.about-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 5px;
    background: var(--secondary-gradient);
}

.about-card::after {
    content: '';
    position: absolute;
    bottom: 0;
    right: 0;
    width: 200px;
    height: 200px;
    background: var(--light-gradient);
    border-radius: 50%;
    opacity: 0.2;
    transform: translate(40%, 40%);
    z-index: -1;
    transition: all 0.4s ease;
}

.about-card:hover::after {
    transform: translate(35%, 35%) scale(1.2);
}

.about-card h2 {
    color: var(--text-dark);
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 30px;
    position: relative;
    display: inline-block;
}

.about-card h2::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 0;
    width: 50px;
    height: 3px;
    background: var(--primary-gradient);
}

.about-card p {
    color: var(--text-medium);
    font-size: 1.1rem;
    line-height: 1.8;
    margin-bottom: 25px;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 40px;
    margin-top: 60px;
}

.feature-item {
    background: var(--light-gradient);
    padding: 35px;
    border-radius: 15px;
    text-align: center;
    transition: all 0.3s ease;
}

.feature-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

.feature-icon {
    background: var(--primary-gradient);
    width: 70px;
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    margin: 0 auto 20px;
    color: white;
    font-size: 1.6rem;
    box-shadow: 0 10px 20px rgba(71, 118, 230, 0.3);
}

.feature-title {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: var(--text-dark);
}

.feature-text {
    color: var(--text-medium);
    font-size: 0.95rem;
    line-height: 1.6;
}

/* Team Section */
.team-section {
    padding: 100px 0;
    background: var(--light-gradient);
    position: relative;
    overflow: hidden;
}

.team-section::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5z' fill='%234776E6' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
    opacity: 0.8;
}

.section-title {
    text-align: center;
    margin-bottom: 70px;
    position: relative;
    z-index: 2;
}

.section-title h2 {
    font-size: 3rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 20px;
    position: relative;
    display: inline-block;
}

.section-title h2::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 80px;
    height: 3px;
    background: var(--primary-gradient);
}

.section-title p {
    font-size: 1.2rem;
    color: var(--text-medium);
    max-width: 700px;
    margin: 0 auto;
    margin-top: 20px;
}

.team-card {
    border-radius: 20px;
  overflow: hidden;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    height: 100%;
    background: white;
}

.team-card:hover {
    transform: translateY(-15px) scale(1.02);
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15) !important;
}

.team-img-container {
  position: relative;
  overflow: hidden;
    height: 320px;
}

.team-img-container img {
    transition: transform 0.6s ease;
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.team-card:hover .team-img-container img {
    transform: scale(1.08);
}

.team-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
    background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 60%);
  display: flex;
    align-items: flex-end;
  justify-content: center;
    padding-bottom: 20px;
  opacity: 0;
    transition: opacity 0.4s ease;
}

.team-card:hover .team-overlay {
  opacity: 1;
}

.team-social {
  display: flex;
    margin-bottom: 15px;
}

.social-icon {
    width: 40px;
    height: 40px;
    background: white;
    border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
    color: #4776E6;
    margin: 0 6px;
    transform: translateY(20px);
    opacity: 0;
  transition: all 0.3s ease;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.team-card:hover .social-icon {
    transform: translateY(0);
    opacity: 1;
}

.team-card:hover .social-icon:nth-child(1) {
    transition-delay: 0.1s;
}

.team-card:hover .social-icon:nth-child(2) {
    transition-delay: 0.2s;
}

.team-card:hover .social-icon:nth-child(3) {
    transition-delay: 0.3s;
}

.social-icon:hover {
    background: #4776E6;
  color: white;
    transform: translateY(-5px);
}

.team-card .card-body {
    padding: 25px 20px;
    text-align: center;
    position: relative;
}

.team-card .card-body::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 3px;
    background: var(--primary-gradient);
    border-radius: 3px;
}

.team-card .card-title {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-top: 5px;
}

.team-role {
    font-size: 0.95rem;
    color: var(--text-medium);
    display: inline-block;
    padding: 5px 15px;
    background: #f8f9fa;
    border-radius: 50px;
    margin-top: 8px;
}

/* Testimonials Section */
.testimonials-section {
    padding: 100px 0;
    background: white;
    position: relative;
    overflow: hidden;
}

.testimonials-section::before {
    content: '';
    position: absolute;
    top: 0;
    right: 0;
    width: 300px;
    height: 300px;
    background: var(--light-gradient);
    border-radius: 50%;
    opacity: 0.4;
    transform: translate(30%, -30%);
}

.testimonials-section::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 250px;
    height: 250px;
    background: var(--light-gradient);
    border-radius: 50%;
    opacity: 0.4;
    transform: translate(-30%, 30%);
}

.testimonial-slider {
    position: relative;
    max-width: 900px;
    margin: 0 auto;
    z-index: 2;
}

.testimonial-item {
    padding: 20px;
}

.testimonial-card {
    border-radius: 20px;
    padding: 40px !important;
    position: relative;
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    background: white;
}

.testimonial-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1) !important;
}

.testimonial-card::before {
    content: '\201C';
    position: absolute;
    top: 20px;
    left: 20px;
    font-size: 4rem;
    color: #f0f0f0;
    font-family: Georgia, serif;
    line-height: 1;
}

.testimonial-rating {
    margin-bottom: 25px;
    display: flex;
    justify-content: center;
}

.rating-star {
    color: #FFD700;
    font-size: 1.2rem;
    margin: 0 2px;
}

.testimonial-text {
    font-size: 1.15rem;
    line-height: 1.8;
    color: var(--text-medium);
  font-style: italic;
    text-align: center;
    margin-bottom: 30px;
}

.testimonial-author {
    display: flex;
    align-items: center;
    justify-content: center;
}

.testimonial-avatar {
    width: 65px;
    height: 65px;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid white;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
}

.testimonial-avatar img {
    width: 100%;
    height: 100%;
  object-fit: cover;
}

.testimonial-info {
    text-align: left;
    margin-left: 15px;
}

.testimonial-name {
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--text-dark);
    margin: 0;
}

.testimonial-position {
    font-size: 0.9rem;
    color: var(--text-light);
}

/* Stats Section */
.stats-section {
    padding: 80px 0;
    background: var(--light-gradient);
    color: var(--text-dark);
    position: relative;
    overflow: hidden;
}

.stats-section::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%234776E6' fill-opacity='0.08' fill-rule='evenodd'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.15;
}

.stat-item {
    text-align: center;
    position: relative;
    z-index: 2;
    background: white;
    border-radius: 20px;
    padding: 40px 20px;
    transition: all 0.3s ease;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

.stat-item:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
}

.stat-icon {
    font-size: 2.8rem;
    margin-bottom: 20px;
    display: inline-block;
    background: var(--light-gradient);
    width: 90px;
    height: 90px;
    line-height: 90px;
    border-radius: 50%;
    text-align: center;
    color: #4776E6;
}

.stat-count {
    font-size: 3.5rem;
    font-weight: 700;
  margin-bottom: 10px;
    line-height: 1;
    background: var(--primary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.stat-text {
    font-size: 1.2rem;
    font-weight: 500;
    color: var(--text-medium);
    text-transform: uppercase;
    letter-spacing: 1px;
}

@media (max-width: 768px) {
    .about-header {
        padding: 120px 0 80px;
    }
    
    .about-title {
        font-size: 3rem;
    }
    
    .about-content {
        padding: 50px 0;
    }
    
    .about-card {
        padding: 40px 30px !important;
    }
    
    .about-card h2 {
        font-size: 2rem;
    }
    
    .section-title h2 {
        font-size: 2.4rem;
    }
    
    .stat-count {
        font-size: 3rem;
    }
    
    .feature-grid {
        grid-template-columns: 1fr;
        gap: 25px;
        margin-top: 40px;
    }
    
    .feature-item {
        padding: 25px;
    }
    
    .team-img-container {
        height: 280px;
    }
    
    .testimonial-card {
        padding: 30px 25px !important;
  }
}
</style>

<!-- About Us Header with Enhanced Parallax Effect -->
<header class="about-header">
    <div class="animated-bg">
        <div class="animated-circle circle-1"></div>
        <div class="animated-circle circle-2"></div>
        <div class="animated-circle circle-3"></div>
        <div class="animated-circle circle-4"></div>
        <div class="animated-circle circle-5"></div>
    </div>
    <div class="container">
        <div class="header-badge" data-aos="fade-down">Discover Our Story</div>
        <h1 class="about-title" data-aos="fade-up">About Us</h1>
        <p class="about-subtitle" data-aos="fade-up" data-aos-delay="100">We're passionate about creating perfect events that leave lasting impressions and unforgettable memories</p>
    </div>
</header>

<!-- About Content Section -->
<section class="about-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto" data-aos="fade-up">
                <div class="about-card">
                    <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>
                    
                    <div class="feature-grid">
                        <div class="feature-item" data-aos="zoom-in" data-aos-delay="100">
                            <div class="feature-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h4 class="feature-title">Customer Focus</h4>
                            <p class="feature-text">We're committed to exceptional service and creating personalized experiences for every client.</p>
                        </div>
                        
                        <div class="feature-item" data-aos="zoom-in" data-aos-delay="200">
                            <div class="feature-icon">
                                <i class="fas fa-gem"></i>
                            </div>
                            <h4 class="feature-title">Premium Quality</h4>
                            <p class="feature-text">Our venues and services meet the highest standards of excellence and luxury.</p>
                        </div>
                        
                        <div class="feature-item" data-aos="zoom-in" data-aos-delay="300">
                            <div class="feature-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <h4 class="feature-title">Innovation</h4>
                            <p class="feature-text">We continuously evolve to bring fresh ideas and creative solutions to your events.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>What Our Clients Say</h2>
            <p>Hear from people who have experienced our exceptional venues and services</p>
        </div>
        
        <div class="row">
            <div class="col-lg-10 mx-auto" data-aos="fade-up">
                <div class="testimonial-slider" id="testimonialSlider">
                    <div class="testimonial-item">
                        <div class="card border-0 shadow-sm testimonial-card">
                            <div class="text-center mb-4">
                                <div class="testimonial-rating">
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                            <p class="testimonial-text">"We couldn't have asked for a better venue for our wedding. The staff was incredibly helpful and the venue itself was absolutely stunning. Our guests are still talking about how beautiful everything was!"</p>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar">
                                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Testimonial Avatar">
                                </div>
                                <div class="testimonial-info">
                                    <h5 class="testimonial-name">Sarah & David</h5>
                                    <p class="testimonial-position">Wedding Clients</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-item">
                        <div class="card border-0 shadow-sm testimonial-card">
                            <div class="text-center mb-4">
                                <div class="testimonial-rating">
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                </div>
                            </div>
                            <p class="testimonial-text">"Our company conference was a huge success thanks to the amazing venue and professional staff. The facilities were top-notch and the catering was exceptional. We will definitely be back next year!"</p>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar">
                                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Testimonial Avatar">
                                </div>
                                <div class="testimonial-info">
                                    <h5 class="testimonial-name">Robert Taylor</h5>
                                    <p class="testimonial-position">Corporate Client</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="testimonial-item">
                        <div class="card border-0 shadow-sm testimonial-card">
                            <div class="text-center mb-4">
                                <div class="testimonial-rating">
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star"></i></span>
                                    <span class="rating-star"><i class="fas fa-star-half-alt"></i></span>
                                </div>
                            </div>
                            <p class="testimonial-text">"The birthday party we hosted was perfect. The venue was beautiful, the staff was attentive, and they helped us with all the little details. Everyone had a wonderful time!"</p>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar">
                                    <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&auto=format&fit=crop&w=200&q=80" alt="Testimonial Avatar">
                                </div>
                                <div class="testimonial-info">
                                    <h5 class="testimonial-name">Lisa Anderson</h5>
                                    <p class="testimonial-position">Private Event Client</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0" data-aos="fade-up">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <!-- <div class="stat-count counter">1500</div> -->
                    <div class="stat-text">
                        <p>Tushar Ahmad</p>
                        <p>12325968</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <!-- <div class="stat-count counter">25</div> -->
                    <div class="stat-text">
                        <p>Hemant Srivastava</p>
                        <p>12305227</p>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <!-- <div class="stat-count counter">3000</div> -->
                    <div class="stat-text">
                        <p>Siddhant Maurya</p>
                        <p>12308604</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-smile"></i>
                    </div>
                    <!-- <div class="stat-count counter">15</div> -->
                    <div class="stat-text">
                        <p>Naseer Ansari</p>
                        <p>12314426</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Initialize AOS
  AOS.init({
    duration: 800,
    easing: 'ease-in-out',
        once: true,
        offset: 100
    });
    
    // Enhanced Counter animation
    $(document).ready(function() {
        // Initialize counters with intersection observer
        const counterElements = document.querySelectorAll('.counter');
        
        const options = {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        };
        
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const $counter = $(entry.target);
                    const countTo = $counter.text();
                    
                    $({ countNum: 0 }).animate({
                        countNum: countTo
                    }, {
                        duration: 2500,
                        easing: 'swing',
                        step: function() {
                            $counter.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $counter.text(this.countNum).append('<span>+</span>');
                        }
                    });
                    
                    observer.unobserve(entry.target);
                }
            });
        }, options);
        
        counterElements.forEach(counter => {
            observer.observe(counter);
        });
        
        // Initialize testimonial slider if slick carousel is available
        if (typeof $.fn.slick !== 'undefined') {
            $('#testimonialSlider').slick({
    dots: true,
                arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
                speed: 700,
                fade: true,
                cssEase: 'linear',
                adaptiveHeight: true
  });
        }
});
</script>
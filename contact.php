<?php
include 'admin/db_connect.php';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data and sanitize
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    // Create contact_messages table if it doesn't exist
    $create_table = "CREATE TABLE IF NOT EXISTS `contact_messages` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) NOT NULL,
        `email` varchar(100) NOT NULL,
        `subject` varchar(200) NOT NULL,
        `message` text NOT NULL,
        `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unread, 1=read',
        `date_created` datetime NOT NULL DEFAULT current_timestamp(),
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
    
    $conn->query($create_table);
    
    // Insert into database
    $sql = "INSERT INTO contact_messages (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Thank you for your message! We will get back to you soon.');</script>";
    } else {
        echo "<script>alert('Error submitting your message. Please try again.');</script>";
    }
}
?>

<style>
/* Contact Page Styles */

.contact-header {
    background: linear-gradient(135deg, #6dc0ff 0%, #8c52ff 100%);
    padding: 120px 0 100px;
    position: relative;
    overflow: hidden;
    text-align: center;
}

.contact-header:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='white' fill-opacity='0.15' fill-rule='evenodd'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.7;
}

.contact-bubbles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.bubble {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    animation: float 15s infinite ease-in-out;
}

.bubble:nth-child(1) {
    width: 80px;
    height: 80px;
    left: 10%;
    top: 40%;
    animation-delay: 0s;
}

.bubble:nth-child(2) {
    width: 40px;
    height: 40px;
    left: 20%;
    top: 20%;
    animation-delay: 2s;
}

.bubble:nth-child(3) {
    width: 100px;
    height: 100px;
    right: 15%;
    top: 30%;
    animation-delay: 1s;
}

.bubble:nth-child(4) {
    width: 60px;
    height: 60px;
    right: 10%;
    top: 60%;
    animation-delay: 3s;
}

.bubble:nth-child(5) {
    width: 120px;
    height: 120px;
    bottom: -30px;
    left: 30%;
    animation-delay: 4s;
}

@keyframes float {
    0% {
        transform: translateY(0) rotate(0deg);
    }
    50% {
        transform: translateY(-20px) rotate(180deg);
    }
    100% {
        transform: translateY(0) rotate(360deg);
    }
}

.contact-title {
    color: white;
    font-size: 3.5rem;
    font-weight: 800;
    margin-bottom: 15px;
    position: relative;
    z-index: 10;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.contact-subtitle {
    color: rgba(255, 255, 255, 0.9);
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto;
    position: relative;
    z-index: 10;
}

.contact-container {
    margin-top: -60px;
    margin-bottom: 80px;
    position: relative;
    z-index: 20;
    background-color: white;
    padding: 100px;
}

.contact-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    height: 100%;
}

.contact-form-section {
    padding: 40px;
}

.contact-info-section {
    background: linear-gradient(135deg, #3a7bd5, #00d2ff);
    padding: 40px;
    color: white;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.contact-info-section:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5z' fill='white' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
    opacity: 0.3;
}

.contact-info-section .info-content {
    position: relative;
    z-index: 5;
}

.section-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 30px;
    position: relative;
    display: inline-block;
}

.section-title:after {
    content: '';
    position: absolute;
    width: 50px;
    height: 3px;
    bottom: -10px;
    left: 0;
    background: linear-gradient(45deg, #3a7bd5, #00d2ff);
    border-radius: 3px;
}

.contact-info-section .section-title:after {
    background: white;
}

.contact-info-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 25px;
}

.contact-info-icon {
    font-size: 1.5rem;
    margin-right: 15px;
    min-width: 30px;
    display: flex;
    justify-content: center;
}

.contact-info-text h5 {
    font-size: 1.1rem;
    margin-bottom: 5px;
    font-weight: 600;
}

.contact-social {
    margin-top: 40px;
}

.contact-social h5 {
    margin-bottom: 15px;
    font-size: 1.1rem;
    font-weight: 600;
}

.social-icons {
    display: flex;
}

.social-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    margin-right: 10px;
    transition: all 0.3s ease;
}

.social-icon:hover {
    background: white;
    color: #3a7bd5;
    transform: translateY(-5px);
}

.form-group {
    margin-bottom: 25px;
}

.form-control {
    height: 50px;
    border-radius: 8px;
    border: 1px solid #e1e1e1;
    padding: 10px 15px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #3a7bd5;
    box-shadow: 0 0 0 3px rgba(58, 123, 213, 0.1);
}

textarea.form-control {
    height: 120px;
    resize: none;
}

.btn-contact {
    background: linear-gradient(45deg, #3a7bd5, #00d2ff);
    color: white;
    border: none;
    border-radius: 50px;
    padding: 12px 30px;
    font-weight: 600;
    letter-spacing: 0.5px;
    box-shadow: 0 5px 15px rgba(58, 123, 213, 0.3);
    transition: all 0.3s ease;
}

.btn-contact:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(58, 123, 213, 0.4);
}
.map-container {
    height: 100%;
    width: 100%;
}

/* Enhanced FAQ Section Styles */
.faq-section {
    padding: 70px 0 90px;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    position: relative;
}

.faq-section:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3z' fill='%233a7bd5' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
    opacity: 0.5;
    z-index: 0;
}

.faq-container {
    max-width: 850px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
}

.faq-title {
    text-align: center;
    margin-bottom: 50px;
}

.faq-title h2 {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 15px;
    background: linear-gradient(135deg, #3a7bd5, #00d2ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: inline-block;
    position: relative;
}

.faq-title h2:after {
    content: '';
    position: absolute;
    width: 70px;
    height: 4px;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    background: linear-gradient(90deg, #3a7bd5, #00d2ff);
    border-radius: 2px;
}

.faq-title p {
    color: #6c757d;
    font-size: 1.2rem;
    max-width: 600px;
    margin: 0 auto;
}

.custom-accordion .accordion-item {
    margin-bottom: 16px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
    border: none;
    transition: all 0.3s ease;
}

.custom-accordion .accordion-item:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
}

.custom-accordion .accordion-header {
    background: white;
}

.custom-accordion .accordion-button {
    padding: 22px 30px;
    font-weight: 600;
    font-size: 1.1rem;
    color: #2c3e50;
    background: white;
    border: none;
    box-shadow: none;
    transition: all 0.3s ease;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Hide the default Bootstrap accordion arrow */
.custom-accordion .accordion-button::after {
    display: none !important;
}

.custom-accordion .accordion-button:not(.collapsed) {
    color: #3a7bd5;
    background: white;
    box-shadow: none;
}

.custom-accordion .accordion-button:focus {
    box-shadow: none;
    border-color: transparent;
}

.custom-accordion .accordion-body {
    padding: 5px 30px 25px;
    color: #6c757d;
    font-size: 1.05rem;
    line-height: 1.6;
    background-color: white;
}

.faq-question {
    display: flex;
    align-items: center;
    width: 100%;
}

.faq-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(58, 123, 213, 0.1), rgba(0, 210, 255, 0.1));
    margin-right: 15px;
    color: #3a7bd5;
    transition: all 0.3s ease;
}

.accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #3a7bd5, #00d2ff);
    color: white;
}

/* Custom arrow styling */
.custom-arrow {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 24px;
    height: 24px;
    border-radius: 50%;
    background: #f0f4f8;
    margin-left: 15px;
    color: #6c757d;
    transition: all 0.3s ease;
}

.custom-arrow i {
    font-size: 12px;
    transition: transform 0.3s ease;
}

.accordion-button:not(.collapsed) .custom-arrow {
    background: linear-gradient(135deg, #3a7bd5, #00d2ff);
    color: white;
}

.accordion-button:not(.collapsed) .custom-arrow i {
    transform: rotate(180deg);
}

/* Add a nice hover effect on the accordions */
.custom-accordion .accordion-item:nth-child(1) .faq-icon {
    color: #e74c3c;
    background: linear-gradient(135deg, rgba(231, 76, 60, 0.1), rgba(255, 130, 114, 0.1));
}

.custom-accordion .accordion-item:nth-child(1) .accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #e74c3c, #ff8272);
    color: white;
}

.custom-accordion .accordion-item:nth-child(1) .accordion-button:not(.collapsed) .custom-arrow {
    background: linear-gradient(135deg, #e74c3c, #ff8272);
}

.custom-accordion .accordion-item:nth-child(2) .faq-icon {
    color: #2ecc71;
    background: linear-gradient(135deg, rgba(46, 204, 113, 0.1), rgba(46, 204, 113, 0.1));
}

.custom-accordion .accordion-item:nth-child(2) .accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #2ecc71, #27ae60);
    color: white;
}

.custom-accordion .accordion-item:nth-child(2) .accordion-button:not(.collapsed) .custom-arrow {
    background: linear-gradient(135deg, #2ecc71, #27ae60);
}

.custom-accordion .accordion-item:nth-child(3) .faq-icon {
    color: #f39c12;
    background: linear-gradient(135deg, rgba(243, 156, 18, 0.1), rgba(255, 193, 7, 0.1));
}

.custom-accordion .accordion-item:nth-child(3) .accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #f39c12, #ffc107);
    color: white;
}

.custom-accordion .accordion-item:nth-child(3) .accordion-button:not(.collapsed) .custom-arrow {
    background: linear-gradient(135deg, #f39c12, #ffc107);
}

.custom-accordion .accordion-item:nth-child(4) .faq-icon {
    color: #9b59b6;
    background: linear-gradient(135deg, rgba(155, 89, 182, 0.1), rgba(155, 89, 182, 0.1));
}

.custom-accordion .accordion-item:nth-child(4) .accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #9b59b6, #8e44ad);
    color: white;
}

.custom-accordion .accordion-item:nth-child(4) .accordion-button:not(.collapsed) .custom-arrow {
    background: linear-gradient(135deg, #9b59b6, #8e44ad);
}

.custom-accordion .accordion-item:nth-child(5) .faq-icon {
    color: #3498db;
    background: linear-gradient(135deg, rgba(52, 152, 219, 0.1), rgba(52, 152, 219, 0.1));
}

.custom-accordion .accordion-item:nth-child(5) .accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
}

.custom-accordion .accordion-item:nth-child(5) .accordion-button:not(.collapsed) .custom-arrow {
    background: linear-gradient(135deg, #3498db, #2980b9);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .faq-section {
        padding: 50px 0 70px;
    }
    
    .faq-title h2 {
        font-size: 2rem;
    }
    
    .custom-accordion .accordion-button {
        padding: 18px 20px;
        font-size: 1rem;
    }
    
    .custom-accordion .accordion-body {
        padding: 5px 20px 20px;
    }
    
    .faq-icon {
        min-width: 32px;
        height: 32px;
        margin-right: 10px;
    }
}
/* Add a nice hover effect on the accordions */
.custom-accordion .accordion-item:nth-child(1) .faq-icon {
    color: #e74c3c;
    background: linear-gradient(135deg, rgba(231, 76, 60, 0.1), rgba(255, 130, 114, 0.1));
}

.custom-accordion .accordion-item:nth-child(1) .accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #e74c3c, #ff8272);
    color: white;
}

.custom-accordion .accordion-item:nth-child(2) .faq-icon {
    color: #2ecc71;
    background: linear-gradient(135deg, rgba(46, 204, 113, 0.1), rgba(46, 204, 113, 0.1));
}

.custom-accordion .accordion-item:nth-child(2) .accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #2ecc71, #27ae60);
    color: white;
}

.custom-accordion .accordion-item:nth-child(3) .faq-icon {
    color: #f39c12;
    background: linear-gradient(135deg, rgba(243, 156, 18, 0.1), rgba(255, 193, 7, 0.1));
}

.custom-accordion .accordion-item:nth-child(3) .accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #f39c12, #ffc107);
    color: white;
}

.custom-accordion .accordion-item:nth-child(4) .faq-icon {
    color: #9b59b6;
    background: linear-gradient(135deg, rgba(155, 89, 182, 0.1), rgba(155, 89, 182, 0.1));
}

.custom-accordion .accordion-item:nth-child(4) .accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #9b59b6, #8e44ad);
    color: white;
}

.custom-accordion .accordion-item:nth-child(5) .faq-icon {
    color: #3498db;
    background: linear-gradient(135deg, rgba(52, 152, 219, 0.1), rgba(52, 152, 219, 0.1));
}

.custom-accordion .accordion-item:nth-child(5) .accordion-button:not(.collapsed) .faq-icon {
    background: linear-gradient(135deg, #3498db, #2980b9);
    color: white;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .faq-section {
        padding: 50px 0 70px;
    }
    
    .faq-title h2 {
        font-size: 2rem;
    }
    
    .custom-accordion .accordion-button {
        padding: 18px 20px;
        font-size: 1rem;
    }
    
    .custom-accordion .accordion-body {
        padding: 5px 20px 20px;
    }
    
    .faq-icon {
        min-width: 32px;
        height: 32px;
        margin-right: 10px;
    }
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .contact-header {
        padding: 100px 0 80px;
    }
    
    .contact-title {
        font-size: 2.5rem;
    }
    
    .contact-container {
        margin-top: -40px;
    }
    
    .contact-form-section,
    .contact-info-section {
        padding: 30px;
    }
    
    .map-section {
        height: 300px;
        margin-bottom: 60px;
    }
    
    .faq-section {
        padding: 40px 0 60px;
    }
    
    .faq-title h2 {
        font-size: 2rem;
    }
}
</style>

<!-- Contact Header -->
<header class="contact-header">
    <div class="contact-bubbles">
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
        <div class="bubble"></div>
    </div>
    <div class="container">
        <h1 class="contact-title" data-aos="fade-up">Get In Touch</h1>
        <p class="contact-subtitle" data-aos="fade-up" data-aos-delay="100">Have questions about our venues or event planning? We'd love to hear from you!</p>
    </div>
</header>

<!-- Contact Form and Info Section -->
<section class="contact-container" style="margin-top: 80px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="row g-0">
                        <div class="col-lg-8">
                            <div class="contact-form-section">
                                <h2 class="section-title">Send us a Message</h2>
                                <form id="contactForm" method="POST" action="">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" id="message" name="message" placeholder="Your Message" required></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-contact">Send Message</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="contact-info-section">
                                <div class="info-content">
                                    <h2 class="section-title">Contact Information</h2>
                                    <div class="contact-info-item">
                                        <div class="contact-info-icon">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div class="contact-info-text">
                                            <h5>Our Location</h5>
                                            <p>Lovely Professional University</p>
                                        </div>
                                    </div>
                                    <div class="contact-info-item">
                                        <div class="contact-info-icon">
                                            <i class="fas fa-phone-alt"></i>
                                        </div>
                                        <div class="contact-info-text">
                                            <h5>Phone Number</h5>
                                            <p>+91 9948384XXX</p>
                                        </div>
                                    </div>
                                    <div class="contact-info-item">
                                        <div class="contact-info-icon">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div class="contact-info-text">
                                            <h5>Email Address</h5>
                                            <p>lpu@com</p>
                                        </div>
                                    </div>
                                    <div class="contact-info-item">
                                        <div class="contact-info-icon">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div class="contact-info-text">
                                            <h5>Office Hours</h5>
                                            <p>Monday - Friday: 9AM - 5PM<br>Saturday: 10AM - 2PM</p>
                                        </div>
                                    </div>
                                    <div class="contact-social">
                                        <h5>Follow Us</h5>
                                        <div class="social-icons">
                                            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                                            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                                            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                                            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ Section -->
<section class="faq-section">
    <div class="container faq-container">
        <div class="faq-title" data-aos="fade-up">
            <h2>Frequently Asked Questions</h2>
            <p>Find answers to common questions about our venues and services</p>
        </div>
        
        <div class="accordion custom-accordion" id="faqAccordion" data-aos="fade-up" data-aos-delay="100">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <div class="faq-question">
                            <span class="faq-icon"><i class="fas fa-calendar-alt"></i></span>
                            <span>How far in advance should I book a venue?</span>
                        </div>
                        <div class="custom-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        We recommend booking your venue at least 6-8 months in advance for large events like weddings or corporate functions. For smaller gatherings, 3-4 months is usually sufficient, but popular dates can fill up quickly. Contact us as early as possible to ensure you get your preferred date and venue.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <div class="faq-question">
                            <span class="faq-icon"><i class="fas fa-dollar-sign"></i></span>
                            <span>What is included in the venue booking fee?</span>
                        </div>
                        <div class="custom-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Our standard venue booking includes the space rental for the agreed-upon time, basic setup and cleanup, tables and chairs, and access to restroom facilities. Additional services such as catering, decorations, audio-visual equipment, and extended hours are available at an extra cost. Each venue has different offerings, so please contact us for specific details.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <div class="faq-question">
                            <span class="faq-icon"><i class="fas fa-building"></i></span>
                            <span>Can I visit the venue before booking?</span>
                        </div>
                        <div class="custom-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Absolutely! We encourage you to schedule a tour of our venues before making a booking. This allows you to see the space in person, ask questions, and better envision your event. Tours are available by appointment during our regular business hours. Contact us to schedule a visit.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <div class="faq-question">
                            <span class="faq-icon"><i class="fas fa-ban"></i></span>
                            <span>What is your cancellation policy?</span>
                        </div>
                        <div class="custom-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Our cancellation policy varies depending on how far in advance you cancel. Cancellations made 90+ days before the event date receive a 75% refund, 60-89 days receive a 50% refund, and 30-59 days receive a 25% refund. Cancellations made less than 30 days before the event are non-refundable. We also offer rescheduling options subject to availability.
                    </div>
                </div>
            </div>
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        <div class="faq-question">
                            <span class="faq-icon"><i class="fas fa-utensils"></i></span>
                            <span>Do you provide catering services?</span>
                        </div>
                        <div class="custom-arrow">
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </button>
                </h2>
                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Yes, we offer premium catering services through our trusted partners. You can choose from a variety of menu options ranging from casual buffets to formal multi-course dining experiences. We can accommodate dietary restrictions and preferences with advance notice. You're also welcome to work with outside caterers for an additional fee, subject to our approval.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Make sure Bootstrap JS is included, update this line to match your Bootstrap version -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // AOS initialization
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
    
    // Initialize Bootstrap popper and tooltip (optional but recommended)
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>
<?php 
include 'admin/db_connect.php'; 
?>
<style>
html, body, #page-main, section {
    background: white !important;
}
:root {
    --primary-color: #3a7bd5;
    --primary-gradient: linear-gradient(45deg, #3a7bd5, #00d2ff);
    --secondary-color: #ff7e5f;
    --secondary-gradient: linear-gradient(45deg, #ff7e5f, #feb47b);
    --text-dark: #333;
    --text-medium: #555;
    --text-light: #777;
    --background-light: #fff;
    --border-radius-sm: 8px;
    --border-radius-md: 12px;
    --border-radius-lg: 50px;
    --spacing-xs: 8px;
    --spacing-sm: 15px;
    --spacing-md: 20px;
    --spacing-lg: 30px;
    --shadow-sm: 0 5px 15px rgba(0,0,0,0.05);
    --shadow-md: 0 10px 30px rgba(0,0,0,0.1);
    --shadow-lg: 0 15px 40px rgba(0,0,0,0.2);
    --transition-base: all 0.3s ease;
}
  
/* Modern Card Design */
.venue-card {
    border: none;
    border-radius: var(--border-radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: var(--transition-base);
    margin-bottom: var(--spacing-lg);
    background: var(--background-light);
    height: 100%;
}

.venue-card:hover {
    transform: translateY(-10px);
    box-shadow: var(--shadow-lg);
}

.venue-image-container {
    height: 300px;
    overflow: hidden;
    position: relative;
}

.venue-card .carousel-item img {
    height: 300px;
    object-fit: cover;
    width: 100%;
    transition: transform 0.5s ease;
}

.venue-card:hover .carousel-item img {
    transform: scale(1.05);
}

.venue-content {
    padding: var(--spacing-md);
    background: var(--background-light);
}

.venue-title {
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: var(--spacing-xs);
    color: var(--text-dark);
    line-height: 1.2;
}

.venue-address {
    color: var(--text-light);
    font-size: 0.9rem;
    margin-bottom: var(--spacing-sm);
    display: flex;
    align-items: center;
}

.venue-address i {
    margin-right: 5px;
    color: var(--secondary-color);
}

.venue-description {
    color: var(--text-medium);
    margin-bottom: var(--spacing-md);
    line-height: 1.5;
    max-height: 80px;
    overflow: hidden;
}

.venue-rate {
    display: inline-block;
    background: var(--secondary-gradient);
    color: white;
    padding: 8px var(--spacing-sm);
    border-radius: var(--border-radius-lg);
    font-weight: 600;
    margin-bottom: var(--spacing-md);
    box-shadow: 0 4px 15px rgba(255, 126, 95, 0.2);
}

.venue-rate i {
    margin-right: 5px;
}

.btn-book {
    background: var(--primary-gradient);
    border: none;
    border-radius: var(--border-radius-lg);
    color: white;
    padding: 12px var(--spacing-lg);
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: var(--transition-base);
    box-shadow: 0 4px 15px rgba(58, 123, 213, 0.2);
    text-transform: uppercase;
    font-size: 0.9rem;
}

.btn-book:hover {
    background: linear-gradient(45deg, #00d2ff, #3a7bd5);
    transform: translateY(-3px);
    box-shadow: 0 7px 25px rgba(58, 123, 213, 0.3);
}

.carousel-control-next, .carousel-control-prev {
    width: 40px;
    height: 40px;
    background: rgba(255,255,255,0.9);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0.7;
    margin: 0 var(--spacing-sm);
}

.carousel-control-next {
    right: 5px;
}

.carousel-control-prev {
    left: 5px;
}

.carousel-control-next-icon, .carousel-control-prev-icon {
    width: 20px;
    height: 20px;
}

.carousel-control-prev-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
}

.carousel-control-next-icon {
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='%23000' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
}

.carousel-indicators {
    bottom: 10px;
}

.carousel-indicators li {
    background-color: rgba(0,0,0,0.5);
    width: 8px;
    height: 8px;
    border-radius: 50%;
    margin: 0 4px;
}

.carousel-indicators li.active {
    background-color: var(--primary-color);
}

/* Page Header */
.venues-header {
    background: linear-gradient(120deg, #6dc0ff, #8c52ff);
    padding: 80px 0;
    text-align: center;
    position: relative;
    overflow: hidden;
    margin-bottom: 60px;
    position: relative;
}

.venues-header:before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    background-image: 
        radial-gradient(circle at 15% 25%, rgba(255, 255, 255, 0.4), transparent 25%),
        radial-gradient(circle at 85% 75%, rgba(255, 255, 255, 0.4), transparent 25%),
        url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='white' fill-opacity='0.15' fill-rule='evenodd'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/svg%3E");
    opacity: 0.7;
}

/* Add animated background elements */
.venues-header:after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(108, 0, 255, 0.05) 0%, rgba(255, 255, 255, 0.1) 100%);
    z-index: 1;
}

/* Animated Elements */
.venue-shapes {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 1;
}

.venue-shape {
    position: absolute;
    background: rgba(255, 255, 255, 0.15);
    border-radius: 50%;
    animation: float-shape 15s infinite ease-in-out;
}

.venue-shape:nth-child(1) {
    width: 130px;
    height: 130px;
    bottom: -50px;
    left: 10%;
    animation-delay: 0s;
    background: rgba(255, 255, 255, 0.1);
}

.venue-shape:nth-child(2) {
    width: 80px;
    height: 80px;
    top: 20%;
    right: 10%;
    animation-delay: 2s;
    animation-duration: 17s;
    background: rgba(255, 255, 255, 0.1);
}

.venue-shape:nth-child(3) {
    width: 60px;
    height: 60px;
    bottom: 30%;
    right: 20%;
    animation-delay: 4s;
    animation-duration: 16s;
    background: rgba(255, 255, 255, 0.15);
}

.venue-shape:nth-child(4) {
    width: 100px;
    height: 100px;
    top: 10%;
    left: 20%;
    animation-delay: 6s;
    animation-duration: 18s;
    background: rgba(255, 255, 255, 0.1);
}

.venue-shape:nth-child(5) {
    width: 150px;
    height: 150px;
    bottom: -70px;
    right: 5%;
    animation-delay: 3s;
    animation-duration: 19s;
    background: rgba(255, 255, 255, 0.05);
}

@keyframes float-shape {
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

.venues-header .container {
    position: relative;
    z-index: 5;
}

.venues-title {
    color: white;
    font-size: 3.5rem;
    font-weight: 800;
    margin-top: 100px;
    margin-bottom: var(--spacing-sm);
    position: relative;
    line-height: 1.2;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    letter-spacing: -0.5px;
}

.venues-subtitle {
    color: white;
    font-size: 1.2rem;
    max-width: 700px;
    margin: 0 auto;
    line-height: 1.5;
    text-shadow: 0 1px 5px rgba(0, 0, 0, 0.3);
    opacity: 0.9;
}

/* Search and Filter */
.filter-container {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 100;
    margin: -30px auto 40px;
    padding: 0;
    max-width: 1000px;
    overflow: hidden;
}

.filter-form {
    display: flex;
    width: 100%;
}

.filter-cell {
    height: 60px;
    line-height: 60px;
}

.filter-cell.search {
    width: 70%;
    position: relative;
    border-right: 1px solid rgba(0, 0, 0, 0.05);
}

.filter-cell.sort {
    width: 30%;
}

.search-box {
    display: flex;
    align-items: center;
    height: 100%;
    padding-left: 20px;
}

.search-box i {
    color: var(--primary-color);
    font-size: 16px;
    margin-right: 12px;
}

.search-box input {
    width: 100%;
    height: 60px;
    border: none;
    background: transparent;
    padding: 0 20px 0 0;
    font-size: 15px;
    color: var(--text-dark);
}

.search-box input:focus {
    outline: none;
}

.sort-box {
    height: 100%;
    padding: 0 15px;
    display: flex;
    align-items: center;
}

#venue-sort {
    width: 100%;
    height: 60px;
    border: none;
    background: transparent;
    font-size: 15px;
    color: var(--text-dark);
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%233a7bd5' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 5px center;
    padding-right: 25px;
}

#venue-sort:focus {
    outline: none;
}

@media (max-width: 768px) {
    .filter-form {
        flex-direction: column;
    }
    
    .filter-cell {
        width: 100% !important;
        height: 50px;
        line-height: 50px;
    }
    
    .filter-cell.search {
        border-right: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .search-box input,
    #venue-sort {
        height: 50px;
        font-size: 14px;
    }
}

/* Container backgrounds and design */
.venue-section-bg {
    background: white;
    border-radius: 25px;
    padding: 40px 30px;
    margin-top: 20px;
    margin-bottom: 40px;
    position: relative;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

.venue-section-bg::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5z' fill='%233a7bd5' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
    opacity: 0.8;
}

.venue-section-title {
    color: var(--text-dark);
    font-size: 1.8rem;
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
    position: relative;
    display: inline-block;
    padding-bottom: 15px;
}

.venue-section-title::after {
    content: '';
    position: absolute;
    width: 60px;
    height: 3px;
    background: var(--primary-gradient);
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 3px;
}

/* Venue Counter */
.venue-counter {
    margin-bottom: var(--spacing-lg);
    color: #fff;
    font-weight: 600;
    font-size: 1.2rem;
    background: var(--primary-gradient);
    display: table;
    padding: 12px 30px;
    border-radius: var(--border-radius-lg);
    box-shadow: 0 8px 20px rgba(58, 123, 213, 0.25);
    position: relative;
    overflow: hidden;
    text-align: center;
    margin-left: auto;
    margin-right: auto;
    z-index: 2;
    backdrop-filter: blur(5px);
    -webkit-backdrop-filter: blur(5px);
}

.venue-counter::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(120deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0) 50%);
    z-index: -1;
}

.venue-counter span {
    font-weight: 800;
    font-size: 1.4rem;
    color: #fff;
    position: relative;
    z-index: 2;
    margin-right: 5px;
}

.venue-counter::after {
    content: '';
    position: absolute;
    width: 30px;
    height: 100%;
    top: 0;
    left: -100px;
    background: rgba(255, 255, 255, 0.3);
    transform: skewX(-30deg);
    animation: shine 4s infinite;
}

/* Venue Grid Section */
.venue-grid-container {
    position: relative;
    z-index: 1;
}

/* Card animations */
.venue-card {
    animation: fadeIn 0.5s ease-in-out;
    transform-origin: center;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@media (max-width: 768px) {
    .venue-section-bg {
        padding: 30px 15px;
        border-radius: 15px;
    }
    
    .venue-section-title {
        font-size: 1.5rem;
        margin-bottom: 20px;
    }
}

/* No venues message */
.no-venues {
    text-align: center;
    padding: 50px 0;
    color: var(--text-light);
}

.no-venues i {
    color: var(--secondary-color);
    margin-bottom: var(--spacing-sm);
}

.no-venues h3 {
    font-weight: 600;
    margin-bottom: var(--spacing-sm);
    color: var(--text-dark);
}

/* Loading Animation */
.loading-spinner {
    display: none;
    text-align: center;
    padding: var(--spacing-lg) 0;
}

.loader {
    border: 5px solid #f3f3f3;
    border-top: 5px solid var(--primary-color);
    border-radius: 50%;
    width: 40px;
    height: 40px;
    animation: spin 1s linear infinite;
    margin: 0 auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Container spacing */
.venue-row {
    margin-left: -15px;
    margin-right: -15px;
}

.venue-col {
    padding-left: 15px;
    padding-right: 15px;
    margin-bottom: var(--spacing-lg);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .venues-header {
        padding: 60px 0;
        margin-bottom: 40px;
    }
    
    .venues-title {
        font-size: 2.5rem;
        margin-top: 60px;
    }
    
    .venues-subtitle {
        font-size: 1rem;
    }
    
    .venue-image-container {
        height: 220px;
    }
    
    .venue-card .carousel-item img {
        height: 220px;
    }
    
    .filter-container {
        width: 92%;
        margin-top: -25px;
    }
    
    .search-box-container {
        flex: 1 1 100%;
        border-right: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    
    .sort-box-container {
        flex: 1 1 100%;
    }
    
    .search-box input,
    #venue-sort {
        height: 54px;
        font-size: 0.95rem;
    }
    
    .venue-title {
        font-size: 1.5rem;
    }
    
    .btn-book {
        padding: 10px 20px;
    }
    
    .venue-counter {
        font-size: 1.1rem;
        padding: 10px 20px;
    }
    
    .venue-counter span {
        font-size: 1.2rem;
    }
}
</style>

<!-- Modern Header Section -->
<div class="venues-header">
    <div class="venue-shapes">
        <div class="venue-shape"></div>
        <div class="venue-shape"></div>
        <div class="venue-shape"></div>
        <div class="venue-shape"></div>
        <div class="venue-shape"></div>
    </div>
    <div class="container">
        <h1 class="venues-title" data-aos="fade-up">Discover Perfect Venues</h1>
        <p class="venues-subtitle" data-aos="fade-up" data-aos-delay="100">Browse our exclusive collection of premium venues to host your memorable events</p>
    </div>
</div>

<div class="container">
    <!-- Search and Filter Box -->
    <div class="filter-container" data-aos="fade-up" data-aos-delay="200">
        <div class="filter-form">
            <div class="filter-cell search">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" id="venue-search" placeholder="Search venues by name or location...">
                </div>
            </div>
            <div class="filter-cell sort">
                <div class="sort-box">
                    <select id="venue-sort">
                        <option value="default">Sort venues by</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="name">Name: A to Z</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    
    <div class="venue-section-bg">
        <h2 class="venue-section-title">Our Available Venues</h2>
        
        <!-- Venue Counter -->
        <div class="venue-counter" data-aos="zoom-in" data-aos-delay="300">
            <span id="venue-count">0</span> venues available for booking
        </div>
        
        <!-- Venues Grid -->
        <div class="venue-grid-container">
            <div class="row venue-row" id="venues-container" data-aos="fade-up" data-aos-delay="400">
                <?php
                $venue = $conn->query("SELECT * from venue order by rand()");
                if($venue->num_rows > 0):
                while($row = $venue->fetch_assoc()):
                ?>
                <div class="col-lg-6 col-md-6 venue-col venue-item">
                    <div class="venue-card">
                        <div class="venue-image-container">
                            <div id="carousel_<?php echo $row['id'] ?>" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <?php 
                                        $images = array();
                                        $fpath = 'admin/assets/uploads/venue_'.$row['id'];
                                        $images= scandir($fpath);
                                        $i = 0;
                                        foreach($images as $k => $v):
                                            if(!in_array($v,array('.','..'))):
                                    ?>
                                    <li data-target="#carousel_<?php echo $row['id'] ?>" data-slide-to="<?php echo $i ?>" class="<?php echo ($i == 0) ? 'active' : '' ?>"></li>
                                    <?php 
                                                $i++;
                                            endif;
                                        endforeach;
                                    ?>
                                </ol>
                                <div class="carousel-inner">
                                    <?php 
                                        $i = 0;
                                        foreach($images as $k => $v):
                                            if(!in_array($v,array('.','..'))):
                                                $active = ($i == 0) ? 'active' : '';
                                    ?>
                                         <div class="carousel-item <?php echo $active ?>">
                                        <img class="d-block w-100 venue-image" src="<?php echo $fpath.'/'.$v ?>" alt="<?php echo $row['venue'] ?>">
                                        </div>
                                    <?php
                                            $i++;
                                            endif;
                                        endforeach;
                                    ?>
                                </div>
                                <a class="carousel-control-prev" href="#carousel_<?php echo $row['id'] ?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                <a class="carousel-control-next" href="#carousel_<?php echo $row['id'] ?>" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                        </div>
                                    </div>
                        <div class="venue-content">
                            <h3 class="venue-title"><?php echo ucwords($row['venue']) ?></h3>
                            <div class="venue-address"><i class="fas fa-map-marker-alt"></i> <?php echo $row['address'] ?></div>
                            <div class="venue-description"><?php echo ucwords($row['description']) ?></div>
                            <div class="venue-rate"><i class="fa fa-tag"></i> $<?php echo number_format($row['rate'],2) ?> / Hour</div>
                            <button class="btn btn-book book-venue" type="button" data-id='<?php echo $row['id'] ?>'>Book Now</button>
                        </div>
                    </div>
                </div>
                <?php 
                    endwhile;
                else:
                ?>
                <div class="col-12 no-venues">
                    <i class="fas fa-search fa-3x"></i>
                    <h3>No venues found</h3>
                    <p>We couldn't find any venues matching your criteria. Please try different search terms.</p>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Loading Spinner -->
        <div class="loading-spinner" id="loading-spinner">
            <div class="loader"></div>
            <p class="mt-3">Loading more venues...</p>
                </div>
                </div>
                </div>

<script>
    // Initialize AOS for animations
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true
    });
    
    // Initialize image click for lightbox
    $('.venue-image').click(function(){
        viewer_modal($(this).attr('src'));
    });
    
    // Book venue button handler
    $('.book-venue').click(function(){
        uni_modal("Submit Booking Request","booking.php?venue_id="+$(this).attr('data-id'));
    });
    
    // Search functionality
    $('#venue-search').on('keyup', function() {
        let value = $(this).val().toLowerCase();
        filterVenues(value);
    });
    
    // Sort functionality
    $('#venue-sort').on('change', function() {
        sortVenues($(this).val());
    });
    
    // Count venues and update counter
    function updateVenueCount() {
        const count = $('.venue-item:visible').length;
        $('#venue-count').text(count);
    }
    
    // Filter venues based on search input
    function filterVenues(search) {
        $('.venue-item').each(function() {
            const venueText = $(this).find('.venue-title').text().toLowerCase() + ' ' + 
                              $(this).find('.venue-address').text().toLowerCase() + ' ' + 
                              $(this).find('.venue-description').text().toLowerCase();
            
            if(venueText.indexOf(search) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        
        updateVenueCount();
        
        // Show no results message if needed
        if($('.venue-item:visible').length === 0) {
            if($('#no-results-message').length === 0) {
                $('#venues-container').append(`
                    <div id="no-results-message" class="col-12 no-venues">
                        <i class="fas fa-search fa-3x mb-3"></i>
                        <h3>No venues found</h3>
                        <p>We couldn't find any venues matching your criteria. Please try different search terms.</p>
                    </div>
                `);
            }
        } else {
            $('#no-results-message').remove();
        }
    }
    
    // Sort venues based on selected option
    function sortVenues(sortBy) {
        const venueItems = $('.venue-item').get();
        
        venueItems.sort(function(a, b) {
            switch(sortBy) {
                case 'price-low':
                    return parseFloat($(a).find('.venue-rate').text().replace(/[^\d.-]/g, '')) - 
                           parseFloat($(b).find('.venue-rate').text().replace(/[^\d.-]/g, ''));
                case 'price-high':
                    return parseFloat($(b).find('.venue-rate').text().replace(/[^\d.-]/g, '')) - 
                           parseFloat($(a).find('.venue-rate').text().replace(/[^\d.-]/g, ''));
                case 'name':
                    return $(a).find('.venue-title').text().localeCompare($(b).find('.venue-title').text());
                default:
                    return 0;
            }
        });
        
        const venuesContainer = $('#venues-container');
        $.each(venueItems, function(index, item) {
            venuesContainer.append(item);
        });
    }
    
    // Initialize venue count on page load
    $(document).ready(function() {
        updateVenueCount();
        
        // Add smooth scrolling
        $('a[href*="#"]').on('click', function(e) {
            e.preventDefault();
            $('html, body').animate(
                {
                    scrollTop: $($(this).attr('href')).offset().top - 100,
                },
                500,
                'linear'
            );
        });
    });
</script>
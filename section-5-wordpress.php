<?php
/**
 * Section 5 - Who We Serve
 * WordPress Shortcode
 * 
 * Usage: [section_5_who_we_serve]
 */

function section_5_who_we_serve_shortcode($atts) {
    ob_start();
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        .who-we-serve-section-wp {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 80px 20px;
            position: relative;
            overflow: hidden;
        }

        .serve-container-wp {
            width: 100%;
            max-width: 1400px;
        }

        .who-we-serve-section-wp .serve-header-wp {
            text-align: center;
            margin-bottom: 60px;
        }

        .who-we-serve-section-wp .serve-title-wp {
            font-size: clamp(32px, 5vw, 48px);
            font-weight: bold;
            text-align: center;
            color: white;
            letter-spacing: 2px;
            margin-bottom: 30px;
            text-shadow: none !important;
        }

        /* Progress Bar */
        .serve-progress-bar-container-wp {
            position: relative;
            width: 100%;
            max-width: 800px;
            margin: 40px auto 0;
            height: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 6px;
            margin-bottom: 28px;
        }

        .serve-progress-bar-track-wp {
            position: relative;
            width: 100%;
            height: 4px;
            background: rgba(255, 255, 255, 0.5);
            display: flex;
            align-items: center;
        }

        .serve-progress-bar-fill-wp {
            position: absolute;
            left: 0;
            height: 4px;
            background: #ff6b35;
            transition: width 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
        }

        .serve-progress-arrow-left-wp {
            position: absolute;
            left: 0;
            width: 0;
            height: 0;
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
            border-right: 10px solid #ff6b35;
            transform: translateX(-10px);
        }

        .serve-progress-arrow-right-wp {
            position: absolute;
            right: 0;
            width: 0;
            height: 0;
            border-top: 6px solid transparent;
            border-bottom: 6px solid transparent;
            border-left: 10px solid #ff6b35;
            transform: translateX(10px);
        }

        .serve-progress-diamond-left-wp,
        .serve-progress-diamond-right-wp {
            position: absolute;
            width: 12px;
            height: 12px;
            background: white;
            transform: rotate(45deg);
            z-index: 2;
        }

        .serve-progress-diamond-left-wp {
            left: 0;
            transform: translateX(-6px) rotate(45deg);
        }

        .serve-progress-diamond-right-wp {
            right: 0;
            transform: translateX(6px) rotate(45deg);
        }

        /* Cards Container */
        .who-we-serve-section-wp .serve-cards-container-wp {
            position: relative;
            height: 500px;
            overflow: hidden;
            margin-top: 60px;
            margin-bottom: 40px;
        }

        .serve-cards-wrapper-wp {
            position: relative;
            height: 100%;
            width: 100%;
        }

        /* Card */
        .serve-card-wp {
            position: absolute;
            left: 50%;
            top: 50%;
            width: 100%;
            max-width: 400px;
            height: 450px;
            border-radius: 20px;
            overflow: hidden;
            cursor: pointer;
            transition: all 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            will-change: transform, opacity, filter;
        }

        .serve-card-wp.hidden {
            display: none;
        }

        .serve-card-wp .serve-card-image-wp {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .serve-card-wp .serve-card-overlay-wp {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            top: auto;
            height: auto;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.4) 70%, transparent 100%);
            padding: 30px;
            box-sizing: border-box;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            overflow: visible;
        }

        .serve-card-wp:hover .serve-card-overlay-wp {
            top: 0;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.35) 0%, rgba(255, 140, 0, 0.3) 100%);
            justify-content: center;
        }

        .serve-card-wp .serve-card-title-wp {
            font-size: clamp(18px, 2vw, 22px);
            font-weight: 700;
            text-align: center;
            color: white;
            margin: 0;
            margin-bottom: 0;
            text-transform: uppercase;
            letter-spacing: 1px;
            flex-shrink: 0;
            text-shadow: none !important;
            transition: margin-bottom 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .serve-card-wp:hover .serve-card-title-wp {
            margin-bottom: 15px;
            color: white !important;
        }

        .serve-card-wp.active .serve-card-title-wp {
            color: #1b2a56 !important;
        }

        .serve-card-wp .serve-card-description-wp {
            font-size: clamp(13px, 1.2vw, 15px);
            color: rgba(255, 255, 255, 0.95);
            line-height: 1.6;
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            text-shadow: none !important;
        }

        .serve-card-wp:hover .serve-card-description-wp {
            max-height: 300px;
            opacity: 1;
            margin-top: 10px;
            text-shadow: none !important;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .who-we-serve-section-wp {
                padding: 60px 15px;
            }

            .who-we-serve-section-wp .serve-header-wp {
                margin-bottom: 40px;
            }

            .who-we-serve-section-wp .serve-title-wp {
                margin-bottom: 30px;
            }

            .who-we-serve-section-wp .serve-cards-container-wp {
                height: 450px;
            }

            .serve-card-wp {
                max-width: 100%;
            }
        }

        @media (max-width: 480px) {
            .who-we-serve-section-wp {
                padding: 40px 10px;
            }
        }
    </style>

    <div class="who-we-serve-section-wp">
        <div class="serve-container-wp">
            <!-- Header -->
            <div class="serve-header-wp">
                <h2 class="serve-title-wp">WHO WE SERVE</h2>
            </div>

            <!-- Progress Bar -->
            <div class="serve-progress-bar-container-wp">
                <div class="serve-progress-diamond-left-wp"></div>
                <div class="serve-progress-bar-track-wp">
                    <div class="serve-progress-bar-fill-wp" id="serveProgressBarFillWp">
                        <div class="serve-progress-arrow-left-wp"></div>
                        <div class="serve-progress-arrow-right-wp"></div>
                    </div>
                </div>
                <div class="serve-progress-diamond-right-wp"></div>
            </div>

            <!-- Cards Container -->
            <div class="serve-cards-container-wp" id="serveCarouselContainerWp">
                <div class="serve-cards-wrapper-wp" id="serveCardsWrapperWp">
                    <!-- Card 1 -->
                    <div class="serve-card-wp" data-index="0">
                        <img src="https://images.unsplash.com/photo-1565793298595-6a879b1d9492?w=800"
                            alt="Manufacturing" class="serve-card-image-wp">
                        <div class="serve-card-overlay-wp">
                            <p class="serve-card-description-wp">
                                We help manufacturing enterprises operate with precision and confidence by building
                                compliant, skilled, and resilient teams. From shop floor operators to apprentices, our
                                talent solutions align directly with your productivity, safety, and compliance
                                goals—keeping operations efficient today and future-ready tomorrow.
                            </p>
                            <h3 class="serve-card-title-wp">MANUFACTURING</h3>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div class="serve-card-wp" data-index="1">
                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=800" alt="Sales & Service"
                            class="serve-card-image-wp">
                        <div class="serve-card-overlay-wp">
                            <p class="serve-card-description-wp">
                                We develop motivated, high-performing frontline teams across retail, QSR, logistics,
                                BFSI, hospitality, and healthcare – that deliver results and stay committed. Our
                                flexible, retention-focused approach boosts on-ground productivity and ensures
                                consistent customer experiences, helping you scale reliable teams across regions and
                                channels.
                            </p>
                            <h3 class="serve-card-title-wp">SALES & SERVICE</h3>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div class="serve-card-wp" data-index="2">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800"
                            alt="Digital - IT/ITES" class="serve-card-image-wp">
                        <div class="serve-card-overlay-wp">
                            <p class="serve-card-description-wp">
                                We partner with digital enterprises to build adaptive talent pipelines that scale with
                                evolving technologies and business demands. Through blended learning, live project
                                immersion, and performance-driven frameworks, we strengthen your digital
                                capability—empowering teams to deliver immediate impact and drive long-term
                                transformation.
                            </p>
                            <h3 class="serve-card-title-wp">DIGITAL - IT/ITES</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            'use strict';
            
            // Use unique variable names to avoid conflicts
            let serveActiveIndex = 0;
            let serveTouchStart = 0;
            let serveTouchEnd = 0;
            let serveAutoPlayInterval = null;

            const serveCards = document.querySelectorAll('.serve-card-wp');
            const serveCarouselContainer = document.getElementById('serveCarouselContainerWp');
            
            if (!serveCarouselContainer || serveCards.length === 0) {
                return; // Exit if elements not found
            }

            const serveTotalItems = serveCards.length;

            // Get card style based on position
            function getServeCardStyle(index) {
                const diff = index - serveActiveIndex;
                let position = diff;

                // Handle circular loop - find shortest distance
                if (diff > serveTotalItems / 2) {
                    position = diff - serveTotalItems;
                } else if (diff < -serveTotalItems / 2) {
                    position = diff + serveTotalItems;
                }

                // Hide cards that are more than 1 position away
                if (Math.abs(position) > 1) {
                    return {
                        display: 'none',
                        transform: 'translate(-50%, -50%) scale(0.85)',
                        opacity: 0,
                        zIndex: 10,
                        filter: 'blur(2px)'
                    };
                }

                // Calculate translateX - active card (position 0) should be at 0 (centered)
                const cardSpacing = 110;
                let translateX = position * cardSpacing;

                let scale = 1;
                let opacity = 0.5;
                let zIndex = 10;
                let blur = 2;

                if (position === 0) {
                    translateX = 0;
                    scale = 1.1;
                    opacity = 1;
                    zIndex = 30;
                    blur = 0;
                } else if (Math.abs(position) === 1) {
                    scale = 0.85;
                    opacity = 0.6;
                    zIndex = 20;
                    blur = 2;
                }

                return {
                    display: 'block',
                    transform: 'translate(calc(-50% + ' + translateX + '%), -50%) scale(' + scale + ')',
                    opacity: opacity,
                    zIndex: zIndex,
                    filter: 'blur(' + blur + 'px)'
                };
            }

            // Update progress bar
            function updateServeProgressBar() {
                const progressBarFill = document.getElementById('serveProgressBarFillWp');
                if (progressBarFill) {
                    const progressPercent = ((serveActiveIndex + 1) / serveTotalItems) * 100;
                    progressBarFill.style.width = progressPercent + '%';
                }
            }

            // Update carousel
            function updateServeCarousel() {
                serveCards.forEach(function(card, index) {
                    const style = getServeCardStyle(index);

                    card.style.display = style.display;
                    card.style.transform = style.transform;
                    card.style.opacity = style.opacity;
                    card.style.zIndex = style.zIndex;
                    card.style.filter = style.filter;

                    if (index === serveActiveIndex) {
                        card.classList.add('active');
                    } else {
                        card.classList.remove('active');
                    }
                });

                updateServeProgressBar();
            }

            // Next slide
            function nextServeSlide() {
                serveActiveIndex = (serveActiveIndex + 1) % serveTotalItems;
                updateServeCarousel();
                resetServeAutoPlay();
            }

            // Previous slide
            function prevServeSlide() {
                serveActiveIndex = (serveActiveIndex - 1 + serveTotalItems) % serveTotalItems;
                updateServeCarousel();
                resetServeAutoPlay();
            }

            // Auto-play
            function startServeAutoPlay() {
                if (serveAutoPlayInterval) {
                    clearInterval(serveAutoPlayInterval);
                }
                serveAutoPlayInterval = setInterval(function() {
                    serveActiveIndex = (serveActiveIndex + 1) % serveTotalItems;
                    updateServeCarousel();
                }, 5000);
            }

            function stopServeAutoPlay() {
                if (serveAutoPlayInterval) {
                    clearInterval(serveAutoPlayInterval);
                    serveAutoPlayInterval = null;
                }
            }

            function resetServeAutoPlay() {
                stopServeAutoPlay();
                startServeAutoPlay();
            }

            // Touch handlers
            function handleServeTouchStart(e) {
                serveTouchStart = e.touches[0].clientX;
                stopServeAutoPlay();
            }

            function handleServeTouchMove(e) {
                serveTouchEnd = e.touches[0].clientX;
            }

            function handleServeTouchEnd() {
                if (serveTouchStart - serveTouchEnd > 75) {
                    nextServeSlide();
                }
                if (serveTouchStart - serveTouchEnd < -75) {
                    prevServeSlide();
                }
                startServeAutoPlay();
            }

            // Event listeners
            serveCarouselContainer.addEventListener('touchstart', handleServeTouchStart, { passive: true });
            serveCarouselContainer.addEventListener('touchmove', handleServeTouchMove, { passive: true });
            serveCarouselContainer.addEventListener('touchend', handleServeTouchEnd, { passive: true });

            // Click on card
            serveCards.forEach(function(card, index) {
                card.addEventListener('click', function() {
                    serveActiveIndex = index;
                    updateServeCarousel();
                    resetServeAutoPlay();
                });
            });

            // Pause on hover
            serveCarouselContainer.addEventListener('mouseenter', stopServeAutoPlay);
            serveCarouselContainer.addEventListener('mouseleave', startServeAutoPlay);

            // Initialize
            updateServeCarousel();
            startServeAutoPlay();
        })();
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('section_5_who_we_serve', 'section_5_who_we_serve_shortcode');


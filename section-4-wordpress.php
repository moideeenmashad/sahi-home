<?php
/**
 * Section 4 - How We Roll
 * WordPress Shortcode
 * 
 * Usage: [section_4_how_we_roll]
 */

function section_4_how_we_roll_shortcode($atts) {
    ob_start();
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        .how-we-roll-section-wp {
            padding: 80px 20px !important;
            max-width: 1400px !important;
            margin: 0 auto !important;
        }

        .how-we-roll-section-wp .section-header-wp {
            text-align: center !important;
            margin-bottom: 60px !important;
        }

        .how-we-roll-section-wp .section-title-wp {
            font-size: clamp(32px, 5vw, 48px) !important;
            font-weight: bold !important;
            color: white !important;
            text-align: center !important;
            letter-spacing: 2px !important;
            margin-bottom: 30px !important;
        }

        .progress-line-container-wp {
            position: relative;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 10px 0;
        }

        .progress-line-bg-wp {
            position: absolute;
            width: 100%;
            height: 3px;
            background: rgba(255, 255, 255, 0.15);
            top: 50%;
            transform: translateY(-50%);
            border-radius: 10px;
        }

        .progress-line-fill-wp {
            position: absolute;
            height: 3px;
            background: linear-gradient(90deg, #ff6b35 0%, #ff8c42 100%);
            top: 50%;
            transform: translateY(-50%);
            width: 0%;
            transition: width 0.7s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(255, 107, 53, 0.4);
        }

        .progress-dots-wp {
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .progress-dot-wp {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            z-index: 2;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            cursor: pointer;
        }

        .progress-dot-wp::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            background: #ff6b35;
            opacity: 0;
            transform: scale(0.5);
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.5);
        }

        .progress-dot-wp.active {
            background: #ff6b35;
            border-color: #ff6b35;
            transform: scale(1.3);
        }

        .progress-dot-wp.active::before {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }

        .progress-dot-wp:hover {
            transform: scale(1.2);
            background: rgba(255, 107, 53, 0.3);
        }

        .how-we-roll-section-wp .cards-container-wp {
            display: flex !important;
            justify-content: space-between !important;
            gap: 30px !important;
            margin-top: 60px !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .roll-card-wp {
            position: relative !important;
            border-radius: 20px !important;
            overflow: hidden !important;
            cursor: pointer !important;
            height: 500px !important;
            flex: 1 !important;
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .roll-card-wp:hover {
            transform: translateY(-10px) !important;
        }

        .card-image-wp {
            width: 100% !important;
            height: 100% !important;
            object-fit: cover !important;
        }

        .roll-card-wp .card-overlay-wp {
            position: absolute !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            top: auto !important;
            height: auto !important;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.85) 0%, rgba(0, 0, 0, 0.4) 70%, transparent 100%) !important;
            padding: 30px !important;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;
            display: flex !important;
            flex-direction: column !important;
            justify-content: flex-end !important;
        }

        .roll-card-wp:hover .card-overlay-wp {
            top: 0 !important;
            height: 100% !important;
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.35) 0%, rgba(255, 140, 0, 0.3) 100%) !important;
            justify-content: center !important;
        }

        .roll-card-wp .card-title-wp {
            font-size: clamp(18px, 2vw, 22px) !important;
            font-weight: 700 !important;
            color: white !important;
            margin-bottom: 0 !important;
            text-transform: uppercase !important;
            letter-spacing: 1px !important;
            transition: margin-bottom 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .roll-card-wp:hover .card-title-wp {
            margin-bottom: 15px !important;
        }

        .roll-card-wp .card-description-wp {
            font-size: clamp(13px, 1.2vw, 15px) !important;
            color: rgba(255, 255, 255, 0.95) !important;
            line-height: 1.6 !important;
            max-height: 0 !important;
            opacity: 0 !important;
            overflow: hidden !important;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .roll-card-wp:hover .card-description-wp {
            max-height: 300px !important;
            opacity: 1 !important;
            margin-top: 10px !important;
        }

        .carousel-controls-wp {
            display: none !important;
            justify-content: center !important;
            align-items: center !important;
            gap: 20px !important;
            margin-top: 30px !important;
        }

        .carousel-btn-wp {
            width: 50px !important;
            height: 50px !important;
            border-radius: 50% !important;
            background: rgba(255, 107, 53, 0.2) !important;
            border: 2px solid #ff6b35 !important;
            color: #ff6b35 !important;
            font-size: 24px !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
        }

        .carousel-btn-wp:hover {
            background: #ff6b35 !important;
            color: white !important;
        }

        .carousel-dots-wp {
            display: flex !important;
            gap: 10px !important;
        }

        .carousel-dot-wp {
            width: 10px !important;
            height: 10px !important;
            border-radius: 50% !important;
            background: rgba(255, 255, 255, 0.3) !important;
            cursor: pointer !important;
            transition: all 0.3s ease !important;
        }

        .carousel-dot-wp.active {
            background: #ff6b35 !important;
            width: 30px !important;
            border-radius: 5px !important;
        }

        @media (max-width: 968px) {
            .how-we-roll-section-wp .cards-container-wp {
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 20px !important;
            }

            .roll-card-wp {
                height: 400px !important;
            }
        }

        @media (max-width: 768px) {
            .how-we-roll-section-wp {
                padding: 60px 15px !important;
            }

            .how-we-roll-section-wp .cards-container-wp {
                display: flex !important;
                overflow-x: hidden !important;
                scroll-behavior: smooth !important;
                gap: 0 !important;
            }

            .roll-card-wp {
                min-width: 100% !important;
                height: 450px !important;
                margin-right: 0 !important;
                transform: translateX(0) !important;
                transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1) !important;
            }

            .roll-card-wp:hover {
                transform: translateY(0) !important;
            }

            .carousel-controls-wp {
                display: flex !important;
            }

            .progress-line-container-wp {
                max-width: 100% !important;
            }
        }

        @media (max-width: 480px) {
            .how-we-roll-section-wp {
                padding: 40px 10px !important;
            }

            .roll-card-wp {
                height: 400px !important;
            }

            .roll-card-wp .card-overlay-wp {
                padding: 20px !important;
            }
        }
    </style>

    <div class="how-we-roll-section-wp">
        <div class="section-header-wp">
            <h2 class="section-title-wp">HOW WE ROLL</h2>

            <div class="progress-line-container-wp">
                <div class="progress-line-bg-wp"></div>
                <div class="progress-line-fill-wp"></div>
                <div class="progress-dots-wp">
                    <div class="progress-dot-wp"></div>
                    <div class="progress-dot-wp"></div>
                    <div class="progress-dot-wp"></div>
                </div>
            </div>
        </div>

        <div class="cards-container-wp" id="cardsContainerWp">
            <div class="roll-card-wp">
                <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=800" alt="SAHI Work"
                    class="card-image-wp">
                <div class="card-overlay-wp">
                    <h3 class="card-title-wp">SAHI WORK</h3>
                    <p class="card-description-wp">
                        Solve for Compliance with our experts by creating pipelines for Talent-Ready Hiring & Onboarding
                    </p>
                </div>
            </div>

            <div class="roll-card-wp">
                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800"
                    alt="Work Integrated Skilling" class="card-image-wp">
                <div class="card-overlay-wp">
                    <h3 class="card-title-wp">WORK INTEGRATED SKILLING</h3>
                    <p class="card-description-wp">
                        Solve for Productivity (Teaching) through our role-specific skilling and engagement-led
                        deployment models, on-the-job learning, continuous development, engagement and career
                        progression strategies that increase efficiency.
                    </p>
                </div>
            </div>

            <div class="roll-card-wp">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=800"
                    alt="Work Integrated Benefits" class="card-image-wp">
                <div class="card-overlay-wp">
                    <h3 class="card-title-wp">WORK INTEGRATED BENEFITS</h3>
                    <p class="card-description-wp">
                        Solve for Retention by providing comprehensive long-term worker benefits to create the
                        foundations for improved tenure & retention and reducing cost for training costs.
                    </p>
                </div>
            </div>
        </div>

        <div class="carousel-controls-wp">
            <button class="carousel-btn-wp" id="prevBtnWp">‹</button>
            <div class="carousel-dots-wp">
                <div class="carousel-dot-wp active" data-index="0"></div>
                <div class="carousel-dot-wp" data-index="1"></div>
                <div class="carousel-dot-wp" data-index="2"></div>
            </div>
            <button class="carousel-btn-wp" id="nextBtnWp">›</button>
        </div>
    </div>

    <script>
        (function() {
            'use strict';
            
            let currentIndexWp = 0;
            const cardsWp = document.querySelectorAll('.roll-card-wp');
            const cardsContainerWp = document.getElementById('cardsContainerWp');
            const prevBtnWp = document.getElementById('prevBtnWp');
            const nextBtnWp = document.getElementById('nextBtnWp');
            const carouselDotsWp = document.querySelectorAll('.carousel-dot-wp');
            const progressDotsWp = document.querySelectorAll('.progress-dot-wp');
            const progressFillWp = document.querySelector('.progress-line-fill-wp');
            const totalCardsWp = cardsWp.length;

            cardsWp.forEach(function(card, index) {
                card.addEventListener('mouseenter', function() {
                    if (window.innerWidth > 768) {
                        updateProgressLineWp(index);
                    }
                });

                card.addEventListener('mouseleave', function() {
                    if (window.innerWidth > 768) {
                        resetProgressLineWp();
                    }
                });
            });

            progressDotsWp.forEach(function(dot, index) {
                dot.addEventListener('click', function() {
                    if (window.innerWidth > 768) {
                        updateProgressLineWp(index);
                        cardsWp[index].scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                    }
                });
            });

            function updateProgressLineWp(index) {
                const progressPercent = (index / (totalCardsWp - 1)) * 100;
                progressFillWp.style.width = progressPercent + '%';

                progressDotsWp.forEach(function(dot, dotIndex) {
                    if (dotIndex <= index) {
                        dot.classList.add('active');
                    } else {
                        dot.classList.remove('active');
                    }
                });
            }

            function resetProgressLineWp() {
                progressFillWp.style.width = '0%';
                progressDotsWp.forEach(function(dot) {
                    dot.classList.remove('active');
                });
            }

            function updateCarouselWp() {
                if (window.innerWidth <= 768) {
                    const offset = -currentIndexWp * 100;
                    cardsWp.forEach(function(card, index) {
                        card.style.transform = 'translateX(' + offset + '%)';
                    });

                    carouselDotsWp.forEach(function(dot, index) {
                        dot.classList.toggle('active', index === currentIndexWp);
                    });

                    updateProgressLineWp(currentIndexWp);
                }
            }

            prevBtnWp.addEventListener('click', function() {
                currentIndexWp = (currentIndexWp - 1 + totalCardsWp) % totalCardsWp;
                updateCarouselWp();
            });

            nextBtnWp.addEventListener('click', function() {
                currentIndexWp = (currentIndexWp + 1) % totalCardsWp;
                updateCarouselWp();
            });

            carouselDotsWp.forEach(function(dot, index) {
                dot.addEventListener('click', function() {
                    currentIndexWp = index;
                    updateCarouselWp();
                });
            });

            let touchStartXWp = 0;
            let touchEndXWp = 0;

            cardsContainerWp.addEventListener('touchstart', function(e) {
                touchStartXWp = e.changedTouches[0].screenX;
            });

            cardsContainerWp.addEventListener('touchend', function(e) {
                touchEndXWp = e.changedTouches[0].screenX;
                handleSwipeWp();
            });

            function handleSwipeWp() {
                if (touchEndXWp < touchStartXWp - 50) {
                    currentIndexWp = (currentIndexWp + 1) % totalCardsWp;
                    updateCarouselWp();
                }
                if (touchEndXWp > touchStartXWp + 50) {
                    currentIndexWp = (currentIndexWp - 1 + totalCardsWp) % totalCardsWp;
                    updateCarouselWp();
                }
            }

            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    cardsWp.forEach(function(card) {
                        card.style.transform = 'translateX(0)';
                    });
                    progressFillWp.style.width = '0%';
                    progressDotsWp.forEach(function(dot) {
                        dot.classList.remove('active');
                    });
                } else {
                    updateCarouselWp();
                }
            });
        })();
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('section_4_how_we_roll', 'section_4_how_we_roll_shortcode');


<?php
/**
 * Section 3 - How We Do It
 * WordPress Shortcode
 * 
 * Usage: [section_3_how_we_do_it]
 */

function section_3_how_we_do_it_shortcode($atts) {
    ob_start();
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        .how-we-do-section-wp {
            min-height: 80vh;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content-wrapper-wp {
            position: relative;
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
        }

        .how-we-do-section-wp .section-header-wp {
            text-align: center;
            position: relative;
            z-index: 10;
            max-width: 800px;
            margin: 0 auto;
            cursor: pointer;
        }

        .how-we-do-section-wp .section-title-wp {
            color: white !important;
            font-size: clamp(32px, 5vw, 48px);
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }

        .how-we-do-section-wp .section-description-wp {
            font-size: clamp(16px, 1.8vw, 20px);
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }

        .how-we-do-section-wp .cards-container-wp {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .content-card-wp {
            position: absolute;
            width: 450px;
            max-width: 90%;
            backdrop-filter: blur(10px);
            border: 2px solid #ff6b35;
            border-bottom: 8px solid #ff6b35;
            border-radius: 30px;
            padding: 16px;
            opacity: 0;
            text-align: center;
            transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: auto;
        }

        .how-we-do-section-wp.header-hovered-wp .content-card-wp {
            opacity: 1;
        }

        .content-card-wp.card-1-wp {
            top: -180px;
            left: 5%;
            transform: translate(calc(50vw - 50% - 5%), 250px) scale(0.3);
            transition-delay: 0.1s;
        }

        .how-we-do-section-wp.header-hovered-wp .content-card-wp.card-1-wp {
            transform: translate(0, 0) scale(1);
        }

        .content-card-wp.card-2-wp {
            top: -180px;
            right: 5%;
            transform: translate(calc(-50vw + 50% + 5%), 250px) scale(0.3);
            transition-delay: 0.2s;
        }

        .how-we-do-section-wp.header-hovered-wp .content-card-wp.card-2-wp {
            transform: translate(0, 0) scale(1);
        }

        .content-card-wp.card-3-wp {
            bottom: -180px;
            left: 5%;
            transform: translate(calc(50vw - 50% - 5%), -250px) scale(0.3);
            transition-delay: 0.3s;
        }

        .how-we-do-section-wp.header-hovered-wp .content-card-wp.card-3-wp {
            transform: translate(0, 0) scale(1);
        }

        .content-card-wp.card-4-wp {
            bottom: -180px;
            right: 5%;
            transform: translate(calc(-50vw + 50% + 5%), -250px) scale(0.3);
            transition-delay: 0.4s;
        }

        .how-we-do-section-wp.header-hovered-wp .content-card-wp.card-4-wp {
            transform: translate(0, 0) scale(1);
        }

        .card-content-wp {
            color: white;
            font-size: clamp(14px, 1.3vw, 16px);
            line-height: 1.7;
        }

        @media (max-width: 1200px) {
            .content-card-wp {
                width: 100% !important;
            }
        }

        @media (max-width: 768px) {
            .how-we-do-section-wp {
                padding: 60px 15px;
                overflow-x: hidden;
            }

            .content-wrapper-wp {
                padding: 0;
                width: 100%;
                box-sizing: border-box;
            }

            .how-we-do-section-wp .section-header-wp {
                padding: 0 10px;
            }

            .how-we-do-section-wp .cards-container-wp {
                position: relative;
                top: auto;
                left: auto;
                transform: none;
                margin-top: 60px;
                height: auto;
                width: 100%;
                padding: 0;
                box-sizing: border-box;
            }

            .content-card-wp {
                position: relative !important;
                top: auto !important;
                left: auto !important;
                right: auto !important;
                bottom: auto !important;
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
                transform: translateY(20px);
                box-sizing: border-box;
            }

            .how-we-do-section-wp.header-hovered-wp .content-card-wp,
            .how-we-do-section-wp.active-wp .content-card-wp {
                transform: translateY(0);
            }

            .card-content-wp {
                font-size: 15px;
            }
        }

        @media (max-width: 480px) {
            .how-we-do-section-wp {
                padding: 40px 15px;
                overflow-x: hidden;
            }

            .content-wrapper-wp {
                padding: 0;
            }

            .how-we-do-section-wp .section-header-wp {
                padding: 0 5px;
            }

            .how-we-do-section-wp .cards-container-wp {
                margin-top: 40px;
                padding: 0;
            }

            .content-card-wp {
                padding: 18px 20px;
                border-radius: 20px;
                box-sizing: border-box;
            }

            .card-content-wp {
                font-size: 14px;
                line-height: 1.6;
            }
        }
    </style>

    <div class="how-we-do-section-wp" id="howWeDoSectionWp">
        <div class="content-wrapper-wp">
            <div class="section-header-wp">
                <h2 class="section-title-wp">HOW WE DO IT</h2>
                <p class="section-description-wp">
                    We combine industry expertise, technology, and on-ground insight to create sustainable talent
                    ecosystems:
                </p>
            </div>

            <div class="cards-container-wp">
                <div class="content-card-wp card-1-wp">
                    <p class="card-content-wp">
                        We identify and prepare pre-assessed, job-ready talent
                        tailored to your business needs.
                    </p>
                </div>

                <div class="content-card-wp card-2-wp">
                    <p class="card-content-wp">
                        We maintain compliance and performance
                        through transparent systems.
                    </p>
                </div>

                <div class="content-card-wp card-3-wp">
                    <p class="card-content-wp">
                        Our flexible forms of work and continuous skilling model
                        ensures productivity stays high.
                    </p>
                </div>

                <div class="content-card-wp card-4-wp">
                    <p class="card-content-wp">
                        providing integrated benefits that support your workforce through housing and financial
                        planning.
                        , improving efficiency and engagement over time.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        (function() {
            'use strict';
            
            const sectionWp = document.getElementById('howWeDoSectionWp');
            const sectionHeaderWp = sectionWp.querySelector('.section-header-wp');

            sectionHeaderWp.addEventListener('mouseenter', function () {
                sectionWp.classList.add('header-hovered-wp');
            });

            sectionHeaderWp.addEventListener('mouseleave', function () {
                sectionWp.classList.remove('header-hovered-wp');
            });

            if (window.innerWidth <= 768) {
                sectionHeaderWp.addEventListener('click', function () {
                    sectionWp.classList.toggle('active-wp');
                });
            }
        })();
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('section_3_how_we_do_it', 'section_3_how_we_do_it_shortcode');


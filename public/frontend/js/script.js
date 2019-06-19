$( function() {

	var KHDEV = {
		
		init: function() {
			this.clientSlider();
			this.magnificPopup();
			this.heroSlider();
			this.serviceSlider();
			this.blogSlider();
			this.portfolioGrid();
			this.loadingScreen();
			this.heroParoller();
			this.map();
		},
		loadingScreen:function () {
            $('#pageloader').delay(500).fadeOut('slow');
        },

		clientSlider: function() {
			
			$('.logo-slider').slick({
				slidesToShow: 5,
				slidesToScroll: 3,
				autoplay: true,
				autoplaySpeed: 5000,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    }
                ]
			});
			
		},

		magnificPopup:function() {
			$('.popup-view').magnificPopup({
				type:'image'
			});
		},

		heroSlider:function () {
			$('.hero-slick-slider').slick({
				arrow: true,
				dots: true,
                autoplay: true,
                autoplaySpeed: 7000
			})
            .on('beforeChange', function(event, slick, currentSlide, nextSlide){
                $( '.hero-content' ).hide();
            })
            .on('afterChange', function (event, slick, currentSlide, nextSlide) {
                $( '.hero-content' ).show();
            });
        },

        serviceSlider:function () {
			$('.services-slider').slick({
				slidesToShow: 3,
                infinite: false,
				slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
			});
        },

        blogSlider: function () {
            $('.blog-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 769,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        },

		portfolioGrid: function () {

            var $grid = $('.grid').isotope({
                itemSelector: '.element-item',
                layoutMode: 'fitRows'
            });

			// filter functions
            var filterFns = {
                // show if number is greater than 50
                numberGreaterThan50: function() {
                    var number = $(this).find('.number').text();
                    return parseInt( number, 10 ) > 50;
                },
                // show if name ends with -ium
                ium: function() {
                    var name = $(this).find('.name').text();
                    return name.match( /ium$/ );
                }
            };

            if ( $( '.home.cat-filter' ).length ){
                $grid.isotope({ filter: '.mobile-app' });
            }

			// bind filter button click
            $('.cat-filter').on( 'click', 'a', function() {
                event.preventDefault();
                var filterValue = $( this ).attr('data-filter');
                // use filterFn if matches value
                filterValue = filterFns[ filterValue ] || filterValue;
                $grid.isotope({ filter: filterValue });
            });

			// change is-checked class on buttons
            $('.cat-filter').each( function( i, buttonGroup ) {

                var $buttonGroup = $( buttonGroup );

                $buttonGroup.on( 'click', 'a', function() {
                    event.preventDefault();
                    $buttonGroup.find('.active').removeClass('active');
                    $( this ).addClass('active');
                });
            });

        },

        heroParoller: function () {
		    if ( $( '.hero-bg' ).length ) {
                $('.hero-bg').parallax({
                    imageSrc: $('.hero-bg').attr('data-image'),
                    speed: 0.5
                });
            }
        },

        map: function () {
            if ( $( '#map' ).length ) {
                var dataLat = parseFloat($('#map').attr( 'data-lat' ));
                var dataLng = parseFloat($('#map').attr( 'data-lng' ));

                var uluru = {lat: dataLat, lng: dataLng};
                var marker;

                var map = new google.maps.Map( document.getElementById('map'), {
                    zoom: 18,
                    center: uluru
                });

                marker = new google.maps.Marker({
                    position: uluru,
                    map: map,
                    draggable: false
                });
            }
        }

	};
	
	$( document ).ready( function() {

        KHDEV.init();

	});
	
});
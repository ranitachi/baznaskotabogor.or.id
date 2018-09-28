/*
*****************************************************
*	CUSTOM JS DOCUMENT                              *
*	Single window load event                        *
*   "use strict" mode on                            *
*****************************************************
*/
$(window).on("load", function() {
	
	"use strict";
		   
	var preLoader = $('.preloader');
	var countNumber= $(".count-number");
	var comingSoonTimer = $('#coming-soon-timer');
    var mixItUp = $('#mixItUp');
	var progressBar = $(".progress-bar");
	var dataToggleTooTip = $('[data-toggle="tooltip"]');
	var scrollTop = $('#scroll-top');
	var headerSticky = $( ".sticky-nav" );	
	var boDy = $('body');
	var scrolls = $('a[href*="#"]');
	var bodyScroll = $('html, body');	
	
	
// ============================================
// Sticky Header
// =============================================
	if ( headerSticky.length ) {	
			$(window).on('scroll',function() {

			if ($(this).scrollTop()>30){
				headerSticky.addClass('sticky-header');
			 }else{
			  headerSticky.removeClass('sticky-header');
			 }
		 });
	}		
// ============================================
// PreLoader On window Load
// =============================================
		if(preLoader.length) {	 
		 preLoader.addClass('loaderout');
	    }     
//========================================
// Counter
//======================================== 	
 countNumber.appear(function() {
		$(this).each(function() {
			var datacount = $(this).attr('data-count');
			$(this).find('.counter').delay(6000).countTo({
				from: 10,
				to: datacount,
				speed: 8000,
				refreshInterval: 50,
			});
		});
	});	
//========================================
// Owl Carousel functions Calling
//======================================== 	
 
	owlCarouselInit();

//========================================
// Comming Soon Timer
//======================================== 	
	if(comingSoonTimer.length){
		comingsoonInt();
	}

//========================================
// Scroll top
//======================================== 		
	if (scrollTop.length) {
		scrollTop.on('click',function(){
			  boDy.animate({
						scrollTop: 0
				},
				2000);
		});
		
		$(window).on('scroll',function() {

			if ($(this).scrollTop()>500){
				scrollTop.addClass('showScrollTop');
			 }else{
			  scrollTop.removeClass('showScrollTop');
			 }
		 });
	}
	scrolls.on('click', function (e) {
			e.preventDefault();
			// alert('aa');
			bodyScroll.animate({
				scrollTop: $($(this).attr('href')).offset().top
			}, 800, 'linear');
		});
//============================================
// MixItUp settings
//============================================		

    if (mixItUp.length) {
        mixItUp.mixItUp();
    }
	
//============================================
// Wow Animation settings
//============================================		
	 if (progressBar.length) {
        progressBar.appear(function() {
            dataToggleTooTip.tooltip({
                trigger: 'manual'
            }).tooltip('show');
            progressBar.each(function() {
                var each_bar_width = $(this).attr('aria-valuenow');
                $(this).width(each_bar_width + '%');
            });
        });
    }
	
});



//========================================
// Owl Carousel functions
//======================================== 	

function owlCarouselInit() {
	
	"use strict";	
	
//========================================
// owl carousels settings
//======================================== 		
	var mainSlider = $('#main-slider');
	var aboutSlider = $('.about-slider');
	var partnerSlider = $('.partner-slider');
	var testimonialSlider = $('.testimonial-slider');		
	var nextNav = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
	var prevNav = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
	
		if(mainSlider.length) {	
			 mainSlider.owlCarousel({
					loop:true,
					margin:0,
					nav:false,
					navText:[prevNav,nextNav],
					dots:true,
					autoplay:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:1
						},
						1000:{
							items:1
						}
					}
				});
			}
		if(aboutSlider.length) {	
			 aboutSlider.owlCarousel({
					loop:true,
					margin:0,
					nav:true,
					navText:[prevNav,nextNav],
					dots:false,
					autoplay: true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:1
						},
						1000:{
							items:1
						}
					}
				});
			}
		if(testimonialSlider.length) {	
			 testimonialSlider.owlCarousel({
					loop:true,
					margin:0,
					nav:false,
					navText:[prevNav,nextNav],
					dots:true,
					autoplay: true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:2
						},
						1000:{
							items:3
						}
					}
				});
			}
		if(partnerSlider.length) {	
			 partnerSlider.owlCarousel({
					loop:false,
					margin:0,
					nav:false,
					navText:[prevNav,nextNav],
					dots:false,
					autoplay:true,
					responsive:{
						0:{
							items:1
						},
						600:{
							items:3
						},
						1000:{
							items:4
						}
					}
				});
			}
		

}			

function initMap() {
    "use strict";

    var mapDiv = $('#gmap_canvas');

    if (mapDiv.length) {
        var myOptions = {
            zoom: 5,
            scrollwheel: false,
            draggable: true,
			//backgroundColor:grey,
            center: new google.maps.LatLng(22.9623, 76.0508),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        var marker = new google.maps.Marker({
            map: map,
            position: new google.maps.LatLng(22.9623, 76.0508)
        });
        var infowindow = new google.maps.InfoWindow({
            content: '<strong>ITGEEkS</strong>'
        });
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });

        infowindow.open(map, marker);
		
    }
}	

var pieChart =$('.chart');
if(pieChart.length){
	var drawPieChart = function(data, colors) {
	  var canvas = document.getElementById('pie');
	  var ctx = canvas.getContext('2d');
	  var x = canvas.width / 2;
		  y = canvas.height / 2;
	  var color,
		  startAngle,
		  endAngle,
		  total = getTotal(data);
	  
	  for(var i=0; i<data.length; i++) {
		color = colors[i];
		startAngle = calculateStart(data, i, total);
		endAngle = calculateEnd(data, i, total);
		
		ctx.beginPath();
		ctx.fillStyle = color;
		ctx.moveTo(x, y);
		ctx.arc(x, y, y-20, startAngle, endAngle);
		ctx.fill();
		//ctx.rect(canvas.width - 100, y - i * 30, 12, 12);
		//ctx.fill();
		//ctx.font = "13px sans-serif";
		//ctx.fillText(data[i].label + " - " + data[i].value + " (" + calculatePercent(data[i].value, total) + "%)", canvas.width - 100 + 20, y - i * 30 + 10);
	  }
	};
	var calculatePercent = function(value, total) {	  
	  return (value / total * 100).toFixed(2);
	};
	var getTotal = function(data) {
	  var sum = 0;
	  for(var i=0; i<data.length; i++) {
		sum += data[i].value;
	  }		  
	  return sum;
	};
	var calculateStart = function(data, index, total) {
	  if(index === 0) {
		return 0;
	  }	  
	  return calculateEnd(data, index-1, total);
	};
	var calculateEndAngle = function(data, index, total) {
	  var angle = data[index].value / total * 360;
	  var inc = ( index === 0 ) ? 0 : calculateEndAngle(data, index-1, total);	  
	  return ( angle + inc );
	};
	var calculateEnd = function(data, index, total) {	  
	  return degreeToRadians(calculateEndAngle(data, index, total));
	};
	var degreeToRadians = function(angle) {
	  return angle * Math.PI / 180
	}
	var data = [
	  { label: 'Won', value: 80 },
	  { label: 'Compro', value: 50 },
	  { label: 'Lose', value: 20 },
	  { label: 'Leave', value: 30 }
	];
	var colors = [ '#3eb36d', '#3ca7ab', '#e37d39', '#de4e4e' ];
	drawPieChart(data, colors);
}


var locationMap =$('.itg_map_location');
if(locationMap.length){
	$(function () {            
		var test_plots = {
			"paris": {
				latitude: 48.86,
				longitude: 2.3444444444444,
				tooltip: {
					content: "Paris"
				}
			},
			"tokyo": {
				latitude: 35.689488,
				longitude: 139.691706,
				tooltip: {
					content: "Tokyo"
				}
			},
			"moscow": {
				latitude: 55.755786,
				longitude: 37.617633,
				tooltip: {
					content: "Moscow"
				}
			},
			"los_angeles": {
				latitude: 34.052234,
				longitude: -118.243685,
				tooltip: {
					content: "Los Angeles"
				}
			},
			"punta_arenas": {
				latitude: -53.163833,
				longitude: -70.917068,
				tooltip: {
					content: "Punta Arenas"
				}
			},
			"aukland": {
				latitude: -36.84846,
				longitude: 174.763332,
				tooltip: {
					content: "Aukland"
				}
			},
			"kiruna": {
				latitude: 67.855737,
				longitude: 20.225231,
				tooltip: {
					content: "Kiruna"
				}
			},
			"reykjavik": {
				latitude: 64.135338,
				longitude: -21.89521,
				tooltip: {
					content: "Reykjavík"
				}
			},
			"alert": {
				latitude: 82.516305,
				longitude: -62.308482,
				tooltip: {
					content: "Alert"
				}
			},
			"wales": {
				latitude: 65.609167,
				longitude: -168.0875,
				tooltip: {
					content: "Wales"
				}
			},
			"tiksi": {
				latitude: 71.625094,
				longitude: 128.872883,
				tooltip: {
					content: "Tiksi"
				}
			},
			"pretoria": {
				latitude: -25.746019,
				longitude: 28.18712,
				tooltip: {
					content: "Pretoria"
				}
			},
			"india": {
				latitude: 20.5937,
				longitude: 78.9629,
				tooltip: {
					content: "India"
				}
			}
		};

		var getElemID = function(elem) {
			// Show element ID
			return $(elem.node).attr("data-id");
		};

		$(".mapcontainer_equi").mapael({
			map: {
				name: "world_countries",
				defaultArea: {
					tooltip: {
						content: getElemID
					}
				}
			},
			plots: test_plots
		});

		$(".mapcontainer_merc").mapael({
			map: {
				name: "world_countries_mercator",
				defaultArea: {
					tooltip: {
						content: getElemID
					}
				}
			},
			plots: test_plots
		});

		$(".mapcontainer_miller").mapael({
			map: {
				name: "world_countries_miller",
				defaultArea: {
					tooltip: {
						content: getElemID
					}
				},
				defaultPlot: {
					size: 9
				}
			},
			plots: test_plots
		});
	});
}

function comingsoonInt() {
    "use strict";


    // Set the date we're counting down to
    var countDownDate = new Date("Dec 24, 2017 15:37:25").getTime();
   
    var x = setInterval(function() {

      
        var now = new Date().getTime();    
        var distance = countDownDate - now;
        
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        
        document.getElementById("days").innerHTML = days;

        document.getElementById("hours").innerHTML = hours;

        document.getElementById("seconds").innerHTML = seconds;

        document.getElementById("minutes").innerHTML = minutes;


    }, 1000);

}
/*
*****************************************************
*	END OF THE JS 									*
*	DOCUMENT                       					*
*****************************************************
*/
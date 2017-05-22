
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Multi-page template</title>
<!-- 	<link rel="stylesheet" href="../css/themes/default/jquery.mobile-1.4.2.min.css">
	<link rel="stylesheet" href="../_assets/css/jqm-demos.css"> -->
	<link rel="shortcut icon" href="../favicon.ico">
	<!-- <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" /> -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <!-- <script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->
    <script src="/bower_components/jquery-swipetouch/jquery.swipetouch.min.js"></script>
    <script src="/bower_components/jquery/jquery.slideandswipe.js"></script>
    <style type="text/css">
/*    	.box{
    		height: 20rem;
    		background-color: #e0e0e0;
    	}

    	.ui-dialog-contain {
		    width: 100%; 
		    max-width: 100%; 
		    margin: 0% auto 0em; 
		    padding: 0; 
		    position: static; 
		    top: 0em; 
		}*/

		body,
		html {
		  height: 100%;
		  margin: 0;
		  overflow: hidden;
		  font-family: helvetica;
		  font-weight: 100;
		}

		h1{
			margin: 0;
			padding: 0;
		}

		.container {
		  position: relative;
		  height: 100%;
		  width: 100%;
		  left: 0;
		}

		/*.container.open-sidebar { left: 240px; }*/

		.swipe-area {
/*		  position: absolute;
		  width: 50px;
		  left: 0;
		  top: 0;
		  height: 100%;
		  background: #f3f3f3;
		  z-index: 2;*/

		     position: absolute;
		    /* width: 100%; */
		    left: 0;
		    top: 0;
		    height: 100%;
		    background: #f3f3f3;
		    /* z-index: 2; */
		    width: 100%;
		    height: 100%;
		    /*padding: 10px;*/
		    box-sizing: border-box;
		    -moz-box-sizing: border-box;
		    background-color: #000;
		}

		#sidebar {
		    background: #DF314D;
		    position: absolute;
		    width: 240px;
		    height: 100%;
		    bottom: -100%;
		    /*margin-left: 49px;*/
		    z-index: 2;
		    box-sizing: border-box;
		    -webkit-transition: bottom 1s ease-in-out;
		    -moz-transition: bottom 1s ease-in-out;
		    -ms-transition: bottom 1s ease-in-out;
		    -o-transition: bottom 1s ease-in-out;
		    transition: bottom 1s ease-in-out;
		}

		#sidebar ul {
		  margin: 0;
		  padding: 0;
		  list-style: none;
		}

		#sidebar ul li { margin: 0; }

		#sidebar ul li a {
		  padding: 15px 20px;
		  font-size: 16px;
		  font-weight: 100;
		  color: white;
		  text-decoration: none;
		  display: block;
		  border-bottom: 1px solid #C9223D;
		  -webkit-transition: background 3s ease-in-out;
		  -moz-transition: background 3s ease-in-out;
		  -ms-transition: background 3s ease-in-out;
		  -o-transition: background 3s ease-in-out;
		  transition: background 3s ease-in-out;
		}

		#sidebar ul li:hover a { background: #C9223D; }

		/*.main-content {
		  width: 100%;
		  height: 100%;
		  padding: 10px;
		  box-sizing: border-box;
		  -moz-box-sizing: border-box;
		  position: relative;
		}*/

		.content {
		  box-sizing: border-box;
		  -moz-box-sizing: border-box;
		  /*padding-left: 60px;*/
		  width: 100%;
		  height: 100%;
		  background-color:#fff; 
		}

		 .content h1 { font-weight: 100; }

		 .content p {
		  width: 100%;
		  line-height: 160%;
		}

		 #sidebar-toggle {
		    background: #DF314D;
		    border-radius: 3px;
		    display: block;
		    position: absolute;
		    padding: 10px 7px;
		    /*float: left;*/
		    z-index: 2;
		    bottom: 2.5rem;
		    /* align-items: center; */
		    margin-left: 50%;
		    /* padding-left: 18px; */
		    margin-left: auto;
		    margin-right: auto;
		    left: 0;
		    right: 0;
		    width: 18px;
		}

		 #sidebar-toggle .bar {
		  display: block;
		  width: 18px;
		  margin-bottom: 3px;
		  height: 2px;
		  background-color: #fff;
		  border-radius: 1px;


		}

		.nav-toggle .bar {
		  display: block;
		  width: 18px;
		  margin-bottom: 3px;
		  height: 2px;
		  background-color: #fff;
		  border-radius: 1px;
		}

		 #sidebar-toggle .bar:last-child { margin-bottom: 0; }
		 #nav-toggle .bar:last-child { margin-bottom: 0; }

		.container.open-sidebar #sidebar {
		    bottom: -0px;
		    /*margin-left: 49px;*/
		}

		.c-mask {
		    z-index: 1;
		    top: 0;
		    left: 0;
		    width: 0;
		    height: 0;
		    background-color: #000;
		    opacity: 0;
		    /*margin-left: 49px;*/
		    -webkit-transition: opacity .3s,width 0s .3s,height 0s .3s;
		    transition: opacity .3s,width 0s .3s,height 0s .3s;
		    position: absolute;
		}

		.content.swipped{
			opacity: 0.1;
		    -webkit-transition: opacity 1.5s;
		    transition: opacity 1.5s;
		}

		/*.content 
		.is-active {
		    width: 100%;
		    height: 100%;
		    opacity: .8;
		    -webkit-transition: opacity 1.5s;
		    transition: opacity 1.5s;
		}*/
		/* navigation */
		nav {
		    height: 100%;
		    width: 100%;
		    background-color: #0a4a3c;
		    left: 0;
		    top: 0;
		    z-index: 2;
		    position: fixed;
		    overflow-y: auto;
		    overflow-x: visible;
		    transform: translate(-100%,0);
		}
		/* overlay layer */
		.ssm-overlay {
		    position: fixed;
		    top: 0;
		    right: 0;
		    bottom: 0;
		    left: 0;
		    background-color: rgba(0,0,0,0.2);
		    display: none;
		    z-index: 1;
		}

		/* prevent scroll when nav is open */
		.is-navOpen{
		  overflow: hidden;
		}

		.nav-toggle{
		    background: #DF314D;
		    border-radius: 3px;
		    display: block;
		    position: absolute;
		    padding: 10px 7px;
		    /*float: left;*/
		    z-index: 2;
		    bottom: 0rem;
		    /* align-items: center; */
		    margin-left: 50%;
		    /* padding-left: 18px; */
		    margin-left: auto;
		    margin-right: auto;
		    left: 0;
		    right: 0;
		    width: 18px;
		}
	</style>
      </head>

      <body>
      <div class="container">
        <div id="sidebar">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
          </ul>
          <h1>Touch Swipeable Sidebar Menu Demo</h1>

	            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br><br>
	        <h1>Touch Swipeable Sidebar Menu Demo</h1>

	            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br><br>
	        <h1>Touch Swipeable Sidebar Menu Demo</h1>

	            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br><br>
	        <h1>Touch Swipeable Sidebar Menu Demo</h1>

	            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br><br>
        </div>
        <nav class="open-nav">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">About</a></li>
          </ul>
          <h1>Touch Swipeable Sidebar Menu Demo</h1>

	            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br><br>
	        <h1>Touch Swipeable Sidebar Menu Demo</h1>

	            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br><br>
	        <h1>Touch Swipeable Sidebar Menu Demo</h1>

	            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br><br>
	        <h1>Touch Swipeable Sidebar Menu Demo</h1>

	            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br><br>
        </nav>

        <div class="swipe-area">
          <!-- <div class="swipe-area"></div> -->

          
            <div class="content">
	            <h1>Touch Swipeable Sidebar Menu Demo</h1>

	            <p>"Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p><br><br>

            	<a class="ssm-toggle-nav" href="#" title="Open / close">Open / close</a>
            </div>
            <a href="#" data-toggle=".container" id="sidebar-toggle"> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </a>
            <a class="ssm-toggle-nav nav-toggle "> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </a>
        </div>
        <!-- <div id="c-mask" class="c-mask"></div> -->
        <div class="ssm-overlay ssm-toggle-nav"></div>
      </div>
<!--       <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>  -->
      	<script>
		$(window).load(function(){
			$("[data-toggle]").click(function() {
			  var toggle_el = $(this).data("toggle");
			  $(toggle_el).toggleClass("open-sidebar");


			});
			$("#sidebar-toggle").click(function() {
			  var toggle_el = $(this).data("toggle");
			  $(toggle_el).toggleClass("is-active");

			});

			var nav = $(".open-nav");
			var navHeight = -nav.outerHeight();
			nav.css('-webkit-transform', '0,translate(' + navHeight + 'px)');

			// nav.css('transform', 'translate(0px, 0px)');

			// var nav = $(this); // get the element to swipe
			 $(".swipe-area").swipe({
			 		


			      	swipeStatus:function(event, phase, direction, distance, duration, fingers)
			        {
			        	var nav = $(".open-nav"); //$(this); // get the element to swipe
			            var navWidth = -nav.outerWidth();
			            var navHeight = -nav.outerHeight();
			            var transInitial = navWidth;
			            function isSafari() {
			                return /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);
			            }

			            function isChrome() {
			                return /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
			            }

			            // var showNavigation = (function() {
			            //     // nav.addClass('ssm-nav-visible');
			            //     scrollNav(0, settings.speed);
			            // });

			           

			              if (phase=="move" && direction =="up") {
			                   // $(".container").addClass("open-sidebar");
			                   
			                   
			                   nav.css('transition-duration', '0.3s'); //'transform', '0px, 0px'
			                   nav.css('transform', 'translate(0px, 0px)'); // transform: translate(0px, 0px)
			                   // nav.css('transition-duration', (duration / 1000).toFixed(1) + 's');
			                   	if(distance >= 0) {
				                    distance = 0;
				                }
				                if(distance <= navWidth) {
				                    distance = navWidth;
				                }
				                if(isSafari() || isChrome()) {
				                   nav.css('-webkit-transform', '0,translate(' + distance + 'px)');
				                }
				                else{
				                   nav.css('transform', '0,translate(' + distance + 'px)');
				                }

				                function scrollNav(distance, duration) {
					                nav.css('transition-duration', (duration / 1000).toFixed(1) + 's');

					                if(distance >= 0) {
					                    distance = 0;
					                }
					                if(distance <= navWidth) {
					                    distance = navWidth;
					                }
					                if(isSafari() || isChrome()) {
					                   nav.css('-webkit-transform', 'translate(' + distance + 'px,0)');
					                }
					                else{
					                   nav.css('transform', 'translate(' + distance + 'px,0)');
					                }
					               
					            }
					            // scrollNav(0, s);
					            $(".open-nav").addClass("ssm-nav-visible");


			                   // $(".content").addClass("swipped");
			                   return false;
			              }
			              if (phase=="move" && direction =="down") {
			                   // $(".container").removeClass("open-sidebar");
			                   $(".open-nav").removeClass("ssm-nav-visible");
			                   // $(".content").removeClass("swipped");
			                   return false;
			              }
			        }

			        // function scrollNav(distance, duration) {
		         //        nav.css('transition-duration', (duration / 1000).toFixed(1) + 's');

		         //        if(distance >= 0) {
		         //            distance = 0;
		         //        }
		         //        if(distance <= navWidth) {
		         //            distance = navWidth;
		         //        }
		         //        if(isSafari() || isChrome()) {
		         //           nav.css('-webkit-transform', 'translate(' + distance + 'px,0)');
		         //        }
		         //        else{
		         //           nav.css('transform', 'translate(' + distance + 'px,0)');
		         //        }
		         //        if(distance == '0') {
		         //            $('.ssm-toggle-nav').addClass('ssm-nav-visible');
		         //            $('html').addClass('is-navOpen');
		         //            $('.ssm-overlay').fadeIn();
		         //        }
		         //    }
			  }); 
		});
		</script>
		<script>
		    $(document).ready(function() {
		        $('nav').slideAndSwipe();
		    });
		</script>


</body>
</html>
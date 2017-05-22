@extends('tmpl.sc_public')

@section('_header')

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
		    background: #fff;
		    position: absolute;
		    width: 100%;
		    height: 100%;
		    bottom: -100%;
		    /*margin-left: 49px;*/
		    z-index: 3;
		    overflow: auto;
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
		    /* background: #DF314D; */
		    border-radius: 3px;
		    display: block;
		    position: absolute;
		    padding: 10px 7px;
		    /* float: left; */
		    z-index: 1;
		    bottom: 0.5rem;
		    /* align-items: center; */
		    margin-left: 50%;
		    /* padding-left: 18px; */
		    margin-left: auto;
		    margin-right: auto;
		    left: 0;
		    right: 0;
		    width: 100px;
		    text-align: center;
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
/*		nav {
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
		}*/
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

		.back_page{
		    margin-top: 3.5rem;
		    width: 30%;
		    height: 100%;
		    max-height: 100%;
		    margin: 0;
		    padding: 0;
		    background-size: 100% 100%;
		    background-repeat: no-repeat;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    -webkit-background-size: cover;
		    background-size: cover;
		    background-repeat: no-repeat;
		    background-position: center center;
		    position: absolute;
		    left: 0rem;
		    z-index: 1;
		    text-align: center;
		    height: 100%;
		    -webkit-transform: translate3d(0, 0, 0);
		    /*border: 1px solid red;*/
		    /*margin-top: 3.5rem;*/
		}

		.next_page{
		    /*margin-top: 3.5rem;*/
		    width: 70%;
		    height: 100%;
		    max-height: 100%;
		    margin: 0;
		    padding: 0;
		    background-size: 100% 100%;
		    background-repeat: no-repeat;
		    -moz-background-size: cover;
		    -o-background-size: cover;
		    -webkit-background-size: cover;
		    background-size: cover;
		    background-repeat: no-repeat;
		    background-position: center center;
		    position: absolute;
		    right: 0rem;
		    z-index: 1;
		    text-align: center;
		    height: 100%;
		    -webkit-transform: translate3d(0, 0, 0);
		    /*border: 1px solid blue;*/
		    /*margin-top: 3.5rem;*/
		}
	</style>
      </head>
@stop
@section('content') 
      <body>
      <div class="container">
        <div id="sidebar" style="margin-left: 0px">
        	<div class="row">
	        	<div class="columns small-12 large-8 blog_section">
	                <h1 class="post_title">{{ $post->post_name }}</h1>
	                <article class="post_header">
	                    <div class="columns small-12 medium-6 ">
	                        <p class="post_author">{{ $post->author }}</p>
	                    </div>
	                    <div class="columns small-12 medium-6 ">
	                        <p class="post_time">{{ $post->read_time }}min read</p>
	                    </div>
	                </article>
	                <article class="post_content">
	                    <p class="post_text">{{ $post->blurb }} </p>
	                    @if($no_video == 0)
	                        <div class="video-container">
	                            <iframe width="560" height="315" src="{{ $post->video_link }}" frameborder="0" allowfullscreen></iframe>  
	                        </div>
	                    @endif
	                    @if($post_array != 'luke')
	                        <?php $x = 0; ?>
	                    
	                        @foreach($post_array as $id => $pt) 
	                     
	                            @if($pt["section"] != "LINK")
	                                @if($pt["section"] == "HEADER")
	                                    <h2 class="heading_text">{{ $pt['description'] }} </h2>
	                                @elseif($pt["section"] == "PROMO")
	                                    <p class="promo_text">{{ $pt['description'] }} </p>
	                                @else
	                                    <p class="post_text">{{ $pt['description'] }} </p>
	                                @endif
	                            @else
	                                <a class="promo_link" href="{{ $pt['link'] }}">{{ $pt['description'] }}</a>
	                            @endif
	                         
	                        <?php $x++; ?>  
	                        @endforeach
	                    @endif
	                </article>
	                @if($image_count >= 2)
	                <section class="post_images">
	                    <h2 class="heading_text">IMAGES</h2>
	                    @foreach($images_array as $exImages)
	                        <!-- <p class="post_text">{{ $exImages['file_name'] }} </p><br> -->
	                        <img src="/images/uploads/small/{{$exImages['file_name']}}">
	                    @endforeach
	                </section>

	                @endif
	                <hr/>
	            </div>
	            <div class="columns small-12 large-4 promo_section">
	                @foreach($ppost_array as $id => $pp)
	                    <div class="promo_content_box">
	                        <a href="/getfedup/{{ $pp['url'] }}">
	                            <img src="/images/uploads/small/{{$pp['image']}}">

	                            <h4 class="promo_post_title">{{$pp['title']}}</h4>
	                            <div class="columns small-6 post_links">
	                                <a href="/getfedup/tag/{{ $pp['hashtag'] }}" class="hashtag_link">#{{$pp['hashtag']}}</a>
	                                
	                            </div>
	                            <div class="columns small-6 post_link_tag">
	                                <a href="/getfedup/{{ $pp['url'] }}" class="span_link">-> Read Now</a> 
	                            </div>
	                        </a>   
	                    </div> 
	                    <hr/>
	                    
	                @endforeach
	            </div>
	            <div class="social_footer">
			        <div class="row">
			            <div class="columns small-12 medium-12 large-3">
			                <p class="blog_post_title">SAY HELLO</p>
			                <div class="button_wrapper">
			                    <a class="public_button" href="mailto:eat@fedupproject.com.au">Email Us</a>  
			                </div>
			                
			            </div>
			            <div class="columns small-12 medium-12 large-9">
			                <div class="row no_row">
			                    <div class="columns small-12 medium-6 large-3">
			                        <a href="https://www.facebook.com/fedupproject/">
			                            <img id="over" class="media__icon" src="/images/site/facebook.png" alt="Chat  to us today on Facebook"/>
			                            <p>Discuss the latest with us & Fedup Followers</p>
			                        </a>
			                    </div>
			                    <div class="columns small-12 medium-6 large-3">
			                        <a target="_blank" href="https://www.instagram.com/fedupproject"> 
			                            <img id="over" class="media__icon" src="/images/site/insta.png" alt="The prettiest things we do are here"/> 
			                            <p>Stylish photos & interactive stories</p>
			                        </a>
			                    </div> 
			                </div>
			                <div class="row no_row">
			                    <div class="columns small-12 medium-6 large-3">
			                        <a href="https://www.youtube.com/">
			                            <img id="over" class="media__icon" src="/images/site/youtube.png" alt="Still working on youtube, live cooking classes are coming soon"/>
			                            <p>Cooking classes & Collaborative Interviews</p>
			                        </a>
			                    </div>
			                    <div class="columns small-12 medium-6 large-3 end">
			                        <a target="_blank" href="https://www.snapchat.com/add/fedupproject"> 
			                            <img id="over" class="media__icon" src="/images/site/snapchat.png" alt="Where we share our personal journey"/> 
			                            <p>Day to day life of the Fed Up Project adventure</p>
			                        </a>
			                    </div> 
			                </div>
			            </div>
			        </div>
		        
		    	</div>
        	</div>
            	
        </div>
        <a href="/{{ $pre_post_url }}" class="back_page"></a>
        <a href="/{{ $next_post_url }}" class="next_page"></a> 
        <div class="swipe-area">
          <!-- <div class="swipe-area"></div> -->
          	
          
            <div class="content">	           

	            <img class="m_top_image" src="/images/uploads/phone/large/{{ $vertical_image->file_name }}" style="">

	           
            	<!-- <a class="ssm-toggle-nav" href="#" title="Open / close">Open / close</a> -->
            </div>

            <a href="#" data-toggle=".container" id="sidebar-toggle">
            	<img class="arrow" src="/images/site/arrow.png">
            	<p class="read_more">READ</p>
            </a>
            <!-- <a class="ssm-toggle-nav nav-toggle "> <span class="bar"></span> <span class="bar"></span> <span class="bar"></span> </a> -->
        </div>
        <!-- <div id="c-mask" class="c-mask"></div> -->
        <!-- <div class="ssm-overlay ssm-toggle-nav"></div> -->
      </div>
<!--       <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>  -->
      	<script>
		$(window).load(function(){
			$("[data-toggle]").click(function() {
				var sidebar = document.querySelector("#sidebar");
				sidebar.style.bottom = "";
				sidebar.style.marginLeft = "";
			  	var toggle_el = $(this).data("toggle");
			  	$(toggle_el).toggleClass("open-sidebar");


			});
			// $("#sidebar-toggle").click(function() {
			//   var toggle_el = $(this).data("toggle");
			//   $(toggle_el).toggleClass("is-active");

			// });
////
			// var nav = $(".open-nav");
			// var navHeight = -nav.outerHeight();
			// nav.css('-webkit-transform', '0,translate(' + navHeight + 'px)');

			// nav.css('transform', 'translate(0px, 0px)');

			// var nav = $(this); // get the element to swipe
			$(".swipe-area").swipe({

	              swipeStatus:function(event, phase, direction, distance, duration, fingers)
	                  {
	                      if (phase=="move" && direction =="up") {
	                      		var sidebar = document.querySelector("#sidebar");
	                      		sidebar.style.bottom = "";
							    sidebar.style.marginLeft = "";
							    sidebar.style.marginRight = "";
	                           	$(".container").addClass("open-sidebar");
	                           	// $(".c-mask").addClass("is-active");
	                           	$(".content").addClass("swipped");
	                           	return false;
	                      }
	                      // if (phase=="move" && direction =="down") {
	                      //      	$(".container").removeClass("open-sidebar");
	                      //      	// $(".c-mask").removeClass("is-active");
	                      //      	$(".content").removeClass("swipped");
	                      //      	return false;
	                      // }
	                  }
	        });

	        $("a").swipe({
	        	excludedElements: "label, button, input, select, textarea, .noSwipe",
					swipeStatus:function(event, phase, direction, distance, duration, fingers)
					{
					if (phase=="move" && direction =="up") {
							var sidebar = document.querySelector("#sidebar");
							sidebar.style.bottom = "";
					    sidebar.style.marginLeft = "";
					    sidebar.style.marginRight = "";
					   	$(".container").addClass("open-sidebar");
					   	// $(".c-mask").addClass("is-active");
					   	$(".content").addClass("swipped");
					   	return false;
					}
					// if (phase=="move" && direction =="down") {
					//      	$(".container").removeClass("open-sidebar");
					//      	// $(".c-mask").removeClass("is-active");
					//      	$(".content").removeClass("swipped");
					//      	return false;
					// }
					}
	        }, function(){
	            $(".content").removeClass('swipped');
	            //....and whatever else you need to do
	    	}, 3000); 
			// });

			$("#sidebar").swipe({
				
				swipeStatus:function(event, phase, direction, distance, duration, fingers)
					{
					console.log(direction);
					if (phase=="move" && direction =="left") {
					   	// var sidebar = document.querySelector("#sidebar");
					   	swipeMeLeft();
					   	return false;
					}
					// if (phase=="move" && direction =="right") {
					// 	swipeMeRight();
					//    	// $(".container").removeClass("open-sidebar");
					//    	// // $(".c-mask").removeClass("is-active");
					//    	$(".content").removeClass("swipped");
					//    	return false;
					// }
				},
				threshold:2000,
	          }); 
			});

			function swipeMeLeft(){
				console.log("hack left");
					$(".content").removeClass("swipped");
			        $("#sidebar").animate({
			    	marginLeft: '-=100%',
			    	bottom: '-=100%',
				}, 500, function(){

					var sidebar = document.querySelector("#sidebar");
					$(".container").removeClass("open-sidebar");
					// $(".c-mask").addClass("is-active");
					
					

				});
			}

			// function swipeMeRight(){
			// 	console.log("hack right");
			// 		// $(".content").removeClass("swipped");
			//         $("#sidebar").animate({
			//     	marginLeft: '=100px',
			//     	// bottom: '-=100%',
			// 	}, 500, function(){

			// 		var sidebar = document.querySelector("#sidebar");
			// 		// $(".container").removeClass("open-sidebar");
			// 		// $(".c-mask").addClass("is-active");
					
					

			// 	});
			// }

		</script>
	<!-- 	<script>
		    $(document).ready(function() {
		        $('nav').slideAndSwipe();
		    });
		</script> -->


</body>
@stop

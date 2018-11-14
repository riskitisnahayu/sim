<!DOCTYPE HTML>
 <html>
    <head>
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta charset="utf-8">
        <!-- Description, Keywords and Author -->
        <meta name="description" content="">
        <meta name="author" content="">
        <title>:: avana LLC ::</title>
		<link rel="shortcut icon" href="{!! asset('assets/images/favicon.ico') !!}" type="image/x-icon">

        <!-- style -->
        <link href="{!! asset('assets/css/style.css') !!}" rel="stylesheet" type="text/css">
        <!-- style -->

        <!-- bootstrap -->
        <link href="{!! asset('assets/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css">

        <!-- responsive -->
        <link href="{!! asset('assets/css/responsive.css') !!}" rel="stylesheet" type="text/css">

        <!-- font-awesome -->
        <link href="{!! asset('assets/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css">
        <!-- font-awesome -->

        <link href="{!! asset('assets/css/effects/set2.css') !!}" rel="stylesheet" type="text/css">
        <link href="{!! asset('assets/css/effects/normalize.css') !!}" rel="stylesheet" type="text/css">
        <link href="{!! asset('assets/css/effects/component.css') !!}"  rel="stylesheet" type="text/css" >
	</head>
    <body>

    	<!-- header -->
    	<header role="header">
        	<div class="container">
            	<!-- logo -->
            	<h1>
                	<a href="index.html" title="avana LLC"><img src="{!! asset('assets/images/logo.png') !!}" title="avana LLC" alt="avana LLC"/></a>
                </h1>
                <!-- logo -->

                <!-- nav -->
                <nav role="header-nav" class="navy">
                    <ul>
                        <li class="nav-active"><a href="index.html" title="Work">Work</a></li>
                        <li><a href="about.html" title="About">About</a></li>
                        <li><a href="blog.html" title="Blog">Blog</a></li>
                        <li><a href="contact.html" title="Contact">Contact</a></li>
                    </ul>
                </nav>
                <!-- nav -->
            </div>
        </header>
        <!-- header -->

            @yield('content')

        <!-- footer -->
        <footer role="footer">
            <!-- logo -->
            {{-- <h1>
                <a href="index.html" title="avana LLC"><img src="{!! asset('assets/images/logo.png') !!}" title="avana LLC" alt="avana LLC"/></a>
            </h1> --}}
            <!-- logo -->

            <!-- nav -->
            {{-- <nav role="footer-nav">
                <ul>
                    <li><a href="index.html" title="Work">Work</a></li>
                    <li><a href="about.html" title="About">About</a></li>
                    <li><a href="blog.html" title="Blog">Blog</a></li>
                    <li><a href="contact.html" title="Contact">Contact</a></li>
                </ul>
            </nav> --}}
            <!-- nav -->

            {{-- <ul role="social-icons">
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-flickr" aria-hidden="true"></i></a></li>
            </ul> --}}

            <p class="copy-right">&copy; 2018 . All rights Reserved</p>
        </footer>
        <!-- footer -->



        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{!! asset('assets/js/jquery.min.js') !!}" type="text/javascript"></script>
        <!-- custom -->
        <script src="{!! asset('assets/js/nav.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('assets/js/custom.js') !!}" type="text/javascript"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{!! asset('assets/js/bootstrap.min.js') !!}" type="text/javascript"></script>
        <script src="{!! asset('assets/js/effects/masonry.pkgd.min.js') !!}"  type="text/javascript"></script>
        <script src="{!! asset('assets/js/effects/imagesloaded.js') !!}"  type="text/javascript"></script>
        <script src="{!! asset('assets/js/effects/classie.js') !!}"  type="text/javascript"></script>
        <script src="{!! asset('assets/js/effects/AnimOnScroll.js') !!}"  type="text/javascript"></script>
        <script src="{!! asset('assets/js/effects/modernizr.custom.js') !!}"></script>
        <!-- jquery.countdown -->
        <script src="{!! asset('assets/js/html5shiv.js') !!}" type="text/javascript"></script>
    </body>
</html>

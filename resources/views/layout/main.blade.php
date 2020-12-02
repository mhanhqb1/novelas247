<?php
$topImage = !empty($pageImage) ? $pageImage : url('/') . '/imgs/1.jpg';
$jumbotronImage = url('/') . '/imgs/1.jpg';
$_siteName = 'Novelas369.Com';
$_siteTitle = !empty($pageTitle) ? $pageTitle : 'Novelas369';
$_siteDescription = 'Novelas';
?>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="$_siteDescription">
        <meta name="author" content="{{ $_siteName }}">

        <title>{{ $_siteTitle }}</title>

        <meta property="og:site_name" content="{{ $_siteName }}">
        <meta property="og:image" content="{{ $topImage }}">
        <meta property="og:description" content="{{ $_siteDescription }}">
        <meta property="og:url" content="{{ url()->full() }}">
        <meta property="og:title" content="{{ $_siteTitle }}">
        <meta property="og:type" content="article">
        <meta name="twitter:title" content="{{ $_siteTitle }}">
        <meta name="twitter:description" content="{{ $_siteDescription }}">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Custom styles for this template -->
        <link href="{{ asset('/css/custom.css').'?'.time() }}" rel="stylesheet">

        <?php if (!empty(config('services.google')['ga_key'])): ?>
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google')['ga_key'] }}"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());

                gtag('config', "<?php echo config('services.google')['ga_key']; ?>");
            </script>
        <?php endif; ?>

        <?php if (!empty(config('services.facebook')['pixel_id'])): ?>
            <!-- Facebook Pixel Code -->
            <script>
                !function (f, b, e, v, n, t, s)
                {
                    if (f.fbq)
                        return;
                    n = f.fbq = function () {
                        n.callMethod ?
                                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq)
                        f._fbq = n;
                    n.push = n;
                    n.loaded = !0;
                    n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e);
                    t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                }(window, document, 'script',
                        'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', "{{ config('services.facebook')['pixel)id'] }}");
                fbq('track', 'PageView');
            </script>
            <noscript>
            <img height="1" width="1" 
                 src="https://www.facebook.com/tr?id={{ config('services.facebook')['pixel)id'] }}&ev=PageView
                 &noscript=1"/>
            </noscript>
            <!-- End Facebook Pixel Code -->
        <?php endif; ?>
</head>

<body class="bg-gray-900">
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v9.0&appId=245530479242476&autoLogAppEvents=1" nonce="tRcnz9VF"></script>

    <div class="container-fluid">
        <header class="blog-header py-3 container">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col text-center text-bold">
                    <a class="blog-header-logo" href="{{ url('/') }}">{{ $_siteName }}</a>
                </div>
            </div>
        </header>

        <div class="container-fluid border-bottom">
<!--            <div class="nav-scroller py-1 mb-2 container">
                <nav class="nav d-flex justify-content-between">
                    <a class="p-2 text-center" href="{{ url('/') }}">Home</a>
                    <a class="p-2 text-center" href="{{ url('/images') }}">Images</a>
                    <a class="p-2 text-center" href="{{ url('/videos') }}">Videos</a>
                    <a class="p-2 text-center" href="{{ url('/movies') }}">Movies</a>
                </nav>
            </div>-->
        </div>
        
    </div>

    <main role="main" class="container">
        @yield('content')
    </main><!-- /.container -->

    <footer class="blog-footer">
        <p>© 2020 <a href="{{ url('') }}">{{ $_siteName }}</a>. All right reserved.</p>
        <p>
            <a href="#">Back to top</a>
        </p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

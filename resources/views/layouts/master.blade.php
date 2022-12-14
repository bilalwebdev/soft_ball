<!DOCTYPE html>
<html lang="en-us">

<head>

    @include('layouts.head')
</head>

<body class="tm-isblog">

    <div class="preloader">
        <div class="loader"></div>
    </div>


    <div class="over-wrap">
        @include('layouts.nav-header')

        @yield('content')

        <div class="bottom-wrapper">
            <div class="tm-bottom-f-box  ">
                <div class="uk-container uk-container-center">
                    <section id="tm-bottom-f" class="tm-bottom-f uk-grid"
                        data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                        <div class="uk-width-1-1">
                            <div class="uk-panel">
                                <div class="footer-logo">
                                    <a href="/"><img src="images/footer-logo-img.png"
                                            alt=""><span>Soft</span> Ball</a>
                                </div>
                                <div class="footer-socials">
                                    <div class="social-top">
                                        <a href="#"><span
                                                class="uk-icon-small uk-icon-hover uk-icon-facebook"></span></a>
                                        <a href="#"><span
                                                class="uk-icon-small uk-icon-hover uk-icon-twitter"></span></a>
                                        <a href="#"><span
                                                class="uk-icon-small uk-icon-hover uk-icon-google"></span></a>
                                        <a href="#"><span
                                                class="uk-icon-small uk-icon-hover uk-icon-pinterest"></span></a>
                                        <a href="#"><span
                                                class="uk-icon-small uk-icon-hover uk-icon-youtube"></span></a>
                                        <a href="#"><span
                                                class="uk-icon-small uk-icon-hover uk-icon-instagram"></span></a>
                                        <a href="#"><span
                                                class="uk-icon-small uk-icon-hover uk-icon-flickr"></span></a>
                                    </div>
                                </div>
                                <div class="clear"></div>

                                <p class="footer-about-text">
                                    Cras convallis feugiat felis eget venenatis. Sed leo tellus, luctus eget ante quis,
                                    rutrum dignissim enim. Morbi efficitur tellus non mauris tincidunt feugiat.
                                    Vestibulum quis nunc in nibh eleifend convallis. Vestibulum nec viverra dui.
                                    Suspendisse vel neque eros. Donec tincidunt tempus massa sed vehicula. Integer
                                    ullamcorper at elit eu commodo.
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>



            <footer id="tm-footer" class="tm-footer">


                <div class="uk-panel">
                    <div class="uk-container uk-container-center">
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="footer-wrap">
                                    <div class="foot-menu-wrap">
                                        {{-- <ul class="nav menu">
                                            <li class="item-165"><a href="about.html">About</a>
                                            </li>
                                            <li class="item-166"><a href="players.html">Players</a>
                                            </li>
                                            <li class="item-167"><a href="match-list.html">Match</a>
                                            </li>
                                            <li class="item-168"><a href="results.html">Results</a>
                                            </li>
                                            <li class="item-169"><a href="news.html">News</a>
                                            </li>
                                        </ul> --}}
                                    </div>
                                    <div class="copyrights">Copyright © {{ date('Y') }} <a href="/">Softball</a>. All
                                        Rights Reserved.</div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

        </div>
    </div>



    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/uikit.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/SimpleCounter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/components/grid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/components/slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/components/slideshow.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/components/slideset.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/components/sticky.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/components/lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/isotope.pkgd.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/theme.js') }}"></script>
    <script type="text/javascript">
        new SimpleCounter("countdown4", 1447448400, {
            'continue': 0,
            format: '{D} {H} {M} {S}',
            lang: {
                d: {
                    single: 'day',
                    plural: 'days'
                }, //days
                h: {
                    single: 'hr',
                    plural: 'hrs'
                }, //hours
                m: {
                    single: 'min',
                    plural: 'min'
                }, //minutes
                s: {
                    single: 'sec',
                    plural: 'sec'
                } //seconds
            },
            formats: {
                full: "<span class='countdown_number' style='color:  '>{number} </span> <span class='countdown_word' style='color:  '>{word}</span> <span class='countdown_separator'>:</span>", //Format for full units representation
                shrt: "<span class='countdown_number' style='color:  '>{number} </span>" //Format for short unit representation
            }
        });
    </script>

</body>

</html>

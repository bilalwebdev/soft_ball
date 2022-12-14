<div class="toolbar-wrap">
    <div class="uk-container uk-container-center">
        <div class="tm-toolbar uk-clearfix uk-hidden-small">


            <div class="uk-float-right">
                <div class="uk-panel">
                    <div class="social-top">
                        <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-facebook"></span></a>
                        <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-twitter"></span></a>
                        <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-google"></span></a>
                        <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-pinterest"></span></a>
                        <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-youtube"></span></a>
                        <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-instagram"></span></a>
                        <a href="#"><span class="uk-icon-small uk-icon-hover uk-icon-flickr"></span></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="tm-menu-box">

    <div style="height: 70px;" class="uk-sticky-placeholder">
        <nav style="margin: 0px;" class="tm-navbar uk-navbar" data-uk-sticky="">
            <div class="uk-container uk-container-center">
                <a class="tm-logo uk-float-left" href="/">
                    <img src="{{ asset('images/logo-img.png') }}" alt="logo" title="logo"> <span>Soft<em> Ball</em></span>
                </a>

                <ul class="uk-navbar-nav uk-hidden-small">

                    <li class="uk-active" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true"
                        aria-expanded="false"><a href="/">Home</a></li>
                    <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true"
                        aria-expanded="false"><a href="#_">Teams</a>
                        <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                            <div class="uk-grid uk-dropdown-grid">
                                <div class="uk-width-1-1">
                                    <ul class="uk-nav uk-nav-navbar">
                                        @foreach ($teams as $team)
                                            <li>
                                                <a class="yellow-scheme" href="{{ route('show.team', $team->slug) }}">
                                                    {{ $team->title }}
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>

                </ul>
                <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
            </div>
        </nav>
    </div>

</div>

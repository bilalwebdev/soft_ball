@extends('layouts.master')
@section('content')
    @include('home.components.slider')


    @if ($latest_game)
        <div class="tm-top-b-box tm-full-width  ">
            <div class="uk-container uk-container-center">
                <section id="tm-top-b" class="tm-top-b uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}"
                    data-uk-grid-margin="">

                    <div class="uk-width-1-1">
                        <div class="uk-panel">

                            <div class="va-latest-wrap">
                                <div class="uk-container uk-container-center">
                                    <div class="va-latest-top">
                                        <h3>Latest <span>Results</span></h3>
                                        <div class="tournament">
                                            <address>{{ $latest_game->tournament->title }}<br><br></address>
                                        </div>
                                        <div class="date">
                                            {{ \Carbon\Carbon::parse($latest_game->date)->toFormattedDateString() }} |
                                            {{ \Carbon\Carbon::parse($latest_game->time)->format('h:i:s A') }} </div>
                                    </div>
                                </div>
                                <div class="va-latest-middle uk-flex uk-flex-middle">
                                    <div class="uk-container uk-container-center">
                                        <div class="uk-grid uk-flex uk-flex-middle">
                                            <div class="uk-width-2-12 center">

                                            </div>
                                            <div class="uk-width-3-12 name uk-vertical-align">
                                                <div class="wrap uk-vertical-align-middle">
                                                    {{ $latest_game->team->title }} </div>
                                            </div>
                                            <div class="uk-width-2-12 score">
                                                <div class="title">score</div>
                                                <div class="table">
                                                    <div class="left"> {{ $latest_game->our_score }}</div>
                                                    <div class="right"> {{ $latest_game->opponent_score }}</div>
                                                    <div class="uk-clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="uk-width-3-12 name alt uk-vertical-align">
                                                <div class="wrap uk-vertical-align-middle">
                                                    {{ $latest_game->opponent_name }} </div>
                                            </div>
                                            <div class="uk-width-2-12 center">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="uk-container uk-container-center">
                                    <div class="va-latest-bottom">
                                        <div class="uk-grid">
                                            <div class="uk-width-8-12 uk-container-center text">

                                            </div>
                                        </div>

                                        <div class="uk-grid">
                                            <div class="uk-width-1-1">
                                                <div class="btn-wrap uk-container-center">
                                                    <a class="read-more"
                                                        href="{{ route('show.tournament', $latest_game->tournament->slug) }}">More
                                                        Info</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endif
    <div class="tm-top-e-box tm-full-width  va-main-next-match">
        <div class="uk-container uk-container-center">
            <section id="tm-top-e" class="tm-top-e uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}"
                data-uk-grid-margin="">

                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <div class="uk-container uk-container-center">
                            <div class="uk-grid uk-grid-collapse">
                                <div class="uk-width-medium-1-2 uk-width-small-1-1 va-single-next-match">
                                    <div class="va-main-next-wrap">
                                        <div class="main-next-match-title"><em>Next <span>Match</span></em>
                                        </div>
                                        @if (count($next_games)>0)
                                        <div class="match-list-single">
                                            <div class="match-list-item">
                                                <div class="count">

                                                    {{-- <div id="countdown4">
                                                        <div class="counter_container">
                                                        </div>
                                                    </div> --}}

                                                    <div class="clearfix"></div>

                                                </div>
                                                <div class="clear"></div>
                                                {{-- <div class="logo">
                                                    <a href="match-single.html">
                                                        <img src="images/team-ava.png" class="img-polaroid"
                                                            alt="England VS Amsterdam (2015-11-14)"
                                                            title="England VS Amsterdam (2015-11-14)">
                                                    </a>
                                                </div> --}}
                                                <div class="team-name">{{ $next_games[0]->team->title }} </div>
                                                <div class="versus">VS</div>

                                                <div class="team-name">{{ $next_games[0]->opponent_name }} </div>
                                                {{-- <div class="logo">
                                                    <a href="match-single.html">
                                                        <img src="images/team-ava1.png" class="img-polaroid"
                                                            alt="England VS Amsterdam (2015-11-14)"
                                                            title="England VS Amsterdam (2015-11-14)">
                                                    </a>
                                                </div> --}}
                                                <div class="clear"></div>
                                                <div class="date"> {{ \Carbon\Carbon::parse($next_games[0]->date)->toFormattedDateString() }} | {{ \Carbon\Carbon::parse($next_games[0]->time)->format('h:i:s A') }} </div>
                                                <div class="clear"></div>
                                                <div class="location">
                                                    <address>{{ $next_games[0]->tournament->location }}<br><br></address>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="uk-width-medium-1-2 uk-width-small-1-1 va-list-next-match">
                                    <div class="match-list-wrap">
                                        @foreach ($next_games as $ngame)
                                            <div class="match-list-item alt">
                                                <div class="date">{{ \Carbon\Carbon::parse($ngame->date)->toFormattedDateString() }} </div>
                                                <div class="wrapper">
                                                    {{-- <div class="logo">
                                                        <a href="match-single.html">
                                                            <img src="images/team-ava.png" class="img-polaroid"
                                                                alt="Cambridgehire VS china (2015-11-29)"
                                                                title="Cambridgehire VS china (2015-11-29)">
                                                        </a>
                                                    </div> --}}
                                                    <div class="team-name">{{ $ngame->team->title }} </div>
                                                    <div class="versus">VS</div>

                                                    <div class="team-name">{{ $ngame->opponent_name }} </div>
                                                    {{-- <div class="logo">
                                                        <a href="match-single.html">
                                                            <img src="images/team-ava1.png" class="img-polaroid"
                                                                alt="Cambridgehire VS china (2015-11-29)"
                                                                title="Cambridgehire VS china (2015-11-29)">
                                                        </a>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        @endforeach



                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>





    <div class="tm-bottom-e-box tm-full-width  ">
        <div class="uk-container uk-container-center">
            <section id="tm-bottom-e" class="tm-bottom-e uk-grid uk-grid-collapse"
                data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">

                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <div class="map-wrap">

                            <div class="contact-form-wrap uk-flex">
                                <div class="uk-container uk-container-center uk-flex-item-1">
                                    <div class="uk-grid  uk-grid-collapse uk-flex-item-1 uk-height-1-1 uk-nbfc">
                                        <div class="uk-width-5-10 contact-left uk-vertical-align contact-left-wrap">
                                            <div class="contact-info-lines uk-vertical-align-middle">
                                                <div class="item phone"><span class="icon"><i
                                                            class="uk-icon-phone"></i></span>(846)-356-9322</div>
                                                <div class="item mail"><span class="icon"><i
                                                            class="uk-icon-envelope"></i></span><a
                                                        href="mailto:support@torbara.com">support@torbara.com</a>

                                                </div>
                                                <div class="item location"><span class="icon"><i
                                                            class="uk-icon-map-marker"></i></span>9478 Chestnut
                                                    Street, Woodstock, GA 30188</div>
                                            </div>
                                        </div>
                                        <div class="uk-width-medium-5-10 uk-width-small-1-1 contact-right-wrap">
                                            <div class="contact-form uk-height-1-1">
                                                <div class="uk-position-cover uk-flex uk-flex-column uk-flex-center">
                                                    <div class="contact-form-title">
                                                        <h2>Get in touch</h2>
                                                    </div>
                                                    <div id="aiContactSafe_form_1">
                                                        <div class="aiContactSafe" id="aiContactSafe_mainbody_1">
                                                            <div class="contentpaneopen">
                                                                <div id="aiContactSafeForm">
                                                                    <form method="post" id="adminForm_1"
                                                                        name="adminForm_1">
                                                                        <div id="displayAiContactSafeForm_1">
                                                                            <div class="aiContactSafe"
                                                                                id="aiContactSafe_contact_form">
                                                                                <div class="aiContactSafe"
                                                                                    id="aiContactSafe_info"></div>
                                                                                <div class="aiContactSafe_row"
                                                                                    id="aiContactSafe_row_aics_name">
                                                                                    <div
                                                                                        class="aiContactSafe_contact_form_field_label_left">
                                                                                        <span class="aiContactSafe_label"
                                                                                            id="aiContactSafe_label_aics_name"><label
                                                                                                for="aics_name">Name</label></span>&nbsp;
                                                                                        <label
                                                                                            class="required_field">*</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="aiContactSafe_contact_form_field_right">
                                                                                        <input name="aics_name"
                                                                                            id="aics_name"
                                                                                            class="textbox"
                                                                                            placeholder="Name"
                                                                                            value=""
                                                                                            type="text">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="aiContactSafe_row"
                                                                                    id="aiContactSafe_row_aics_email">
                                                                                    <div
                                                                                        class="aiContactSafe_contact_form_field_label_left">
                                                                                        <span class="aiContactSafe_label"
                                                                                            id="aiContactSafe_label_aics_email"><label
                                                                                                for="aics_email">E-mail</label></span>&nbsp;
                                                                                        <label
                                                                                            class="required_field">*</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="aiContactSafe_contact_form_field_right">
                                                                                        <input name="aics_email"
                                                                                            id="aics_email"
                                                                                            class="email"
                                                                                            placeholder="Email"
                                                                                            value=""
                                                                                            type="text">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="aiContactSafe_row"
                                                                                    id="aiContactSafe_row_aics_message">
                                                                                    <div
                                                                                        class="aiContactSafe_contact_form_field_label_left">
                                                                                        <span class="aiContactSafe_label"
                                                                                            id="aiContactSafe_label_aics_message"><label
                                                                                                for="aics_message">Message</label></span>&nbsp;
                                                                                        <label
                                                                                            class="required_field">*</label>
                                                                                    </div>
                                                                                    <div
                                                                                        class="aiContactSafe_contact_form_field_right">
                                                                                        <textarea name="aics_message" id="aics_message" cols="40" rows="10" class="editbox"
                                                                                            placeholder="Message"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                        <br>
                                                                        <div id="aiContactSafeBtns">
                                                                            <div id="aiContactSafeButtons_center"
                                                                                style="clear:both; display:block; text-align:center;">
                                                                                <table
                                                                                    style="margin-left:auto; margin-right:auto;">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div
                                                                                                    id="aiContactSafeSend_loading_1">
                                                                                                    &nbsp;</div>
                                                                                            </td>
                                                                                            <td
                                                                                                id="td_aiContactSafeSendButton">
                                                                                                <input
                                                                                                    id="aiContactSafeSendButton"
                                                                                                    value="Send"
                                                                                                    type="submit">
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <br>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <script>
                                window.map = false;



                                function initialize() {
                                    var myLatlng = new google.maps.LatLng(50.3915097, -4.1306689);

                                    var mapOptions = {
                                        zoom: 16,
                                        center: myLatlng,
                                        mapTypeId: google.maps.MapTypeId.ROADMAP,
                                        scrollwheel: false,

                                        streetViewControl: false,
                                        overviewMapControl: false,
                                        mapTypeControl: false

                                    };

                                    window.map = new google.maps.Map(document.getElementById('map'), mapOptions);

                                }

                                google.maps.event.addDomListener(window, 'load', initialize);
                            </script>
                            <div id="map"></div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


@endsection

@extends('layouts.master')
@section('content')
    <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
        <div class="uk-container uk-container-center">
            <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}"
                data-uk-grid-margin="">
                <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                        <div class="uk-cover-background uk-position-relative head-match-wrap"
                            style="height: 590px; background-image: url('{{ asset('images/head-bg-match.jpg') }}');">
                            <img class="uk-invisible" src="{{ asset('images/head-bg-match.jpg') }}" alt="">
                            <div class="uk-position-cover uk-flex-center head-news-title">
                                <h1>
                                    {{ $tournament->title }}
                                </h1>
                                <div class="clear"></div>
                                {{-- <div class="va-latest-wrap">
                                    <div class="uk-container uk-container-center">
                                        <div class="va-latest-top">
                                            <h3>Latest <span>Results</span></h3>
                                            <div class="tournament">
                                                <address>
                                                    Cambridgeshire UK <br><br>
                                                </address>
                                            </div>
                                            <div class="date">
                                                November 29, 2015 | 12:00 am
                                            </div>
                                        </div>
                                    </div>
                                    <div class="va-latest-middle uk-flex uk-flex-middle">
                                        <div class="uk-container uk-container-center">
                                            <div class="uk-grid uk-flex uk-flex-middle">
                                                <div class="uk-width-2-12 center">
                                                    <a href="match-single.html">
                                                        <img src="images/team-ava.png" class="img-polaroid"
                                                            alt="Cambridgehire VS china (2015-11-29)"
                                                            title="Cambridgehire VS china (2015-11-29)"></a>
                                                </div>
                                                <div class="uk-width-3-12 name uk-vertical-align">
                                                    <div class="wrap uk-vertical-align-middle">
                                                        Cambridgehire
                                                    </div>
                                                </div>
                                                <div class="uk-width-2-12 score">
                                                    <div class="title">score</div>
                                                    <div class="table">
                                                        <div class="left">3</div>
                                                        <div class="right">5</div>
                                                        <div class="uk-clearfix"></div>
                                                    </div>
                                                </div>
                                                <div class="uk-width-3-12 name alt uk-vertical-align">
                                                    <div class="wrap uk-vertical-align-middle">
                                                        china
                                                    </div>
                                                </div>
                                                <div class="uk-width-2-12 center">
                                                    <a href="match-single.html">
                                                        <img src="images/team-ava1.png" class="img-polaroid"
                                                            alt="Cambridgehire VS china (2015-11-29)"
                                                            title="Cambridgehire VS china (2015-11-29)"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="uk-container uk-container-center">
                                        <div class="va-latest-bottom">
                                            <div class="uk-grid">
                                                <div class="uk-width-8-12 uk-container-center text">
                                                    <p>Vivamus hendrerit, tortor sed luctus maximus, nunc urna hendrerit
                                                        nibh, sit amet efficitur libero lorem quis mauris. Nunc a pulvinar
                                                        lectus. Pellentesque aliquam justo ut rhoncus lobortis. In sed
                                                        venenatis massa. Sed sodales faucibus odio, eget tempus nibh
                                                        accumsan ut. Fusce tincidunt semper finibus. Nullam consequat non
                                                        leo interdum pulvinar.</p>
                                                </div>
                                            </div>
                                            <div class="uk-grid">
                                                <div class="uk-width-1-1">
                                                    <div class="btn-wrap uk-container-center">
                                                        <a class="read-more"
                                                            href="/index.php/component/cobalt/item/13-results/59-cambridgehire-vs-china-2015-11-29?Itemid=119">More
                                                            Info</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="uk-container uk-container-center alt">
        <ul class="uk-breadcrumb">
            <li><a href="index.html">Home</a></li>
            <li class="uk-active"><span>Match list</span></li>
        </ul>
    </div>

    <div class="uk-container uk-container-center">
        <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
            <div class="tm-main uk-width-medium-3-4 uk-push-1-4">
                <main id="tm-content" class="tm-content">
                    <div class="match-list-wrap">
                        @foreach ($tournament->games as $game)
                            <div class="match-list-item">
                                <div class="date">
                                    <span>{{ \Carbon\Carbon::parse($game->date)->format('d') }}</span>
                                    {{ \Carbon\Carbon::parse($game->date)->format('M') }}
                                    {{ \Carbon\Carbon::parse($game->time)->format('h:i:a') }}
                                </div>

                                <div class="team-name">
                                    {{ $game->team->title }}
                                </div>
                                <div class="team-score">
                                    {{ $game->our_score }}
                                </div>
                                <div class="score-separator">:</div>
                                <div class="team-score">
                                    {{ $game->opponent_score }}
                                </div>
                                <div class="team-name">
                                    {{ $game->opponent_name }}
                                </div>

                                <div class="location">
                                    <address>
                                        {{ $game->tournament->location }} <br><br>
                                    </address>
                                </div>
                                <div class="team-name float-right">
                                    @if ($game->our_score > $game->opponent_score)
                                        <div class=" text-center uppercasep-2 p-2 font-bold bg-lime-400 text-white">
                                            WIN
                                        </div>
                                    @elseif($game->our_score < $game->opponent_score)
                                        <div class=" text-center uppercasep-2 p-2 font-bold bg-red-400 text-white">
                                            LOSE
                                        </div>
                                    @elseif($game->our_score == $game->opponent_score)
                                        <div class=" text-center uppercasep-2 p-2 font-bold bg-yellow-400 text-white">
                                            Draw
                                        </div>
                                    @endif
                                </div>

                            </div>
                        @endforeach

                    </div>
                </main>

                <div>
                    {!! $tournament->content !!}
                </div>
            </div>

        </div>
    </div>



    <main id="tm-content" class="tm-content mt-10">



        <div class="uk-grid uk-grid-collapse grid" data-uk-grid-match="">

            @foreach ($tournament->pictures as $pic)
                <div
                    class="uk-width-1-1 uk-width-medium-1-2 uk-width-large-1-4 grid-item tt_c26e2589e25045ad516b5bc37d18523a ">
                    <div class="gallery-album">
                        <a href="{{ $pic->path['large'] }}" data-uk-lightbox="{group:'my-group'}"
                            class="img-0">
                            <img class="object-cover" src="{{ $pic->path['small'] }}" alt="">
                        </a>


                    </div>
                </div>
            @endforeach
            @foreach ($tournament->videos as $vid)
                <div
                    class="uk-width-1-1 uk-width-medium-1-2 uk-width-large-1-4 grid-item tt_c26e2589e25045ad516b5bc37d18523a ">
                    <div class="gallery-album">
                        <a data-lightbox-type="iframe" href="{{ $vid->path }}"
                            data-uk-lightbox="{group:'my-group'}" class="img-0">
                            <iframe src="{{ $vid->path }}" class="object-fill aspect-video w-full h-full pointer-events-none"
                                frameborder="0"></iframe>
                        </a>


                    </div>
                </div>
            @endforeach

        </div>
    </main>
@endsection

@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css" />
@endpush

@extends('layouts.master')
@section('content')
    <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
        <div class="uk-container uk-container-center">
            <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}"
                data-uk-grid-margin="">

                <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                        <div class="uk-cover-background uk-position-relative head-wrap"
                            style="height: 290px; background-image: url('{{ asset('images/ball-head-bg.jpg') }}');">
                            <img class="uk-invisible" src="{{ asset('images/ball-head-bg.jpg') }}" alt=""
                                height="290" width="1920">
                            <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                <h1>Player</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="uk-container uk-container-center alt">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('home') }}">Home</a>
            </li>
            <li><a href="#_">Player</a>
            </li>
            <li class="uk-active"><span>{{ $player->name }}</span>
            </li>
        </ul>
    </div>


    <div class="uk-container-center">
        <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
            <div class="tm-main uk-width-medium-1-1 uk-row-first">
                <main id="tm-content" class="tm-content">
                    <div id="system-message-container"></div>
                    <div class="contentpaneopen">
                        <article class="player-single tt-players-page">
                            <div class="uk-container uk-container-center alt">
                                <div class="uk-gfid">
                                </div>
                            </div>
                            <div class="player-top hidden md:block">
                                <div class="uk-container uk-container-center alt">
                                    <div class="uk-grid">
                                        <div class="uk-width-3-12">
                                            <div class="avatar">
                                                <img src="{{ $player->image['large'] }}" class="img-polaroid"
                                                    alt="Christopher Herrera" title="Christopher Herrera">
                                            </div>
                                        </div>

                                        <div class="uk-width-4-12">
                                            <div class="name">
                                                <h2>
                                                    {{ $player->name }}
                                                </h2>
                                            </div>
                                            <div class="wrap">
                                                <ul class="info">
                                                    @foreach ($player->playerInfo as $info)
                                                        <li><span>{{ $info->name }}</span><span>{{ $info->value }}</span>
                                                        </li>
                                                    @endforeach

                                                </ul>

                                            </div>
                                        </div>
                                        <div class="uk-width-4-12">
                                            <div class="name">
                                                <h2>
                                                    &nbsp;
                                                </h2>
                                            </div>
                                            <div class="wrap">
                                                <ul class="info">
                                                    @foreach ($player->schoolInfo as $info)
                                                        <li><span>{{ $info->name }}</span><span>{{ $info->value }}</span>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                                <ul class="socials">
                                                    @if ($player->twitter)
                                                        <li><a href="{{ $player->twitter }}" target="_blank"
                                                                rel="nofollow">
                                                                <img
                                                                    src="https://img.icons8.com/color/48/000000/twitter--v1.png" />
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if ($player->facebook)
                                                        <li>
                                                            <a href="{{ $player->facebook }}" target="_blank"
                                                                rel="nofollow">
                                                                <img
                                                                    src="https://img.icons8.com/color/48/000000/facebook.png" />
                                                            </a>
                                                        </li>
                                                    @endif

                                                    @if ($player->instagram)
                                                        <li><a href="{{ $player->instagram }}" target="_blank"
                                                                rel="nofollow">
                                                                <img
                                                                    src="https://img.icons8.com/color/48/000000/instagram-new--v1.png" />
                                                            </a>
                                                        </li>
                                                    @endif
                                                    @if ($player->youtube)
                                                        <li><a href="{{ $player->youtube }}" target="_blank"
                                                                rel="nofollow">
                                                                <img
                                                                    src="https://img.icons8.com/color/48/000000/youtube-play.png" />
                                                            </a>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="flex flex-col justify-center items-center md:hidden">
                                <h2 class="text-4xl uppercase mb-2">{{ $player->name }}</h2>
                                <div class="avatar">
                                    <img src="{{ $player->image['large'] }}" class="img-polaroid" alt="Christopher Herrera"
                                        title="Christopher Herrera">
                                </div>
                                <div class="wrap mt-2">
                                    <ul class="info">
                                        @foreach ($player->playerInfo as $info)
                                            <li class="w-full">
                                                <span>{{ $info->name }}</span><span>{{ $info->value }}</span>
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>
                                <div>
                                    <ul class="info">
                                        @foreach ($player->schoolInfo as $info)
                                            <li><span>{{ $info->name }}</span><span>{{ $info->value }}</span>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <ul class="socials">
                                        @if ($player->twitter)
                                            <li><a href="{{ $player->twitter }}" target="_blank" rel="nofollow">
                                                    <img src="https://img.icons8.com/color/48/000000/twitter--v1.png" />
                                                </a>
                                            </li>
                                        @endif
                                        @if ($player->facebook)
                                            <li>
                                                <a href="{{ $player->facebook }}" target="_blank" rel="nofollow">
                                                    <img src="https://img.icons8.com/color/48/000000/facebook.png" />
                                                </a>
                                            </li>
                                        @endif

                                        @if ($player->instagram)
                                            <li><a href="{{ $player->instagram }}" target="_blank" rel="nofollow">
                                                    <img
                                                        src="https://img.icons8.com/color/48/000000/instagram-new--v1.png" />
                                                </a>
                                            </li>
                                        @endif
                                        @if ($player->youtube)
                                            <li><a href="{{ $player->youtube }}" target="_blank" rel="nofollow">
                                                    <img src="https://img.icons8.com/color/48/000000/youtube-play.png" />
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="uk-container uk-container-center alt">
                                <div class="uk-grid">
                                    <div class="uk-width-1-1">
                                        <div class="line"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-container uk-container-center alt">
                                <div class="uk-grid">
                                    <div class="uk-width-9-10 uk-push-1-10">
                                        <div class="player-total-info">
                                            <p>
                                                <strong>
                                                    {{ $player->description }}
                                                </strong>
                                            </p>

                                            @if ($player->high_school)
                                                <p><strong>High School: </strong>{{ $player->high_school }}</p>
                                            @endif

                                            @if ($player->guest_playing)
                                                <p><strong>Guest Playing: </strong>{{ $player->guest_playing }}</p>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div>
                            <div class="other-players-wrap">
                                <div class="uk-container uk-container-center alt">
                                    <div class="uk-grid">
                                        <div class="uk-width-1-1">
                                            <h3 class="other-post-title">Other <span>Players</span></h3>
                                            <div dir="ltr" class="uk-slidenav-position player-slider"
                                                data-uk-slider="">
                                                <div class="uk-slider-container">
                                                    <div class="player-slider-btn">
                                                        <a draggable="false" href="/"
                                                            class="uk-slidenav uk-slidenav-previous"
                                                            data-uk-slider-item="previous"></a>
                                                        <a draggable="false" href="/"
                                                            class="uk-slidenav uk-slidenav-next"
                                                            data-uk-slider-item="next"></a>
                                                    </div>
                                                    <ul class="uk-slider uk-grid uk-grid-width-1-4">
                                                        @foreach ($player->team->players as $other_player)
                                                            @if ($other_player->id != $player->id)
                                                                <li class="player-item">
                                                                    <div class="player-article">
                                                                        <div class="wrapper">
                                                                            <div class="img-wrap">
                                                                                <div class="player-number">
                                                                                    <span></span>
                                                                                </div>
                                                                                <div class="bio"><span><a
                                                                                            draggable="false"
                                                                                            href="{{ route('show.player', $other_player->slug) }}">bio</a></span>
                                                                                </div>
                                                                                <a draggable="false"
                                                                                    href="{{ route('show.player', $other_player->slug) }}">
                                                                                    <img draggable="false"
                                                                                        src="{{ $other_player->image['medium'] }}"
                                                                                        class="img-polaroid"
                                                                                        alt="{{ $other_player->name }}"
                                                                                        title="{{ $other_player->name }}"></a>

                                                                            </div>
                                                                            <div class="info">
                                                                                <div class="name">
                                                                                    <h3>
                                                                                        <a draggable="false"
                                                                                            href="{{ route('show.player', $other_player->slug) }}">{{ $other_player->name }}</a>
                                                                                    </h3>
                                                                                </div>
                                                                                {{-- <div class="position">STRIKER</div> --}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endif
                                                        @endforeach

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <main id="tm-content" class="tm-content">


                    <h2 class="text-7xl text-center py-2">Gallery</h2>
                    <div class="uk-grid uk-grid-collapse grid" data-uk-grid-match="">

                        @foreach ($player->pictures as $pic)
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


                    </div>
                </main>
                <main id="tm-content" class="tm-content">


                    <h2 class="text-7xl text-center py-2">Videos</h2>
                    <div class="uk-grid uk-grid-collapse grid" data-uk-grid-match="">


                        @foreach ($player->videos as $vid)
                            <div
                                class="uk-width-1-1 uk-width-medium-1-2 uk-width-large-1-4 grid-item tt_c26e2589e25045ad516b5bc37d18523a ">
                                <div class="gallery-album">
                                    <a data-lightbox-type="iframe" href="{{ $vid->path }}"
                                        data-uk-lightbox="{group:'my-group'}" class="img-0">
                                        <iframe src="{{ $vid->path }}"
                                            class="w-full h-full aspect-video pointer-events-none"
                                            frameborder="0"></iframe>
                                    </a>


                                </div>
                            </div>
                        @endforeach

                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection


@push('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet" type="text/css" />
@endpush

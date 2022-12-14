@extends('layouts.master')
@section('content')
    <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
        <div class="uk-container uk-container-center">
            <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}"
                data-uk-grid-margin="">
                <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                        <div class="uk-cover-background uk-position-relative head-wrap"
                            style="height: 530px; background-image: url('{{ $team->image['large'] }}');">
                            <img class="uk-invisible" src="{{ $team->image['large'] }}" alt="" height="290"
                                width="1920">
                            <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                <h1>
                                   Team
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <div class="uk-container uk-container-center alt">
        <ul class="uk-breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="uk-active"><span>Team</span></li>
        </ul>
    </div>

    <div class="uk-container uk-container-center tt-gallery-top">
        <div class="uk-grid" data-uk-grid-match="">
            <div class="uk-width-medium-3-10 uk-width-small-1-1 title">{{ $team->title }}</div>
            <div class="uk-width-medium-7-10 uk-width-small-1-1 text">{{ $team->description }}</div>
        </div>
    </div>

    <div class="uk-container uk-container-center">
        <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
            <div class="tm-main uk-width-medium-3-4 uk-push-1-4">

                <div class="contentpaneopen">
                    <main id="tm-content" class="tm-content">
                        <div class="uk-grid" data-uk-grid-match="">
                            @foreach ($team->players as $player)
                                <div
                                    class="uk-width-large-1-3 uk-width-medium-2-4 uk-width-small-2-4 list-article uk-flex uk-flex-column">
                                    <div class="wrapper">
                                        <div class="img-wrap uk-flex-wrap-top">
                                            <a href="{{ route('show.player',$player->slug) }}">
                                                <img src="{{ $player->image['medium'] }}"
                                                    class="img-polaroid" alt="">
                                            </a>
                                        </div>
                                        <div class="info uk-flex-wrap-middle">

                                            <div class="name">
                                                <h4>
                                                    <a href="{{ route('show.player',$player->slug) }}">
                                                        {{ $player->name }} </a>
                                                </h4>
                                            </div>
                                            <div class="text">
                                                <p>{{ $player->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="article-actions uk-flex-wrap-bottom">
                                        <div class="count">
                                            <div>&nbsp;</div>

                                        </div>
                                        <div class="read-more"><a href="{{ route('show.player',$player->slug) }}">View</a></div>
                                    </div>
                                </div>
                            @endforeach


                    </main>
                </div>


            </div>

        </div>
    </div>
@endsection

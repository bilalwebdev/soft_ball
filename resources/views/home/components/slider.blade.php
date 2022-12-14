<div class="tm-top-a-box tm-full-width  ">
    <div class="uk-container uk-container-center">
        <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}"
            data-uk-grid-margin="">

            <div class="uk-width-1-1">
                <div class="uk-panel">
                    <div class="akslider-module ">
                        <div class="uk-slidenav-position"
                            data-uk-slideshow="{height: 'auto', animation: 'swipe', duration: '500', autoplay: false, autoplayInterval: '7000', videoautoplay: true, videomute: true, kenburns: false}">
                            <ul class="uk-slideshow uk-overlay-active">

                                @foreach ($slides as $slide)
                                    <li aria-hidden="false" class="uk-height-viewport @if ($loop->first)
                                        uk-active
                                    @endif">
                                        <div style="background-image: url('{{ $slide->path['large'] }}');"
                                            class="uk-cover-background uk-position-cover"></div>
                                        <img style="width: 100%; height: auto; opacity: 0;" class="uk-invisible"
                                            src="{{ $slide->path['large'] }}" alt="">
                                        <div class="uk-position-cover uk-flex-middle">
                                            <div class="uk-container uk-container-center uk-position-cover">
                                                <div class="va-promo-text uk-width-6-10 uk-push-4-10">
                                                   @if ($slide->text_one)
                                                   <h3>{{ $slide->text_one }}</span></h3>
                                                   @endif
                                                    <div class="promo-sub">{{ $slide->text_two }}</div>
                                                    {{-- <a href="#" class="read-more">Read More<i
                                                            class="uk-icon-chevron-right"></i></a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                            <a href="/" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous"
                                data-uk-slideshow-item="previous"></a>
                            <a href="/" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next"
                                data-uk-slideshow-item="next"></a>
                            <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-text-center">

                                @foreach ($slides as $slide_dot)
                                    @if ($loop->first)
                                    <li class="uk-active" data-uk-slideshow-item="0"><a href="/">0</a>
                                    </li>

                                    @else<li  data-uk-slideshow-item="{{ $loop->index }}"><a href="/">{{ $loop->index }}</a>
                                    </li>
                                    @endif
                                @endforeach



                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Në këtë hapësirë janë Procesverbalet e mbledhjeve për Institucionet e Drejtësisë.">
    <meta name="author" content="Kristi Hoxholli">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="icon" href="{{URL::asset('/image/favicon.ico')}}">
    <title>Procesverbale | AID</title>

    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slick.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

</head>
@include('layouts.header')

<body>
    <main role="main">
        <div class="container">
            <section id="mu-latest-courses">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="mu-latest-courses-area">
                                <!-- Start Title -->
                                <div class="mu-title">
                                    <h2>Procesverbale të mbledhjeve</h2>
                                    <p></p>
                                </div>
                                <!-- End Title -->
                                <!-- Start latest course content -->
                                <div id="mu-latest-course-slide" class="mu-latest-courses-content">
                                    <div class="row">
                                        @foreach($ligjet as $ligje)
                                        <div class="col-lg-4 col-md-4 col-xs-12 ligjet">
                                            <div class="mu-latest-course-single ligjet">
                                                <div class="mu-latest-course-single-content">
                                                    <h4>{{ $ligje->titulli }}</h4>
                                                    <p>{!! $ligje->pershkrimi !!}</p>
                                                    <div class="mu-latest-course-single-contbottom">
                                                        @if (isset ($ligje->url))
                                                        <a class="mu-course-details" href="/dokumenta/{{ $ligje->url }}"
                                                            target="_blank">Më
                                                            shumë <i class="fa fa-file-pdf-o"
                                                                aria-hidden="true"></i>&nbsp;</a>
                                                        @endif
                                                        @if (isset ($ligje->url_1))
                                                        <a class="mu-course-details"
                                                            href="/dokumenta/{{ $ligje->url_1 }}" target="_blank">
                                                            Më shumë <i class="fa fa-file-pdf-o"
                                                                aria-hidden="true"></i>&nbsp;</a>
                                                        @endif
                                                        @if (isset ($ligje->url_2))
                                                        <a class="mu-course-details"
                                                            href="/dokumenta/{{ $ligje->url_2 }}" target="_blank"> Më
                                                            shumë <i class="fa fa-file-pdf-o"
                                                                aria-hidden="true"></i>&nbsp;</a>
                                                        @endif
                                                        @if (isset ($ligje->url_3))
                                                        <a class="mu-course-details"
                                                            href="/dokumenta/{{ $ligje->url_3 }}" target="_blank"> Më
                                                            shumë <i class="fa fa-file-pdf-o"
                                                                aria-hidden="true"></i>&nbsp;</a>
                                                        @endif
                                                        @if (isset ($ligje->url_4))
                                                        <a class="mu-course-details"
                                                            href="/dokumenta/{{ $ligje->url_4 }}" target="_blank"> Më
                                                            shumë <i class="fa fa-file-pdf-o"
                                                                aria-hidden="true"></i>&nbsp;</a>
                                                        @endif
                                                        @if (isset ($ligje->url_5))
                                                        <a class="mu-course-details"
                                                            href="/dokumenta/{{ $ligje->url_5 }}" target="_blank"> Më
                                                            shumë <i class="fa fa-file-pdf-o"
                                                                aria-hidden="true"></i>&nbsp;</a>
                                                        @endif
                                                        @if (isset ($ligje->word_url))
                                                        <a class="mu-course-details"
                                                            href="/dokumenta/{{ $ligje->word_url }}" target="_blank">
                                                            Më shumë <i class="fa fa-file-word-o"
                                                                aria-hidden="true"></i>&nbsp;</a>
                                                        @endif
                                                        @if (isset ($ligje->audio_url))
                                                        <a class="mu-course-details" href="{{ $ligje->audio_url }}"
                                                            target="_blank"> Më shumë <i class="fa fa-volume-up"
                                                                aria-hidden="true"></i>&nbsp;</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- End latest course content -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="mu-pagination">
            {{ $ligjet->links() }}
        </div>
    </main>
    @include('layouts.footer')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="/docs/4.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous">
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</body>

</html>

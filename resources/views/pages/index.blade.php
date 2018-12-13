@extends('layouts.app')

@section('content')

    <section id="home" name="home"></section>
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1>The Computer Game Society</h1>
                    <div class="jumbotron text-center">
                        <h1>{{$title}}</h1>
                        <p>Browse our collection and view all the games available to rent!</p>
                        <p><a class="btn btn-primary btn-lg" href='/games' role="button"> Take a look</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section id="about" name="about"></section>
    <div id="aboutwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 name">
                    <img class="img-responsive pl-3" src="img/picture.png">

                </div>
                <div class="col-lg-8 name-desc">
                    <h2>WELCOME TO OUR SOCIETY <br/>ALL GAME LOVERS INVITED <br/>RENT YOUR FAVOURITE GAME FOR FREE</h2>
                    <div class="name-zig"></div>

                    <div class="col-md-6">
                        <p>Our game rental society was created with one mission... To share the fun.
                        </p>
                        <p> We realise games are expensive, and there is so much choice. In order to have the chance to experience the best there is,
                            it soon became apparent that a society like ours would be necessary.
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p> Set up by the institution of Gameology, there has never been a better time to become a gamer, or continue a previous save</p>
                        <p>
                        </p>
                    </div>

                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /aboutwrap -->

    <div class="sep about" data-stellar-background-ratio="0.5"></div>

    <section id="portfolio" name="portfolio"></section>
    <div id="portfoliowrap">
        <div class="container">
            <div class="row">
                <h1>OUR COMMITTEE</h1>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                    <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                    <a class="fancybox" href="img/portfolio/port04.jpg"><img class="img-responsive" src="img/portfolio/port04.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col-lg-4 -->

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                    <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                    <a class="fancybox" href="img/portfolio/port05.jpg"><img class="img-responsive" src="img/portfolio/port05.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col-lg-4 -->

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                    <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                    <a class="fancybox" href="img/portfolio/port06.jpg"><img class="img-responsive" src="img/portfolio/port06.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col-lg-4 -->
            </div>
            <!-- /row -->

            <div class="row mt">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                    <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                    <a class="fancybox" href="img/portfolio/port01.jpg"><img class="img-responsive" src="img/portfolio/port01.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col-lg-4 -->

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                    <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                    <a class="fancybox" href="img/portfolio/port02.jpg"><img class="img-responsive" src="img/portfolio/port02.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col-lg-4 -->

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
                    <div class="project-wrapper">
                        <div class="project">
                            <div class="photo-wrapper">
                                <div class="photo">
                                    <a class="fancybox" href="img/portfolio/port03.jpg"><img class="img-responsive" src="img/portfolio/port03.jpg" alt=""></a>
                                </div>
                                <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- col-lg-4 -->
            </div>
            <!-- /row -->
        </div>

        <div class="container">
            <div class="row mt centered">
            </div>
        </div>
    </div>

    <div class="sep portfolio" data-stellar-background-ratio="0.5"></div>
@endsection
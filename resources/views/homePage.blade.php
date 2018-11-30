@extends('layouts.frontend.frontApp')
@section('title','Home')
@section('main_section')

<div class="main-slider">
    <div class="swiper-container position-static" data-slide-effect="slide" data-autoheight="false"
         data-swiper-speed="500" data-swiper-autoplay="10000" data-swiper-margin="0" data-swiper-slides-per-view="4"
         data-swiper-breakpoints="true" data-swiper-loop="true" >
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <a class="slider-category" href="#">
                    <div class="blog-image"><img src="{{asset('frontend/images/category-1-400x250.jpg')}}" alt="Blog Image"></div>

                    <div class="category">
                        <div class="display-table center-text">
                            <div class="display-table-cell">
                                <h3><b>BEAUTY</b></h3>
                            </div>
                        </div>
                    </div>

                </a>
            </div><!-- swiper-slide -->

            <div class="swiper-slide">
                <a class="slider-category" href="#">
                    <div class="blog-image"><img src="{{asset('frontend/images/category-2-400x250.jpg')}}" alt="Blog Image"></div>

                    <div class="category">
                        <div class="display-table center-text">
                            <div class="display-table-cell">
                                <h3><b>SPORT</b></h3>
                            </div>
                        </div>
                    </div>

                </a>
            </div><!-- swiper-slide -->

            <div class="swiper-slide">
                <a class="slider-category" href="#">
                    <div class="blog-image"><img src="{{asset('frontend/images/category-3-400x250.jpg')}}" alt="Blog Image"></div>

                    <div class="category">
                        <div class="display-table center-text">
                            <div class="display-table-cell">
                                <h3><b>HEALTH</b></h3>
                            </div>
                        </div>
                    </div>

                </a>
            </div><!-- swiper-slide -->

            <div class="swiper-slide">
                <a class="slider-category" href="#">
                    <div class="blog-image"><img src="{{asset('frontend/images/category-4-400x250.jpg')}}" alt="Blog Image"></div>

                    <div class="category">
                        <div class="display-table center-text">
                            <div class="display-table-cell">
                                <h3><b>DESIGN</b></h3>
                            </div>
                        </div>
                    </div>

                </a>
            </div><!-- swiper-slide -->

            <div class="swiper-slide">
                <a class="slider-category" href="#">
                    <div class="blog-image"><img src="{{asset('frontend/images/category-5-400x250.jpg')}}" alt="Blog Image"></div>

                    <div class="category">
                        <div class="display-table center-text">
                            <div class="display-table-cell">
                                <h3><b>MUSIC</b></h3>
                            </div>
                        </div>
                    </div>

                </a>
            </div><!-- swiper-slide -->

            <div class="swiper-slide">
                <a class="slider-category" href="#">
                    <div class="blog-image"><img src="{{asset('frontend/images/category-6-400x250.jpg')}}" alt="Blog Image"></div>

                    <div class="category">
                        <div class="display-table center-text">
                            <div class="display-table-cell">
                                <h3><b>MOVIE</b></h3>
                            </div>
                        </div>
                    </div>

                </a>
            </div><!-- swiper-slide -->

        </div><!-- swiper-wrapper -->

    </div><!-- swiper-container -->

</div><!-- slider -->
<section class="blog-area section">
    <div class="container">

        <div class="row">

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{asset('frontend/images/marion-michele-330691.jpg')}}" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img src="{{asset('frontend/images/icons8-team-355979.jpg')}}" alt="Profile Image"></a>

                        <div class="blog-info">

                            <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>

                            <ul class="post-footer">
                                <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                <li><a href="#"><i class="ion-eye"></i>138</a></li>
                            </ul>

                        </div><!-- blog-info -->
                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{asset('frontend/images/audrey-jackson-260657.jpg')}}" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img src="{{asset('frontend/images/icons8-team-355979.jpg')}}" alt="Profile Image"></a>

                        <div class="blog-info">
                            <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>

                            <ul class="post-footer">
                                <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                <li><a href="#"><i class="ion-eye"></i>138</a></li>
                            </ul>
                        </div><!-- blog-info -->

                    </div><!-- single-post -->

                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{asset('frontend/images/pexels-photo-370474.jpeg')}}" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img src="{{asset('frontend/images/averie-woodard-319832.jpg')}}" alt="Profile Image"></a>

                        <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                    Concepts in Physics?</b></a></h4>

                        <ul class="post-footer">
                            <li><a href="#"><i class="ion-heart"></i>57</a></li>
                            <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                            <li><a href="#"><i class="ion-eye"></i>138</a></li>
                        </ul>

                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{asset('frontend/images/marion-michele-330691.jpg')}}" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img src="{{asset('frontend/images/icons8-team-355979.jpg')}}" alt="Profile Image"></a>

                        <div class="blog-info">

                            <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>

                            <ul class="post-footer">
                                <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                <li><a href="#"><i class="ion-eye"></i>138</a></li>
                            </ul>

                        </div><!-- blog-info -->
                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{asset('frontend/images/audrey-jackson-260657.jpg')}}" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img src="{{asset('frontend/images/icons8-team-355979.jpg')}}" alt="Profile Image"></a>

                        <div class="blog-info">
                            <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                        Concepts in Physics?</b></a></h4>

                            <ul class="post-footer">
                                <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                <li><a href="#"><i class="ion-eye"></i>138</a></li>
                            </ul>
                        </div><!-- blog-info -->

                    </div><!-- single-post -->

                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="single-post post-style-1">

                        <div class="blog-image"><img src="{{asset('frontend/images/pexels-photo-370474.jpeg')}}" alt="Blog Image"></div>

                        <a class="avatar" href="#"><img src="{{asset('frontend/images/averie-woodard-319832.jpg')}}" alt="Profile Image"></a>

                        <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                    Concepts in Physics?</b></a></h4>

                        <ul class="post-footer">
                            <li><a href="#"><i class="ion-heart"></i>57</a></li>
                            <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                            <li><a href="#"><i class="ion-eye"></i>138</a></li>
                        </ul>

                    </div><!-- single-post -->
                </div><!-- card -->
            </div><!-- col-lg-4 col-md-6 -->

        </div><!-- row -->

        <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

    </div><!-- container -->
</section><!-- section -->
@endsection

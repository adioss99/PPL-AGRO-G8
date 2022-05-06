@extends('layouts.app')

@section('title')
    CoffMaker
@endsection

@section('content')
<div class="page-content page-home pt-3">
    <div class="store-carousel">
    <div class="container">
        <div class="row">
        <div class="col-lg-12" data-aos="zoom-in">
            <div id="storeCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100 rounded" src="images/cropped-images/photo-1433891248364-3ce993ff0e92.jpg" alt="First slide" />
                </div>
                <div class="carousel-item">
                <img class="d-block w-100 rounded" src="images/cropped-images/photo-1447933601403-0c6688de566e_1.jpg" alt="Second slide" />
                </div>
                <div class="carousel-item">
                <img class="d-block w-100 rounded" src="images/cropped-images/photo-1559631526-5716df3cfacd.jpg" alt="Third slide" />
                </div>
                <div class="carousel-item">
                <img class="d-block w-100 rounded" src="images/cropped-images/shutterstock_175212431 (1).jpg" alt="Fourth slide" />
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection


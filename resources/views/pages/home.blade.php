<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>CoffMaker</title>

    @include('includes.style')
    <link rel="stylesheet" href="/style/home.css">
    
    </head>

  <body>
      <section>
          <div class="circle"></div>
          @include('includes.navbar')      
          {{-- page content --}}
          <div class="container">
            <div class="content">
                <div class="textbox">
                    <h2>
                        CoffMaker
                    </h2>
                    <p>
                        Buat kopi racikan anda sendiri dengan kami
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati delectus quod nesciunt magni corrupti, nemo corporis, quo, voluptatum officia officiis numquam porro reiciendis. Nostrum numquam, odio doloribus maxime repudiandae obcaecati.
                    </p>
                    <a class="btn" href="https://wa.me/628113780510" target="_blank">Hubungi Kami <i class="fa-brands fa-whatsapp"></i></a>
                </div>
                <div class="imgBox">
                    <img src="/images/cropped-images/landing.png" class="landing">
                </div>
            </div>
            <ul class="contact">
                <li><a href="https://www.facebook.com/ptjtn/" target="_blank"><i class="fa-brands fa-facebook-square fa-2xl"></i></a></li>
                <li><a href="https://instagram.com/kopisangrai.id?igshid=YmMyMTA2M2Y=" target="_blank"><i class="fa-brands fa-instagram fa-2xl"></i></a></li>
                <li><a href="https://goo.gl/maps/S6kH7X3atJxKWyAc6" target="_blank"><i class="fa-solid fa-map-location-dot fa-2xl"></i></a></li>
            </ul>
          </div>
      </section>
    @include('includes.script')
  </body>
</html>

{{-- @extends('layouts.app')

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
 --}}

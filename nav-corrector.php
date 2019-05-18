
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="bootstrap-theme.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
  <script src="jquery.js"></script>
  <script src="jquery-ui.js"></script>
    <link href="carousel.css" rel="stylesheet">
  </head>


  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 0.5rem;">

   <a class="navbar-brand" href="#">Carousel</a>
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-lebel="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
     <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
<li class="nav-item active"><a class="nav-link" href="">Home<span class="sr-only">(current)</span></a></li>
<li class="nav-item"><a class="nav-link" href="">Gallery</a></li><li class="nav-item"><a class="nav-link" href="">Upload</a></li>
<li class="nav-item dropdown">
 <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="">What</a>
      <a class="dropdown-item" href="">Is</a>
      <div class="dropdown-divider" href=""></div>
      <a class="dropdown-item" href="">This</a> 
      </div>
 </li>
     </ul>

    </div>
    </nav>

<section id="carouselit">
<!-- Carousel build up -->
<div id="carouselstart" class="carousel slide" data-ride="carousel" data-pause="hover">
  
  <div class="carousel-inner">
  <!--FIRST SLIDE-->
  <div class="carousel-item one active" style="background: red">
   <div class="row">   
      <div class="col-lg-6">
        <h2 class="c-head" style="color:white;">Welcome Home<br>Cute right?</h2>
      </div>
      <div class="col-lg-6">
      <img class="c-image" src="img3.jpg">
      </div>
     </div>
  </div>
  <!--FIRST SLIDE ENDS-->
  <!--SECOND SLIDE-->
  <div class="carousel-item two" style="background: yellow">
    <div class="row">   
      <div class="col-lg-6">
        <h2 class="c-head">Welcome Inside<br>Cute follower?</h2>
      </div>
      <div class="col-lg-6">
      <img class="c-image" src="img3.jpg">
      </div>
     </div>
   </div>
  <!--SECOND SLIDE ENDS-->
  <!--THIRD SLIDE-->
  <div class="carousel-item three" style="background: blue">
    <div class="row">   
      <div class="col-lg-6">
        <h2 class="c-head" style="color: white">Welcome Crooners<br>Cute tweetes?</h2>
      </div>
      <div class="col-lg-6">
      <img class="c-image" src="img3.jpg">
      </div>
     </div>
   </div>
  </div>
  <!--THIRD SLIDE ENDS-->
  <!--CONTROLS-->
  <a class="carousel-control-prev" href="#carouselstart" role="button" data-slide="prev">
  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
  <span class="sr-only">Previous</span>
   </a>
  <a class="carousel-control-next" href="#carouselstart" role="button" data-slide="next">
  <span class="carousel-control-next-icon" aria-hidden="true"></span>
  <span class="sr-only">Next</span>
   </a>

  </div>
  
 </div>

<!-- Carousel build up closure-->
</section>

<div class="cardss">

<div class="row">

<div class="col-lg-4 col-md-6">
<div class="card">
  <div class="card-header">
    <h3>Owner</h3>
  </div>
  <div class="card-body">
    <h2>Vicheans</h2>
    <p>1 owned</p>
    <p>2 owned</p>
    <p>3 owned</p>
    <button type="button"> Sign in</button>
  </div>
</div>
</div>

<div class="col-lg-4 col-md-6">
<div class="card">
  <div class="card-header">
   <h3>Owner</h3>
  </div>
  <div class="card-body">
    <h2>Vicheans</h2>
    <p>1 owned</p>
    <p>2 owned</p>
    <p>3 owned</p>
    <button type="button"> Sign in</button>
</div>
</div>
</div>

<div class="col-lg-4 col-md-12">
<div class="card">
  <div class="card-header">
   <h3>Owner</h3>
  </div>
  <div class="card-body">
    <h2>Vicheans</h2>
    <p>1 owned</p>
    <p>2 owned</p>
    <p>3 owned</p>
    <button type="button"> Sign in</button>
</div>
</div>
</div>
</div>

<!-- CREATING AN INBETWEEN TEXT EFFECTOR -->
<div >
  <div class="center" style="height:300px; width: auto; background-color:#232323;font-family: Calibri, sans-serif; color: #fff ">
        <p id="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate incidunt praesentium, rerum voluptatem in reiciendis officia harum repudiandae tempore suscipit ex ea, adipisci ab porro.</p>
    </div>
</div>
<style type="text/css">
   
        .center{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        p{
            width: 70%;
            font-size: 30px;
            display: block;
            text-align: center;
        }

        .char{
            font-size: 40px;
            height: 40px;
            animation: an 1s ease-out 1 both;
            display: inline-block;
        }

        @keyframes an{
            from{
                opacity: 0;
                transform: perspective(500px) translate3d(-35px, -40px, -150px) rotate3d(1, -1, 0, 35deg);
            }
            to{
                opacity: 1;
                transform: perspective(500px) translate3d(0, 0, 0);
            }
        }
</style>
<script type="text/javascript">
  var text = document.getElementById('text');
        var newDom = '';
        var animationDelay = 6;

        for(let i = 0; i < text.innerText.length; i++)
        {
            newDom += '<span class="char">' + (text.innerText[i] == ' ' ? '&nbsp;' : text.innerText[i])+ '</span>';
        }

        text.innerHTML = newDom;
        var length = text.children.length;

        for(let i = 0; i < length; i++)
        {
            text.children[i].style['animation-delay'] = animationDelay * i + 'ms';
        }
</script>

   <script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="jquery-ui.min.js"></script>
<script type="text/javascript" src="sound.js"></script>
</div>
  </body>
</html>

<!doctype html>
<html lang="en" style="height: 100%;">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>

  <body style="height:100%; min-height:100%">  
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/" style="width: 100px; height:50px;">
                  <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                  width="100.000000px" height="50.000000px" viewBox="0 0 100.000000 50.000000"
                  preserveAspectRatio="xMidYMid meet">
                  <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)"
                  fill="#000000" stroke="none">
                  <path d="M282 395 c-49 -21 -62 -64 -62 -195 l0 -110 45 0 c45 0 45 0 45 35 0
                  24 5 35 15 35 21 0 21 76 0 84 -19 7 -19 50 0 66 21 17 24 4 27 -115 l3 -100
                  43 -3 42 -3 0 130 c0 120 -2 132 -23 156 -27 33 -88 42 -135 20z"/>
                  <path d="M0 356 c0 -42 2 -45 29 -48 l30 -3 -29 -65 c-17 -38 -30 -83 -30
                  -108 l0 -43 98 3 97 3 3 43 3 42 -45 0 c-25 0 -46 4 -46 8 0 5 18 50 40 101
                  22 50 40 96 40 102 0 5 -42 9 -95 9 l-95 0 0 -44z"/>
                  <path d="M500 245 l0 -155 45 0 45 0 0 110 0 110 25 0 c29 0 34 -25 8 -39 -24
                  -12 -21 -71 6 -133 20 -47 21 -48 66 -48 25 0 45 2 45 5 0 3 -11 31 -24 63
                  -23 57 -23 59 -5 81 23 28 24 83 3 116 -21 32 -63 45 -145 45 l-69 0 0 -155z"/>
                  <path d="M780 245 l0 -155 45 0 45 0 0 60 c0 33 4 60 10 60 6 0 10 18 10 40 0
                  22 -4 40 -10 40 -5 0 -10 25 -10 55 l0 55 -45 0 -45 0 0 -155z"/>
                  <path d="M910 245 l0 -155 45 0 45 0 0 155 0 155 -45 0 -45 0 0 -155z"/>
                  </g>
                  </svg>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Registration</a>
                    </li>
                </ul>
            </div>
        </div>
      </nav>

    <div class="container" style="height: 80%;">
      {{content}}
    </div>
    <footer class="mx-0 bg-light row position-absolute"  style="bottom:0; width:100%;">
      <div class="col-5 col-lg-9"></div>
      <div class="col-7 col-lg-3">
        <p>&copy ZhydkykhArtomov 2021</p>
      </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>
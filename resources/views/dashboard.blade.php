<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/img/icon.png">

  <title>ADN-BENIN </title>

  <!-- Bootstrap -->
  <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- bootstrap-daterangepicker -->
  <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">


          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">

            </div>
            <div class="profile_info">

            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          @include('layouts.sidebar')
          <!-- /top navigation -->

          <!-- page content -->
          <div class="right_col" role="main">

            <div class="container" style="text-align: center;">
              <div class="row justify-content-center">
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="animated flipInY">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-user"></i></div>
                      <div class="count">{{$totalAdherants}}</div>
                      <h4>Adhérent{{$totalAdherants > 1 ? 's' : ''}} </h4>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="animated flipInY">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-user"></i></div>
                      <div class="count">{{$totalCoordonnateur}}</div>
                      <h4>Coordonnateur{{$totalCoordonnateur > 1 ? 's' : ''}}</h4>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                  <div class="animated flipInY">
                    <div class="tile-stats">
                      <div class="icon"><i class="fa fa-user"></i></div>
                      <div class="count">{{$totalUser}}</div>
                      <h4>Total{{$totalUser > 1 ? 's' : ''}} d'enregistrement{{$totalUser > 1 ? 's' : ''}}</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <section id="features" class="features my-5">
              <h2 style="text-align: center; padding: 20px; font-weight: bold;">Les adhérents par département</h2>
              <div class="container" data-aos="fade-up">
                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                  <!-- Boucle sur les départements -->
                  @foreach($departements as $departement)
                  <div class="col-md-3">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">{{ $departement->libelle }}</h5>
                        <p class="card-text">
                          <span class="font-bold">{{ $departement->nombre_adherents }}</span> Adhérent{{$departement->nombre_adherents > 1 ? 's' : ''}} 
                        </p>
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <!-- Fin de la boucle -->
                </div>
              </div>
            </section>
          </div>
          
        </div>
      </div>
      <!-- /page content -->

      

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          
            &copy; 2024 Action pour le Développement National <strong></strong>
          
        </div>
       
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="/vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="/vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="/vendors/nprogress/nprogress.js"></script>
  <!-- Chart.js -->
  <script src="/vendors/Chart.js/dist/Chart.min.js"></script>
  <!-- jQuery Sparklines -->
  <script src="/vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- Flot -->
  <script src="/vendors/Flot/jquery.flot.js"></script>
  <script src="/vendors/Flot/jquery.flot.pie.js"></script>
  <script src="/vendors/Flot/jquery.flot.time.js"></script>
  <script src="/vendors/Flot/jquery.flot.stack.js"></script>
  <script src="/vendors/Flot/jquery.flot.resize.js"></script>
  <!-- Flot plugins -->
  <script src="/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
  <script src="/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
  <script src="/vendors/flot.curvedlines/curvedLines.js"></script>
  <!-- DateJS -->
  <script src="/vendors/DateJS/build/date.js"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="/vendors/moment/min/moment.min.js"></script>
  <script src="/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Custom Theme Scripts -->
  <script src="/build/js/custom.min.js"></script>
</body>

</html>
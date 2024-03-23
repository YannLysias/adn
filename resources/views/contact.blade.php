<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <link rel="icon" href="assets/img/icon.png">

  <title>ADN-BENIN </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="assets/img/icon.png">

  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

  <style>
    .active {
      color: #0b5e1e;
      border-bottom: 3px solid #0b5e1e;

    }
  </style>

</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.header')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs  text-dark" style="background-color: #fff;" data-aos="fade-in">
      <div class="container" style>
        <h2>Contacter-nous</h2>
        <p> Pour toute question ou suggestion, n'hésitez pas à nous contacter. </p>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      {{-- <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;"
          src="https://www.google.com/maps/embed/v1/place?q=Etoile+rouge,+Avenue+de+la+Victoire,+Cotonou,+Bénin&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"
          frameborder="0" allowfullscreen></iframe>
      </div> --}}

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Adresse:</h4>
                <p> </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>mongnedjo@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Téléphone:</h4>
                <p>+229 63 05 39 05 </p>
              </div>

            </div>
          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="/contact" method="post" role="form" class="php-email-form">
              @csrf
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="nom" class="form-control" id="nom" placeholder="Votre Nom" required>
                  @error('nom')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" required>
                  @error('email')
                  <div class="d-block text-danger">{{$message}}</div>
                  @enderror
                </div>

              </div>
              <div class="form-group mt-3">

                <select id="choix" value="{{ old('subjection') }}" class="form-control" name="subjection" required>
                  <option value="">Objet</option>
                  <option value="Masculin">Partenariat</option>
                  <option value="Feminin">Suggestion</option>
                  <option value="Masculin">Renseigement</option>
                  <option value="Feminin">Autres</option>
                </select>
                @error('subjection')
                <div class="d-block text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="commentaire" rows="5" placeholder="commentaire"
                  required></textarea>
                @error('commentaire')
                <div class="d-block text-danger">{{$message}}</div>
                @enderror
              </div>
              <div class="my-3">
                <div class="loading">Chargement</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a été envoyé. Merci!</div>
              </div>
              <div class="text-center"><button type="submit" style="background-color: #0b5e1e;">Soumettre</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container flex py-4">

      <div class="text-center">
        <div class="copyright">
          &copy; 2024 Action pour le Développement National <strong></strong>
        </div>
      </div>
      {{-- <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" style="background-color: #0b5e1e; color: #fff;" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" style="background-color: #0b5e1e; color: #fff;" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" style="background-color: #0b5e1e; color: #fff;" class="instagram"><i
            class="bx bxl-instagram"></i></a>
        <a href="#" style="background-color: #0b5e1e; color: #fff;" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" style="background-color: #0b5e1e; color: #fff;" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> --}}
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color: #0b5e1e;"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
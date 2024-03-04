<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/icon.png">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="/../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/../build/css/custom.min.css" rel="stylesheet">
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

        <!-- top navigation -->
       
        <!-- /top navigation -->

        <!-- page content -->
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Liste des Adherents</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      </li>
                      
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                    </p>
                    <div class="d-flex justify-content-end">
                      <a href="/titre/create" class="ml-auto">
                          <button type="button" class="btn btn-success">Ajouter</button>
                      </a>
                  </div>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>

                          <th>Titre</th>
                          <th>Manipulation</th>
                          <th>Manipulation</th>
                          
                        </tr>
                      </thead>

                      <tbody>
                        @foreach ($titres as $titre)
                          <tr>
                            <td>{{$titre->libelle}}</td>
                            <td>
                              <form action="{{ route('titre.destroy', $titre->id) }}" method="POST" onsubmit="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                  @csrf
                                  @method('DELETE')
                                  <button style="align-content: center;" class="btn btn-danger" type="submit" id="button-addon2">Supprimer</button>
                              </form>
                          </td>
                          <td>
                              <a href="/titre/{{$titre->id}}/edit" style="color: white;">
                                  <button style="align-content: center;" class="btn btn-success" type="button" id="button-addon2">Modifier</button>
                              </a>
                          </td>
                          </tr>
                        @endforeach
                      </tbody>
                                  
              </div>

        <!-- /page content -->
        <!-- footer content -->
        <footer>
          
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="/../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="/../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="/../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="/../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="/../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="/../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="/../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="/../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="/../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="/../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="/../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="/../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="/../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="/../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="/../vendors/jszip/dist/jszip.min.js"></script>
    <script src="/../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="/../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="/../build/js/custom.min.js"></script>

  </body>
</html>
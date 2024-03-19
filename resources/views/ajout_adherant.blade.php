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
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md ">
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

            <!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Enregistrez un {{ Auth::user()->type == "Administrateur" ? "Coordinateur" : "Adhérent"}}</h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="x_panel">
                    <div class="max-w-[100px]">

    <form id="formulaire" action="/adherant" method="post" onsubmit="return confirm('Inscription reçue ');" enctype="multipart/form-data" novalidate>
        @csrf
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Nom<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="nom"  placeholder="Nom en majuscule" required="required" value="{{ old('nom') }}"/>
            </div>
            @error('nom')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Prenom<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" class='optional' placeholder="La première lettre en majuscule" name="prenom" data-validate-length-range="5,15" type="text" value="{{ old('prenom') }}"/>
            </div>
            @error('prenom')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Sexe<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select id="choix" class="form-control forms-control-lg" name="sexe">
                    <option value="" disabled selected>Choisir</option>
                    <option value="Masculin" {{ old('sexe') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                    <option value="Feminin" {{ old('sexe') == 'Feminin' ? 'selected' : '' }}>Féminin</option>
                </select>
            </div>
            @error('sexe')
                <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" name="email" class='email' placeholder="Saisissez votre Email"  type="email"  value="{{ old('email') }}"/>
            </div>
            @error('email')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="tel" class='tel' placeholder="Saisissez votre Numéro" name="telephone" required='required' data-validate-length-range="8,20"  value="{{ old('telephone') }}"/>
            </div>
            @error('telephone')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Categories socio-pro<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select class="form-control forms-control-lg" name="fonction">
                    <option value="" disabled selected>Choisir</option>
                    <option value="Operateur Economique" {{ old('fonction') == 'Operateur Economique' ? 'selected' : '' }}>Operateur Economique</option>
                    <option value="Fonctionnaire d'état " {{ old('fonction') == "Fonctionnaire d'état" ? 'selected' : '' }}>Fonctionnaire d'état</option>
                    <option value="Salariés secteur privé" {{ old('fonction') == 'Salariés secteur privé' ? 'selected' : '' }}>Salariés secteur privé</option>
                    <option value="Elus" {{ old('sexe') == 'Elus' ? 'selected' : '' }}>Elus</option>
                    <option value="Artisans, commerçants" {{ old('fonction') == 'Artisans, commerçants' ? 'selected' : '' }}>Artisans, commerçants</option>
                    <option value="Autres" {{ old('fonction') == 'Autres' ? 'selected' : '' }}>Autres</option>
                </select>
            </div>
            @error('fonction')
                <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Profession<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" class='optional' name="profession" placeholder="Saisissez votre Profession" data-validate-length-range="5,15" type="text" value="{{ old('profession') }}" />
            </div>
            @error('profession')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Statut<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select id="choix" class="form-control forms-control-lg" name="statut" required>
                    <option value="" disabled selected>Choisir</option>
                    <option value="Au Chômage" {{ old('statut') == 'Au Chômage' ? 'selected' : '' }}>Au Chômage</option>
                    <option value="En Activiter" {{ old('statut') == 'En Activiter' ? 'selected' : '' }}>En Activité</option>
                </select>
                @error('statut')
                    <div class="d-block text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Type<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <select id="choix" class="form-control forms-control-lg" name="type" required>
                    <option value="" disabled>Choisir</option>
                    @if(Auth::user()->type === 'Administrateur')
                        <option value="Coordonnateur">Coordonnateur</option>
                    @elseif (Auth::user()->type === 'Coordonnateur')
                        <option value="Adhérent">Adhérent</option>
                    @endif
                </select>
                @error('type')
                    <div class="d-block text-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">NPI</label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="number" class='tel'
                    name="npi" data-validate-length-range="8,20" placeholder="Saisissez votre Numéro NPI" value="{{ old('npi') }}" />
            </div>
            @error('npi')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">RAVIP</label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="number" class='tel'
                    name="ravip" data-validate-length-range="8,20" placeholder="Saisissez votre Numéro RAVIP" value="{{ old('ravip') }}" />
            </div>
            @error('ravip')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div>
        {{-- <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Mot de
                passe<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control" type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}" title="Minimum 8 caractères dont une lettre majuscule et minuscule, un chiffre et un caractère unique" required  value="{{ old('password') }}"/>

                <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()">
                    <i id="slash" class="fa fa-eye-slash"></i>
                    <i id="eye" class="fa fa-eye"></i>
                </span>
            </div>
            @error('password')
            <div class="d-block text-danger">{{$message}}</div>
            @enderror
        </div> --}}

        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Titres</label>
            <div class="col-md-6 col-sm-6">
            <select id="choix" name="titre_id" class="form-control forms-control-lg">
                <option value="" disabled selected>Choisissez un Titre</option>
                @foreach ($titres as $titre)
                <option value="{{ $titre->id }}" {{ old('titre_id') == $titre->id ? 'selected' : '' }}>
                    {{ $titre->libelle }}
                </option>
                @endforeach
                @error('titre_id')
                <div class="d-block text-danger">{{$message}}</div>
                @enderror
            </select>
        </div>
        </div>

        <div class="field item form-group">
            
            <label class="col-form-label col-md-3 col-sm-3 label-align">Departement<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <select id="departement_id" name="departement_id" class="form-control forms-control-lg" required>
                <option value=""  disabled selected>Choisissez un departement
                </option>
                @foreach ($departements as $departement)
                <option value="{{ $departement->id }}" {{ old('departement_id') == $departement->id ? 'selected' : '' }}>
                    {{ $departement->libelle }}
                </option>
                </option>
                @endforeach
                @error('departement_id')
                <div class="d-block text-danger">{{$message}}</div>
                @enderror
            </select>
        </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Commune<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <select id="commune_id" value="{{ old('commune_id') }}" name="commune_id" class="form-control forms-control-lg" required>
                <option value="" disabled selected>Choisissez une commune
                </option>
                {{-- @foreach ($communes as $commune)
                <option value="{{$commune ->id}}">{{$commune->libelle}}</option>
                @endforeach
                @error('commune_id')
                <div class="d-block text-danger">{{$message}}</div>
                @enderror --}}
            </select>
            </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Arrondissement<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <select id="arrondissement_id" value="{{ old('arrondissement_id') }}" name="arrondissement_id" class="form-control forms-control-lg" required>
                <option value="" disabled selected>Choisissez un Arrondissement
                </option>
                {{-- @foreach ($arrondissements as $arrondissement)
                <option value="{{$arrondissement ->id}}">
                    {{$arrondissement->libelle}}</option>
                @endforeach
                @error('arrondissement_id')
                <div class="d-block text-danger">{{$message}}</div>
                @enderror --}}
            </select>
        </div>
        </div>
        <div class="field item form-group">
            <label class="col-form-label col-md-3 col-sm-3  label-align">Quartier<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
            <select id="quartier_id" value="{{ old('quartier_id') }}" name="quartier_id" class="form-control forms-control-lg" required>
                <option value="" disabled selected>Choisissez un Quartier
                </option>
                {{-- @foreach ($quartiers as $quartier)
                <option value="{{$quartier ->id}}">{{$quartier->libelle}}
                </option>
                @endforeach
                @error('quartier_id')
                <div class="d-block text-danger">{{$message}}</div>
                @enderror --}}
            </select>
                 @error('quartier_id')
                <div class="d-block text-danger">{{$message}}</div>
                @enderror 
        </div>
        </div>


    <div class="field item form-group">
    <label class="col-form-label col-md-3 col-sm-3  label-align">Photo<span class="required">*</span></label>
    <input type="file" id="photo" value="{{ old('photo') }}" name="photo" accept="image/*">
    @error('photo')
    <div class="d-block text-danger">{{$message}}</div>
    @enderror
    </div> 

    <div class="ln_solid">
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='submit' class="btn btn-primary">Soumettre</button>
            <button type='reset' class="btn btn-success">Annuler</button>
        </div>
    </div>
    </div>
    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page content -->
            <!-- footer content -->
            <footer>
                <div class="pull-right">
                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
    </div>


      <!-- Modal -->
      {{-- <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" style="display:none">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="successModalLabel">Success!</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Your submission was successful!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div> --}}



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="../vendors/validator/multifield.js"></script>
    <script src="../vendors/validator/validator.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Javascript functions	-->
    <script>
        // $('#formulaire').submit(function (event) {
        //     event.preventDefault();
        //     $.ajax({
        //         url: $(this).attr('action'),
        //         type: $(this).attr('method'),
        //         data: $(this).serialize(),
        //         success: function(response) {
        //         // Show success modal upon successful submission
        //         $('#successModal').modal('show');
        //         },
        //         error: function(xhr, status, error) {
        //         // Handle errors if needed
        //         }

        //     });
        
        // })

        function hideshow() {
            var password = document.getElementById("password1");
            var slash = document.getElementById("slash");
            var eye = document.getElementById("eye");

            if (password.type === 'password') {
                password.type = "text";
                slash.style.display = "block";
                eye.style.display = "none";
            } else {
                password.type = "password";
                slash.style.display = "none";
                eye.style.display = "block";
            }

        }

    </script>

    <script>


        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true
                , validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

    <script>
        var routes = {
            getCommunes: "{{ route('get-communes', ':departementId') }}"
            , getArrondissements: "{{ route('get-arrondissements', ':communeId') }}"
            , getQuartiers: "{{ route('get-quartiers', ':arrondissementId') }}"
        };

    </script>

    <script>
        $(document).ready(function() {
            // Détection des changements de sélection pour le département
            $('#departement_id').change(function() {
                var departementId = $(this).val();
                if (departementId) {
                    var url = "{{ route('get-communes', ':departementId') }}";
                    url = url.replace(':departementId', departementId);
                    //  $('#commune_id').attr('data-url', url);
                    // Appeler la fonction pour charger les options pour la commune
                    loadOptions(url, $('#commune_id'));
                }
            });

            // Détection des changements de sélection pour la commune
            $('#commune_id').change(function() {
                var communeId = $(this).val();

                var url = "{{ route('get-arrondissements', ':communeId') }}";
                url = url.replace(':communeId', communeId);
                $('#commune_id').attr('data-url', url)
                var arrondissementSelect = $('#arrondissement_id');
                loadOptions(url + '/', arrondissementSelect);
            });

            // Détection des changements de sélection pour l'arrondissement
            $('#arrondissement_id').change(function() {
                var arrondissementId = $(this).val();

                var url = "{{ route('get-quartiers', ':arrondissementId') }}";
                url = url.replace(':arrondissementId', arrondissementId);
                $('#arrondissement_id').attr('data-url', url)
                var quartierSelect = $('#quartier_id');
                loadOptions(url + '/', quartierSelect);

            });

            // Fonction pour charger les options en fonction de l'URL spécifiée
            function loadOptions(url, targetSelect) {
                $.ajax({
                    type: "GET"
                    , url: url
                    , success: function(options) {
                        targetSelect.empty();
                        targetSelect.append('<option value="selected ' + '">' + 'Choisissez' + '</option>');
                        $.each(options, function(key, value) {
                            targetSelect.append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });
            }
        });

    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery -->
    <script src="/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="/vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>

</body>

</html>

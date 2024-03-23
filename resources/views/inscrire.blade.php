<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/img/icon.png">

    <title>ADN-BENIN</title>

  
    
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
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body class="nav-md">

        
    {{-- <script>
        // Fonction pour afficher une boîte de dialogue de confirmation avant la soumission du formulaire
        function confirmSubmit() {
            return confirm("Voulez-vous soumettre ce formulaire ?");
        }
    </script>

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif

    @if(session()->has('errors'))
    <div class="alert alert-danger">
        <strong>Erreurs :</strong>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}

    <div class="container body">
       
        <div class="main_container" >
            <div role="main">
                <div class="page-title text-white p-3 mb-4" style="background-color: #0b5e1e;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <a href="javascript:history.back()" class="btn btn-secondary float-end">
                                    <i class="bi bi-arrow-left"></i> Retour
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="clearfix"></div>
           
            <div class="row bg-blue-300">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="col-md-12 text-center">
                            <h3 class="mt-3 mt-md-0">S'inscrire</h3>
                        </div>
                        <div class="x_content">
                            
                            <form class="" action="/inscrire" method="post"
                                enctype="multipart/form-data" novalidate>
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
                                        @error('sexe')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                    </div>
                                    
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
                                        <input class="form-control" type="tel" class='tel' placeholder="Saisissez votre Numéro" name="telephone" required='required' value="{{ old('telephone') }}"/>
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
                                            <option value="Elus" {{ old('fonction') == 'Elus' ? 'selected' : '' }}>Elus</option>
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
                                        <input class="form-control" class='optional' name="profession" placeholder="Saisissez votre Profession" type="text" value="{{ old('profession') }}" />
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
                                            <option value="Au chômage" {{ old('statut') == 'Au chômage' ? 'selected' : '' }}>Au chômage</option>
                                            <option value="En activité" {{ old('statut') == 'En activité' ? 'selected' : '' }}>En activité</option>
                                        </select>
                                        @error('statut')
                                            <div class="d-block text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">NPI</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" class='tel'
                                            name="npi" data-validate-length-range="10,20" placeholder="Saisissez votre Numéro NPI" value="{{ old('npi') }}" />
                                    </div>
                                    @error('npi')
                                    <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">RAVIP</label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="number" class='tel'
                                            name="ravip" data-validate-length-range="10,20" placeholder="Saisissez votre Numéro RAVIP" value="{{ old('ravip') }}" />
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
                        
                                {{-- <div class="field item form-group">
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
                                </div> --}}
                        
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
                        
                            <div class="ln_solid">
                            <div class="form-group">
                                <div class="col-md-6 offset-md-3">
                                    <button type='submit' class="btn btn-primary">Soumettre</button>
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
    <footer class="bg-dark text-white py-4">
        <div class="container text-center">
            <p class="m-0">&copy; 2024 Action pour le Développement National</p>
        </div>
    </footer>
    <!-- /footer content -->
    </div>
    </div>

    <script>
        // Ecouter la réponse JSON
        $(document).ready(function() {
            if(session('success')){
                // Afficher une boîte de dialogue avec SweetAlert
                swal({
                    title: "Inscription Reçu !",
                    text: "{{ session('success') }}",
                    icon: "success",
                    button: "OK"
                });
            }
        });
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/vendors/validator/multifield.js"></script>
    <script src="/vendors/validator/validator.js"></script>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>









    <!-- Javascript functions	-->
    <script>
        function hideshow(){
        var password = document.getElementById("password1");
        var slash = document.getElementById("slash");
        var eye = document.getElementById("eye");
        
        if(password.type === 'password'){
            password.type = "text";
            slash.style.display = "block";
            eye.style.display = "none";
        }
        else{
            password.type = "password";
            slash.style.display = "none";
            eye.style.display = "block";
        }

    }
    </script>

    <script>
        function confirmerInscription() {
            // Vérifiez ici si les champs obligatoires sont remplis
            var nom = document.getElementById('nom').value;
            var prenom = document.getElementById('prenom').value;
            var sexe = document.getElementById('sexe').value;
            var telephone = document.getElementById('telephone').value;
            var profession = document.getElementById('profession').value;
            var statut = document.getElementById('statut').value;
            var fonction = document.getElementById('fonction').value;
            var type = document.getElementById('type').value;
            // Ajoutez d'autres vérifications si nécessaire

            // Si les champs obligatoires ne sont pas remplis, ne pas afficher la boîte de dialogue
            if (nom === '' || prenom === '' sexe === '' || telephone === '' profession === '' || statut === ''fonction === '' || type === '') {
                return true; // Le formulaire sera soumis normalement
            }

            // Si les champs obligatoires sont remplis, afficher la boîte de dialogue de confirmation
            return confirm('Inscription reçue ?');
        }
    </script>
    <script>
    function confirmerInscription() {
        // Vérifiez ici si les champs obligatoires sont remplis
        var nom = document.getElementById('nom').value;
        var prenom = document.getElementById('prenom').value;
        // Ajoutez d'autres vérifications si nécessaire

        // Si les champs obligatoires ne sont pas remplis, ne pas afficher la boîte de dialogue
        if (nom === '' || prenom === '') {
            return true; // Le formulaire sera soumis normalement
        }

        // Si les champs obligatoires sont remplis, afficher la boîte de dialogue de confirmation
        return confirm('Inscription reçue ?');
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
        var submit = true,
            validatorResult = validator.checkAll(this);
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
    <!-- <script src="/vendors/validator/validator.js"></script> -->

    <!-- Custom Theme Scripts -->
    <script src="/build/js/custom.min.js"></script>
    
</body>

</html>
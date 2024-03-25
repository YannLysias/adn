<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/assets/img/icon.png">

    <title>ADN-BENIN</title>

    <!-- Bootstrap -->
    <link href="/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom Theme Style -->
    <link href="/build/css/custom.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body class="nav-md">
    <script>
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
    @endif

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
                            <h3 class="mt-3 mt-md-0">S'inscrire(Diaspora)</h3>
                        </div>
                        <div class="x_content">
                            
                            <form class="" action="/diaspora" method="post"
                                enctype="multipart/form-data" novalidate >
                                @csrf

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nom<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="nom" placeholder="Nom en majuscule"
                                            required="required" value="{{ old('nom') }}" />
                                    </div>
                                    @error('nom')
                                    <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Prénom(s)<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='optional' name="prenom" required="required"
                                             type="text" value="{{ old('prenom') }}" />
                                    </div>
                                    @error('prenom')
                                    <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Sexe<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                    <select  value="{{ old('sexe') }}" class="form-control forms-control-lg" name="sexe" >
                                        <option value="" disabled selected>Choisir</option>
                                        <option value="Masculin">M</option>
                                        <option value="Feminin">F</option>
                                    </select>
                                </div>
                                    @error('sexe')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email<span
                                            class=""></span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" name="email"  class='email'
                                             type="email" value="{{ old('email') }}" />
                                    </div>
                                    @error('email')
                                    <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" type="tel" class='tel' name="telephone"
                                            required='required' 
                                            value="{{ old('telephone') }}" />
                                    </div>
                                    @error('telephone')
                                    <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Profession<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" class='optional' required="required"
                                            name="profession"  type="text"
                                            value="{{ old('prenom') }}" />
                                    </div>
                                    @error('profession')
                                    <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Ville/pays<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control" id="ville" placeholder="Saississez votre Ville (Pays)" class='optional' name="pays" 
                                            type="text" value="{{ old('pays') }}" />
                                            <div id="suggestions" class="suggestions-container"></div>
                                        </div>
                                    @error('pays')
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
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Catégories socio-pro<span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control forms-control-lg" name="fonction">
                                            <option value="" disabled selected>Choisir</option>
                                            <option value="Operateur Economique" {{ old('fonction') == 'Operateur Economique' ? 'selected' : '' }}>Operateur Economique</option>
                                            <option value="Fonctionnaire d'état " {{ old('fonction') == "Fonctionnaire d'état" ? 'selected' : '' }}>Fonctionnaire d'état</option>
                                            <option value="Salariés secteur privé" {{ old('fonction') == 'Salariés secteur privé' ? 'selected' : '' }}>Salariés secteur privé</option>
                                            <option value="Elus" {{ old('sexe') == 'Elus' ? 'selected' : '' }}>Elus</option>
                                            <option value="Artisans" {{ old('fonction') == 'Artisans' ? 'selected' : '' }}>Artisans</option>
                                            <option value="commerçants" {{ old('fonction') == 'commerçants' ? 'selected' : '' }}>Commerçants</option>
                                            <option value="Etudiant(e)" {{ old('fonction') == 'Etudiant(e)' ? 'selected' : '' }}>Etudiant(e)</option>
                                            <option value="Autres" {{ old('fonction') == 'Autres' ? 'selected' : '' }}>Autres</option>
                                        </select>
                                    </div>
                                    @error('fonction')
                                        <div class="d-block text-danger">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary mt-3">Soumettre</button>
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="/vendors/validator/multifield.js"></script>
    <script src="/vendors/validator/validator.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>  
    //  $('#choix').change(function() {
    //     let input = this.value;
    //       if (input == 'Diaspora') {
    //         $("#pays").addClass('invisible')
    //         $("#pays").removeClass('visible')
    //       }else{
    //         $("#pays").addClass('visible')
    //         $("#pays").removeClass('invisible')
    //       }

    //     })

            // Fonction exécutée lorsque le bouton est cliqué
            $('#diasporaButton').click(function() {
                // Masquer la div #pays
                $('#pays').hide();
            });
        document.getElementById('ville').addEventListener('input', function() {
         
            var input = this.value;
            var username = 'yannlysias'; // Remplacez YOUR_GEONAMES_USERNAME par votre nom d'utilisateur Geonames
            var url = 'http://api.geonames.org/searchJSON?q=' + input + '&maxRows=10&username=' + username;

            // Envoi de la requête à l'API Geonames
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // Traiter les données retournées par l'API et afficher les suggestions à l'utilisateur
                    // Par exemple, vous pouvez créer une liste déroulante avec les suggestions de villes
                    var suggestionsContainer = document.getElementById('suggestions');
                    suggestionsContainer.innerHTML = ''; // Effacer les anciennes suggestions

                    // Parcourir les résultats de la recherche et afficher les suggestions
                    data.geonames.forEach(function(ville) {
                        var suggestion = document.createElement('div');
                        suggestion.textContent = ville.name + ' (' + ville.countryName + ')'; // Ajouter le nom du pays
                        suggestion.addEventListener('click', function() {
                            document.getElementById('ville').value = ville.name + ' (' + ville.countryName + ')';
                            suggestionsContainer.innerHTML = ''; // Effacer la liste déroulante après la sélection
                        });

                        suggestionsContainer.appendChild(suggestion);
                    });
                })
                .catch(error => console.error('Erreur lors de la récupération des suggestions de villes depuis Geonames :', error));
        });
    </script>






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
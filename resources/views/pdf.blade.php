<!DOCTYPE html>
<html>
<head>
    <title>Liste des utilisateurs</title>
</head>
<body>
    <header>
        <h1>En-tête du document PDF</h1>
        <!-- Autres éléments d'en-tête -->
    </header>

    <main>
        <!-- Contenu de votre tableau ou autre contenu à afficher -->
        <table>
            <thead>
                <tr>

                  <th>Nom</th>
                  <th>Prenom</th>
                  <th>Sexe</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Profession</th>
                  <th>Titre</th>
                  <th>Manipulation</th>
                  <th>Manipulation</th>
                </tr>
              </thead>
              <tbody id="listAdherant">
                @foreach ($adherants as $adherant)
                <tr>
                  <td>{{$adherant->nom}}</td>
                  <td>{{$adherant->prenom}}</td>
                  <td>{{$adherant->sexe}}</td>
                  <td>{{$adherant->telephone}}</td>
                  <td>{{$adherant->email}}</td>
                  <td>{{$adherant->profession}}</td>
                  <td>{{$adherant->type}}</td>
                  <td>
        </table>
    </main>
    <footer>
        <p>Pied de page du document PDF</p>
        <!-- Autres éléments de pied de page -->
    </footer>
</body>
</html>
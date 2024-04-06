<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>main</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

       
    </head>
    <body ><!--action="{{ route('addUser') }}"-->
     <h1>welcome admin</h1>
     @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
       @endif 
       @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div id="forms-container">
    @if($isAdmin)
    <form id="addUserForm" method="GET">
        <button id="addUserBtn" type="button" class="btn btn-primary">ajouter utilisateur</button>
    </form>
    
    <form id="showUsersForm" action="{{route('showUsers')}}" method="GET">
     @csrf
     <button id="showUsers" type="submit"> showUsers</buttn>
    </form><br>
   
    <form id="modifyUserForm" method="POST">
     @csrf
     <button id="modifyUserBtn" class="btn btn-primary" type="button"> modifier utilisateur</buttn>
    </form><br>

    <form id="addPatrimoineForm"  method="GET">
     @csrf
     <button type="button" class="btn btn-primary" id="addPatrimoineBtn"> ajouter patrimoine</buttn>
    </form>

    @endif

    <form id="showPatrimoine" action="{{route('showPatrimoine')}}" method="GET">
     @csrf
     <button id="showPatrimoine"  type="submit"> showPatrimoine</buttn>
    </form><br>
    </div>

    <script>
    $(document).ready(function() {
        $('#addUserBtn').click(function() {
            $('showUsersForm').remove();
            $('#modifyUserForm').remove(); // Remove the modify user form
            $('#addPatrimoineForm').remove(); // Remove the add patrimoine form
            $('#addUserForm').remove(); // Remove any existing add user form
            $('#forms-container').append(
                ` <form id="addUserForm" action="{{ route('storeUser') }}" method="POST">@csrf <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="role">Role</label>
            <input type="text" class="form-control" id="role" name="role" placeholder="Enter role">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter nom">
        </div>
        <div class="form-group">
            <label for="idUser">idUser</label>
            <input type="text" class="form-control" id="idUser" name="idUser" placeholder="idUser">
        </div>
        <div class="form-group">
            <label for="matricule">matricule/label>
            <input type="text" class="form-control" id="matricule" name="matricule" placeholder="matricule">
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="password ">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>`);
        });

        $('#modifyUserBtn').click(function() {
            $('#addUserForm').remove();
            $('showUsersForm').remove();
            $('#addPatrimoineForm').remove();
            $('#forms-container').append(`
    <form action="{{ route('storeNewUser') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="text" name="nom" placeholder="nom">
    <input type="text" name="role" placeholder="role">
    <input type="text" name="matricule" placeholder="matricule">
    <input type="text" name="username" placeholder="username">
    <button type="submit">Add User</button>
</form>`);
        });
       $('#addPatrimoineBtn').click(function() {
            $('#addUserForm').remove();
            $('#modifyUserForm').remove();
            $('showUsersForm').remove();
            $('#forms-container').append(`<form id="addPatrimoineBtn" action="{{ route('addPatrimoine') }}" method="POST">@csrf <div class="form-group">
            <label for="idMateriel">idMateriel</label>
            <input type="text" class="form-control" id="idMateriel" name="idMateriel" placeholder="idMateriel">
        </div>
        <div class="form-group">
            <label for="email">nom</label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="nom">
        </div>
        <div class="form-group">
            <label for="role">numInv</label>
            <input type="text" class="form-control" id="numInv" name="numInv" placeholder="numInv">
        </div>
        <div class="numSalle">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="numSalle" name="numSalle" placeholder="numSalle">
        </div>
        <div class="form-group">
            <label for="nom">direction</label>
            <input type="text" class="form-control" id="direction" name="direction" placeholder="direction">
        </div>
        <div class="statut">
            <label for="nom">statut</label>
            <input type="text" class="form-control" id="statut" name="statut" placeholder="statut">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>`)
    });
});

</script>
    </body>
</html>

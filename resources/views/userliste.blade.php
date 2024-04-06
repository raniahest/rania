<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>main</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
    <h1>All Users</h1>
<table>
    <thead>
        <tr>
            <th>idUser</th>
            <th>Name</th>
            <th>Email</th>
            <th>role</th>
            <th>username</th>
            <th>nom</th>
            <th>Action</th>
            <th>supprimer</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr class="user-row" >
         <td>{{ $user->idUser }}</td>
         <td>{{ $user->name }}</td>
         <td>{{ $user->email }}</td>     
         <td>{{ $user->role }}</td>
         <td>{{ $user->username }}</td>
         <td>{{ $user->nom }}</td>
         <td>
          <!-- Button to trigger user modification -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal_{{ $user->idUser}}">Modifier</button>
<!-- Modal -->
<div class="modal fade" id="myModal_{{$user->idUser }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for submission -->
                <form action="{{ route('submitForm', ['idUser' =>  $user->idUser]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="idUser" id="modifyUserId" value="{{ $user->idUser }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" class="form-control" id="role" name="role">
                    </div>
                    <!-- Add more form fields as needed -->
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
                </td> 
                <td>
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModals_{{ $user->idUser}}">supprimer</button>
         <div class="modal fade" id="myModals_{{$user->idUser }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for submission -->
                <form action="{{ route('deleteUser', ['idUser' =>  $user->idUser]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="idUser" id="deleteUserId" value="{{ $user->idUser }}">
                   <p>are u sure?</p>
                    <!-- Add more form fields as needed -->
                    <button type="submit" class="btn btn-primary">yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
            </td>            
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Bootstrap JS (jQuery dependency) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>

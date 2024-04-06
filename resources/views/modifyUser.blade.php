<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>main</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       
    </head>
    <body >

    
    <form action="{{ route('storeNewUser') }}" method="POST">
    @csrf
    <!-- Add your form fields here -->
    <input type="text" name="name" placeholder="Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="text" name="nom" placeholder="nom">
    <input type="text" name="role" placeholder="role">
    <input type="text" name="matricule" placeholder="matricule">
    <input type="text" name="username" placeholder="username">
    <button type="submit">Add User</button>
</form>
    </body>
</html>
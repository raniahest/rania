<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>login</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
          .form{
    border-width: 1px;
    width: 400px;
    height: 40px;
    border-radius: 0;
    border: 1px solid #ccc; 
}
#mdp{
  margin-bottom: 20px;
  color: #3753d7;
  font-family: Arial, Helvetica, sans-serif ;
  font-size: 14px;
  font-weight: bold; 
  padding-left: 10px;
}
input[type="password"]:focus,
input[type="email"]:focus,
textarea:focus {
   border-left:4px solid #3753d7;
   outline: none;
}
#login{
    color: #3753d7;
    font-family: Arial, Helvetica, sans-serif ;
    font-size: 14px;
    font-weight: bold; 
    padding-left: 10px;
    
}
#connexion{
    background-color:#3753d7 ;
    color: white;
    font-weight: bold;
    width: 100%;
}
h1{
    color: #3753d7;
    margin-bottom: 40px;
}
h2{
    padding-bottom: 30px;
}
p{
    color: #818181;
    font-size: small;
}
#left{
    margin-left: 50px;
    width: 50%;
   
}
#grayBox{
    display: flex;
    justify-content:center ;
    align-items: center;
    background-color: #f4f4f4;
    width: 50%;
   
}
.flex-container{
    display: flex;
    width: 100%;
    height: 100vh;
    padding: 0px; 
    box-sizing: border-box; 
}
#mdpo{
    margin-left: 100px;
    font-family: Arial, Helvetica, sans-serif ;
    font-size: 14px;
    font-weight: bold; 
    margin-bottom: 0px;
}
#connecter{
   /* background-color: pink;*/
    width: 410px;
}
p{
    font-family: Arial, Helvetica, sans-serif ;
    font-size: 14px;
    font-weight:normal; 
}
#erreur{
    width: 410px;
    font-size: 12px;
    color: red;
    position: relative; 
    top: -15px;
}
    </style>
       
    </head>
    <body >
<div class="flex-container">
  <div id="left">
  <img src="/images/inapi.jpg" alt="Description of image" width="350" height="150">
     <h1>Gestion de parc informatique</h1> 

      <p>bienvenue!veuiller connecter a votre compte<p>

      <form action="{{route('dologin')}}" method="POST">
      @csrf
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
       @endif 
       @csrf
        <input type="email" id="login" class="form" name="email" placeholder="adresse email" ><br>
        <input type="password" id="mdp" class="form" name="password" placeholder="mot de passe"><br>
        
        <div id="connecter" dir="rtl">
           <p id="mdpo">? mot de passe oublier</p>
           <button  class="form"  id="connexion">connecter</button>
        </div>
      </form>
</div>
      <div id="grayBox">
      <img src="/images/bure.png" width=60% >
    </div>
   </div> 

    </body>
</html>

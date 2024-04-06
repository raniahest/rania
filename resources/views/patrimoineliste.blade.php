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
    <h1>All materiel</h1>
<table>
    <thead>
        <tr>
            <th>idMateriel</th>
            <th>numInv</th>
            <th>numSalle</th>
            <th>direction</th>
            <th>statut</th>
            <th>nom</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($materiels as $materiel)
      <tr class="user-row" >
         <td>{{ $materiel->idMateriel }}</td>
         <td>{{ $materiel->numInv }}</td>
         <td>{{ $materiel->numSalle }}</td>     
         <td>{{ $materiel->direction }}</td>
         <td>{{ $materiel->statut }}</td>
         <td>{{ $materiel->nom }}</td>
         <td>
          <!-- Button to trigger user modification -->
          <!-- Button to trigger patrimoine modification -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalp_{{ $materiel->idMateriel}}">Modifier</button>

<!-- Modal -->
<div class="modal fade" id="myModalp_{{ $materiel->idMateriel}}" tabindex="-1" role="dialog" aria-labelledby="modifyPatrimoineModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modifyPatrimoineModalLabel">Modifier Patrimoine</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form for patrimoine modification -->
        <form action="{{ route('submitFormP',['idMateriel' => $materiel->idMateriel]) }}" method="POST">
          @csrf
          <input name="idMateriel" id="modifyPatrimoineId" value="{{$materiel->idMateriel }}">
          <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom">
          </div>
          <div class="form-group">
            <label for="numInv">Numéro Inventaire</label>
            <input type="text" class="form-control" id="numInv" name="numInv">
          </div>
          <div class="form-group">
            <label for="numSalle">Numéro Salle</label>
            <input type="text" class="form-control" id="numSalle" name="numSalle">
          </div>
          <div class="form-group">
            <label for="direction">Direction</label>
            <input type="text" class="form-control" id="direction" name="direction">
          </div>
          <div class="form-group">
            <label for="statut">Statut</label>
            <input type="text" class="form-control" id="statut" name="statut">
          </div>
          <!-- Add more form fields as needed -->
          <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
      </div>
    </div>
  </div>
</div>
                </td>  
           
                <td>
   @if ($materiel->statut === 'normal')
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalt_{{ $materiel->idMateriel }}">Transfert</button>
        <div class="modal fade" id="myModalt_{{ $materiel->idMateriel }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Transfert</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- First form for input fields -->
                        <form action="{{ route('transfert', ['idMateriel' => $materiel->idMateriel]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="idMateriel" value="{{ $materiel->idMateriel }}">
                            <div class="form-group">
                                <label for="numSalle">Numéro Salle</label>
                                <input type="text" class="form-control" id="numSalle" name="numSalle" value="{{ $materiel->numSalle }}">
                            </div>
                            <div class="form-group">
                                <label for="direction">Direction</label>
                                <input type="text" class="form-control" id="direction" name="direction" value="{{ $materiel->direction }}">
                            </div>
                        <button type="submit" class="btn btn-primary" >Transférer</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <button type="button" class="btn btn-primary" disabled>Transfert</button>
      @endif
   </td>   
             <td>
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModals_{{ $materiel->idMateriel}}">supprimer</button>
         <div class="modal fade" id="myModals_{{ $materiel->idMateriel }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">supprimer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for submission -->
                <form action="{{ route('deletePat', ['idMateriel' => $materiel->idMateriel]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="idMateriel" id="deletePatrimoineId" value="{{ $materiel->idMateriel}}">
                   <p>are u sure?</p>
                    <!-- Add more form fields as needed -->
                    <button type="submit" class="btn btn-primary">yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
            </td>    
            <td>
            @if ( $materiel->statut === 'normal')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalf_{{ $materiel->idMateriel}}">reformer</button>
         <div class="modal fade" id="myModalf_{{ $materiel->idMateriel }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">reformer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for submission -->
                <form action="{{ route('reformer', ['idMateriel' => $materiel->idMateriel]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="idMateriel" id="reformerPatrimoineId" value="{{ $materiel->idMateriel}}">
                   <p>are u sure?</p>
                    <!-- Add more form fields as needed -->
                    <button type="submit" class="btn btn-primary">yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
            @else
                <button type="button" class="btn btn-primary" disabled>reformer</button>
            @endif
        </td>                
        <td>
            @if ( $materiel->statut === 'reformer')
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalv_{{ $materiel->idMateriel}}">vendre</button>
         <div class="modal fade" id="myModalv_{{ $materiel->idMateriel }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">vendre</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form for submission -->
                <form action="{{ route('vendre', ['idMateriel' => $materiel->idMateriel]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="idMateriel" id="vendrePatrimoineId" value="{{ $materiel->idMateriel}}">
                   <p>are u sure?</p>
                    <!-- Add more form fields as needed -->
                    <button type="submit" class="btn btn-primary">yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
            @else
                <button type="button" class="btn btn-primary" disabled>vendre</button>
            @endif
        </td>                    
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Bootstrap JS (jQuery dependency) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</script>  </body>
</html>
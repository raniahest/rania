<?php

namespace App\Http\Controllers;

use App\Http\Requests\addPrequest;
use Illuminate\Http\Request;
use App\Models\Materiel;
class patrimoineController extends Controller
{
    public function addPatrimoine(addPrequest $request)
    { //dd($request->all());
        $Patrimoineinfo = $request->validated();
        // Create a new patrimoine instance
        $PatrimoineInst = Materiel::create([
            'idMateriel' => $Patrimoineinfo ['idMateriel'],
            'nom' => $Patrimoineinfo ['nom'],
            'numInv' =>$Patrimoineinfo ['numInv'], 
            'numSalle'=>$Patrimoineinfo ['numSalle'],
            'direction' => $Patrimoineinfo ['direction'],
            'statut'=>$Patrimoineinfo  ['statut'], 
        ]);
       
        // Redirect or return a response after storing the user
       return redirect()->route('main')->with('success', 'User created successfully!');
    }
    public function showpatrimoine()
{
    $patrimoines = Materiel::all();
    return view('patrimoineliste', ['materiels' => $patrimoines]);
}

public function submitFormP(Request $request, $idMateriel)
    {
        $patrimoine = Materiel::findOrFail($idMateriel);
        if ($request->filled('numInv')) {
            $patrimoine->numInv = $request->input('v');
        }
        if ($request->filled('numSalle')) {
            $patrimoine->numSalle = $request->input('numSalle');
        }
        if ($request->filled('direction')) {
            $patrimoine->direction = $request->input('direction');
        }
        if ($request->filled('statut')) {
            $patrimoine->statut = $request->input('statut');
        }
        if ($request->filled('nom')) {
            $patrimoine->nom = $request->input('nom');
        }
    // Save the updated user
        $patrimoine->save();
    
        // Redirect back or return a response
        return redirect()->back()->with('success', 'User info updated successfully!');
}
public function deletePat( $idMateriel){
    // Find the user by ID
$patrimoine = Materiel::findOrFail($idMateriel);

// Delete the user
$patrimoine->delete();

// Redirect back or return a response as needed
return redirect()->back()->with('success', 'User deleted successfully!');
}
public function reformer( $idMateriel){
    // Find the user by ID
$patrimoine = Materiel::findOrFail($idMateriel);

// Delete the user
$patrimoine->update(['statut' => 'reformer']);

// Redirect back or return a response as needed
return redirect()->back()->with('success', 'User deleted successfully!');
}
public function vendre( $idMateriel){
    // Find the user by ID
$patrimoine = Materiel::findOrFail($idMateriel);
// Delete the user
$patrimoine->update(['statut' => 'vendu']);
// Redirect back or return a response as needed
return redirect()->back()->with('success', 'User deleted successfully!');
}
public function transfert(Request $request, $idMateriel)
    {
        $patrimoine = Materiel::findOrFail($idMateriel);
        if ($request->filled('numSalle')) {
            $patrimoine->numSalle = $request->input('numSalle');
        }
        if ($request->filled('direction')) {
            $patrimoine->direction = $request->input('direction');
        }
      
        $patrimoine->save();
    
        // Redirect back or return a response
        return redirect()->back()->with('success', 'User info updated successfully!');
}

}

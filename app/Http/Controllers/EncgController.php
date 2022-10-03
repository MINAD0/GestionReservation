<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Filier;
use App\Models\Consultant;
use App\Models\Salle;
use Illuminate\Http\Request;

class EncgController extends Controller
{
    public function accueil()
    {
        // dd('ok');
        $reservations = Reservation::latest()->paginate();
        return view('encglist', compact('reservations'));
    }

    public function transfer(Request $request)
    {
        $filiers = Filier::all();
        $salles = Salle::all();
        $consultants = Consultant::all();
        return view('encgAjoute', compact('filiers','salles','consultants'));
    }

    public function modifier(Request $request)
    {
        $filiers = Filier::all();
        $salles = Salle::all();
        $consultants = Consultant::all();
        $reservation = Reservation::where(['id'=>Request('id')])->first();//delete()
        return view('modifier',['reservation'=>$reservation , 'filiers'=>$filiers, 'salles'=>$salles, 'consultants'=>$consultants]);
    }

    public function ajour(Request $request, Reservation $reservation)
    {
        $reservation = Reservation::where(['id'=>Request('id')])->update(
            [
                'filier_id' => Request('filier'),
                'groupe' => Request('groupe'),
                'salle_id' => Request('salle'),
                'date_Debut' => Request('dateD'),
                'date_Fin' => Request('dateF'),
                'type' => Request('type'),
                'choix' => Request('choix'),
            ]
        );
        return view('encglist')
        ->with('success','reservaton bien modifier');
    }

    public function ajoute(Request $request){
        $reservations = new Reservation();
        //dd(Request('type'));
        $reservations->filier_id = Request('filier');
        $reservations->groupe = Request('groupe');
        $reservations->salle_id = Request('salle');
        $reservations->date_Debut = Request('dateD');
        $reservations->date_Fin = Request('dateF');
        $reservations->type = Request('type');
        $reservations->choix = Request('choix');

        $reservations->save();
        return redirect()->route('Accueil')
        ->with('success','reservation added successfully');
    }
}

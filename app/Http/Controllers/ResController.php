<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Filier;
use App\Models\Consultant;
use App\Models\Salle;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ConsultantMail;
use App\Mail\NotifiMail;
use App\Http\Requests\ReservationRequest;

class ResController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->paginate();
        return view('welcome', compact('reservations'));
    }

    public function create()
    {
        $reservations = Reservation::latest()->paginate();
        return view('create',['reservations'=>$reservations]);

    }

    public function data(Request $request)
    {
        $filiers = Filier::all();
        $salles = Salle::all();
        $consultants = Consultant::all();
        return view('create', compact('filiers','salles','consultants'));
    }

    public function listconsultant(Request $request){
        $consultants = Consultant::all();
        return view('ajouteCon',compact('consultants'));
    }

    public function Save(ReservationRequest $request){

        $reservations = new Reservation();
        //dd(Request('type'));
        $reservations->filier_id = Request('filier');
        $reservations->groupe = Request('groupe');
        $reservations->salle_id = Request('salle');
        $reservations->date_Debut = Request('dateD');
        $reservations->date_Fin = Request('dateF');
        $reservations->type = Request('type');
        $reservations->choix = Request('choix');
        $reservations->consultant_id = Request('consultant');

        $reservations->save();
        return redirect()->route('index')
        ->with('success','reservation added successfully');
    }

    public function edit(Request $request)
    {
        $filiers = Filier::all();
        $salles = Salle::all();
        $consultants = Consultant::all();
        $reservation = Reservation::where(['id'=>Request('id')])->first();//delete()
        return view('edit',['reservation'=>$reservation , 'filiers'=>$filiers, 'salles'=>$salles, 'consultants'=>$consultants]);
    }

    public function update(Request $request, Reservation $reservation)
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
                'consultant_id' => Request('consultant')
            ]
        );
        return redirect()->route('index')
        ->with('success','reservation bien modifier');
    }

    public function cons(Request $request){
        $consultants = Consultant::latest()->paginate();
        return view('consul',compact('consultants'));
    }

    public function store(Request $request){
        $consultants = new Consultant();

        $consultants->Nom = Request('Nom');
        $consultants->Prenom = Request('Prenom');
        $consultants->Email = Request('Email');
        $consultants->Numero = Request('Numero');

        $consultants->save();
        return redirect()->route('cons')
        ->with('success','consultant added successfully');
    }

    public function validation(Request $request, Reservation $reservation){
        $reservation = Reservation::where(['id'=>Request('id')])->first();
        $email = $reservation->consultant->Email;
        $reservation->update(
            [
                'statue' => ($reservation->statue=='Oui')?'Non':'Oui'
                ]
            );
            if ($reservation->statue =='Oui') {
                # code...
                $reservation = [
                    'title' => 'Bonjour Mme',
                    'body' => 'la réservation sera valide',
                    'Filière'=> ($reservation->filiere->code),
                    'Groupe'=>($reservation->groupe),
                    'Date'=>($reservation->date_Debut)

                ];
            }else{
                $reservation = [
                    'title' => 'Bonjour Mme',
                    'body' => 'la réservation rejetée',
                    'Filière'=> ($reservation->filiere->code),
                    'Groupe'=>($reservation->groupe),
                    'Date'=>($reservation->date_Debut)

                ];
            }
            if($request->check ? $request->check : 'true'){
                Mail::to($email)->send(new NotifiMail($reservation));
                // dd($reservation);
                return redirect()->route('index')
                ->with('success','statue bien modifier');
            }else {
                # code...
                return redirect()->route('index');
            }
    }

    public function email(Reservation $reservation){
        $reservation = Reservation::where(['id'=>Request('id')])->first();
        $email = $reservation->consultant->Email;
        $reservation = [
            'title' => ($reservation->consultant->Nom),
            'body' => 'Vous trouverez ci-dessous le planning de certification à l\'ENCG Settat',
            'Date'=> ($reservation->date_Debut),
            'Salle'=> ($reservation->salle->salle),
            'Filiere'=> ($reservation->filiere->code),
            'Groupe'=>($reservation->groupe),
            'Objet'=> ($reservation->type)
        ];
            Mail::to($email)->send(new ConsultantMail($reservation));
            return redirect()->route('index');
    }

    // public function notification(Request $request, Reservation $reservation){
    //     $reservation = Reservation::where(['id'=>Request('id')])->first();
    //     $email = $reservation->consultant->Email;
    //     if ($reservation->statue =='Oui') {
    //         # code...
    //         $reservation = [
    //             'title' => 'Bonjour Mme',
    //             'body' => 'la réservation sera valide',
    //             'Filière'=> ($reservation->filiere->code),
    //             'Groupe'=>($reservation->groupe),
    //             'Date'=>($reservation->date_Debut)

    //         ];
    //     }else{
    //         $reservation = [
    //             'title' => 'Bonjour Mme',
    //             'body' => 'la réservation rejetée',
    //             'Filière'=> ($reservation->filiere->code),
    //             'Groupe'=>($reservation->groupe),
    //             'Date'=>($reservation->date_Debut)

    //         ];
    //     }
    //     if($request->check){
    //         Mail::to($email)->send(new NotifiMail($reservation));
    //         // dd($reservation);
    //         return redirect()->route('index')
    //         ->with('success','statue bien modifier');
    //     }else {
    //         # code...
    //         return;
    //     }
    // }
}

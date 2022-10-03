@extends('layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="table-wrapper">
    <div class="table-title  text-dark p-4 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h2><b>Listes des reservations</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="{{route('transfer')}}" style="float: right;" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span style="float: left; margin-top: 2px; margin-right: 10px;font-size: 14px;">Ajouter Nouvelle reservation</span></a>
            </div>
        </div>
    </div>
</div>
<table class="table table-light table-striped rounded-lg text-center mt-2 border " style="font-size: 14px;">
        <thead class="table-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Fili&egrave;re</th>
            <th scope="col">Groupe</th>
            <th scope="col">Salle</th>
            <th scope="col">Consultant</th>
            <th scope="col">Date Debut</th>
            <th scope="col">Date Fin</th>
            <th scope="col">Type</th>
            <th scope="col">Choix</th>
            <th scope="col">Validation</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach($reservations as $reservation)
            @php
                $dateD = date("d-m-Y", strtotime($reservation->date_Debut));
                $dateF = date("d-m-Y", strtotime($reservation->date_Fin));
            @endphp
                <tr>
                    <th>{{++$i}}</th>
                    <td>{{$reservation->filiere->code}}</td>
                    <td>{{$reservation->groupe}}</td>
                    <td>{{$reservation->salle->salle}}</td>
                    <td>{{ ($reservation->consultant)? $reservation->consultant->Nom:""}}</td>
                    <td>{{$dateD}}</td>
                    <td>{{$dateF}}</td>
                    <td>{{$reservation->type}}</td>
                    <td>{{$reservation->choix}}</td>
                    @if ($reservation->statue == 'Oui')
                        <td style="color: green; font-weight: bold">{{$reservation->statue}}</td>
                    @else
                        <td style="color: red;font-weight: bold">{{$reservation->statue}}</td>
                    @endif
                    <td>
                        <div class="mb-3 col-md">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-outline-primary mb-2" href="{{route('modifier',['id'=>$reservation->id])}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>{{++$i}}</th>
                    <td>Developpement informatique</td>
                    <td>14</td>
                    <td>11</td>
                    <td>Mr al mahdi</td>
                    <td>11/10/2022</td>
                    <td>12/10/2022</td>
                    <td>formation</td>
                    <td>Excel</td>
                    <td style="color: green; font-weight: bold">Oui</td>
                    <td>
                        <div class="mb-3 col-md">
                            <div class="row">
                                <div class="col">
                                    <a class="btn btn-outline-primary mb-2" href="{{route('modifier',['id'=>$reservation->id])}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
<style>
        svg{
    width: 20px;
    }
    nav p{
    display: none;
    }
    nav .flex a{
    display: none;
    }
     nav .flex span{
    display: none;
    }
    nav div:not(.dropdown-menu){
    align-items: center;
    justify-content: center;
    margin: auto 20px;
    display: flex;
    }
</style>
    {!! $reservations->links() !!}

@endsection

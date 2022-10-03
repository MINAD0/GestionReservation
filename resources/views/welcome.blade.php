@extends('layouts.master')
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
    <div class="table-title text-dark p-4 rounded">
        <div class="row">
            <div class="col-sm-6">
                <h2><b>Liste des reservations</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="{{route('data')}}" style="float: right;" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span style="float: left; margin-top: 2px; margin-right: 10px;font-size: 14px;">Ajouter nouvelle reservation</span></a>
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
            {{-- <th scope="col">Action</th> --}}
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
                    {{-- <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-outline-primary mb-2" href="{{route('edit',['id'=>$reservation->id])}}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <form action="{{route('validation')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$reservation->id}}">
                                <button type="submit" class="btn btn-outline-success"><i class="material-icons">check_box</i></button>
                            </form>
                            <form action="{{route('email')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{$reservation->id}}">
                                <button type="submit" class="btn btn-outline-danger"><i class="material-icons">email</i></button>
                            </form>
                        </div>
                    </td> --}}
                    <td>
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                            <div class="dropdown">
                        <button class="btn btn-lg btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Option
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="padding: 5px;">
                            <li >
                                <a class="btn btn-md btn-outline-primary mb-2 text-primary" style="width: 120px;margin-bottom: 5px;font-size: 14px;" href="{{route('edit',['id'=>$reservation->id])}}">Modifier</a>
                            </li>
                            <li>
                                <form>
                                    <button type="button" class="btn btn-md btn-outline-success"style="width: 120px;margin-bottom: 5px;font-size: 14px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Change statue
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="{{route('email')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="id" value="{{$reservation->id}}">
                                    <button type="submit" class="btn btn-md btn-outline-danger" style="width: 120px;margin-bottom: 5px;font-size: 14px;">Envoyer email </button>
                                </form>
                            </li>
                          </ul>
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
                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                            <div class="dropdown">
                        <button class="btn btn-lg btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Option
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="padding: 5px;">
                            <li >
                                <a class="btn btn-md btn-outline-primary mb-2 text-primary" style="width: 120px;margin-bottom: 5px;font-size: 14px;" href="{{route('edit',['id'=>$reservation->id])}}">Modifier</a>
                            </li>
                            <li>
                                <form>
                                    <button type="button" class="btn btn-md btn-outline-success"style="width: 120px;margin-bottom: 5px;font-size: 14px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Change statue
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form action="{{route('email')}}" method="POST" >
                                    @csrf
                                    <input type="hidden" name="id" value="{{$reservation->id}}">
                                    <button type="submit" class="btn btn-md btn-outline-danger" style="width: 120px;margin-bottom: 5px;font-size: 14px;">Envoyer email </button>
                                </form>
                            </li>
                          </ul>
                      </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

  <!-- Modal -->
  <div style="opacity: 1;" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Validation</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <span style="font-size: 16px; color: #0062ff;">
               Voulez-vous changer le statue de la reservation ?
            </span>
            <div class="form-check mt-2">
                <input class="form-check-input" name="check" type="checkbox" value="check" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  Envoyer Notification ?
                </label>
            </div>
        </div>
        <div class="modal-footer">
            <form>
                <button type="button" class="btn btn-lg btn-secondary" data-bs-dismiss="modal" style="width: 100px;margin-bottom: 5px;">Non</button>
            </form>
            <form action="{{route('validation')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$reservation->id}}">
                <button type="submit" class="btn btn-lg btn-primary" style="width: 100px;margin-bottom: 5px;">Oui</button>
            </form>
        </div>
      </div>
    </div>
  </div>


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

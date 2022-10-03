@extends('layouts.master')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap');
    input, input[type='text'],input[type='date']{
        height: 30px;
        font-size: 14px;
    }
    .pull-right > a{
        font-size: 16px;
    }
    .form-select {
        font-size: 14px;
    }
    body{
        font-family: 'Noto Serif', serif;
    }
</style>

@if ($errors->any())
    <div class="alert alert-danger" style="font-size: 14px;">
        <strong>Whoops!</strong> Il Faut Remplir Tous Les Champs.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container-md" style="max-width: 900px;">
    <form class="row g-2 d-flex justify-content-center" action="{{route('Save')}}" method="POST" enctype="multipart/form-data" >
        @csrf
                <div class="panel-group">
                    <div class="panel panel-default">
                    <div class="panel-heading display-6 bg-primary text-white">La section des Reservations
                        <div class="pull-right">
                            <a class="btn btn-warning mb-4" href="{{ route('index') }}">Afficher Reservations</a>
                        </div>
                    </div>
                        <div class="panel-body" style="font-size: 14px; height: 100%; max-width: 100%;">
                            <div class="mb-3 col-md mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label  class="form-label">Fili&egrave;re</label>
                                        <select class="form-select" name="filier">
                                            <option value="0" disable="true" selected="true">-- Select filier --</option>
                                                @foreach ($filiers as $key => $value)
                                                <option value="{{$value->id}}">{{ $value->code }}</option>
                                                @endforeach
                                        </select>
                                        @error('filier')
                                            <span>
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col mb-4">
                                        <label  class="form-label">Groupe</label>
                                        <input type="text" name="groupe" class="form-control" id="inputEmail4">
                                        @error('groupe')
                                            <span>
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col mb-2">
                                        <label  class="form-label">Salle</label>
                                        <select class="form-select" name="salle">
                                            <option value="0" disable="true" selected="true">-- Select Salle --</option>
                                            @foreach ($salles as $key => $value)
                                            <option value="{{$value->id}}">{{ $value->salle }}</option>
                                            @endforeach
                                        </select>
                                        @error('salle')
                                            <span class="badge badge-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md mb-2">
                                        <label  class="form-label">Consultants</label>
                                            <select class="form-select" name="consultant">
                                            {{-- <option disable="true" selected="true">{{$consultant->consultant_id}}</option> --}}
                                                @foreach ($consultants as $key => $value)
                                                <option value="{{$value->id}}">{{ $value->Nom }} {{ $value->Prenom }}</option>
                                                @endforeach
                                            </select>
                                            @error('salle')
                                                <span class="badge badge-danger">
                                                    {{$message}}
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-4">
                                <label class="form-label">Type</label>
                                <select onchange="yesnoCheck(this);" class="form-select" name="type">
                                    <option value="0" disable="true" selected="true">-- Select Type --</option>
                                    <option value="certification">Certification</option>
                                    <option value="formation">Formation</option>
                                    <option value="two">Certification + Formation</option>
                                </select>
                                @error('salle')
                                    <span class="badge badge-danger">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md mb-4" id="ifYes" style="display: none;transition: 0.3s ease-in-out;">
                                <label class="form-label">Choix</label>
                                <select class="form-select" name="choix">
                                    <option> -- Select Votre Choix -- </option>
                                    <option>Communication Skills For Business</option>
                                    <option>Excel Core</option>
                                    <option>Excel Expert</option>
                                    <option>Entreprenrutiat ESB</option>
                                </select>
                                @error('salle')
                                    <span class="badge badge-danger fw-bold">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md mb-4">
                                <div class="row">
                                    <div class="col">
                                        <label  class="form-label">Date Debut</label>
                                        <input class="form-control" name="dateD" type="date" id="formFile">
                                        @error('salle')
                                            <span class="badge badge-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col">
                                        <label  class="form-label">Date Fin</label>
                                        <input class="form-control" name="dateF" type="date" id="formFile">
                                        @error('salle')
                                            <span class="badge badge-danger">
                                                {{$message}}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--group button-->
                        <div class="btn-group-lg p-4 d-flex justify-content-center" role="group">
                            <input type="submit" class="btn-check" id="btncheck1" autocomplete="off">
                            <label class="btn btn-success mb-4" for="btncheck1" style="width: 90px; font-size: 16px;">Ajouter</label>
                        </div>
                        </div>
            </div>
    </form>
</div>
<script>
    function yesnoCheck(that) {
        if (that.value == "certification" || that.value == "formation") {
            document.getElementById("ifYes").style.display = "block";
        } else {
        document.getElementById("ifYes").style.display = "none";
        }
    }
</script>
@if ($message = Session::get('success'))
        <div class="alert alert-success pt-4 mt-4">
            <p>{{ $message }}</p>
        </div>
    @endif

@endsection

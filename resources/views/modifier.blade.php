@extends('layouts.app')

@section('content')
<style>
    input[type='text'],input[type='date']{
        height: 30px;
        font-size: 12px;
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
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="row g-2 d-flex justify-content-center" action="{{route('update')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{$reservation->id}}">
        <div class="container">
            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading bg-primary text-white"><h2>Edit Reservations</h2></div>
                    <div class="panel-body"style="font-size: 14px; height: 480px;">
                      <div class="col-md mb-4">
                          <label  class="form-label">Filier</label>
                          <select class="form-select" name="filier">
                                @foreach ($filiers as $key => $value)
                                    <option value="{{$value->id}}" {{($reservation->filier_id==$value->id)?"selected":""}}  >{{ $value->code }}</option>
                                @endforeach
                            </select>
                      </div>
                      <div class="col-md mb-4">
                          <label  class="form-label">Groupe</label>
                          <input type="text" name="groupe" class="form-control" id="inputEmail4" value="{{$reservation->groupe}}">
                      </div>

                      <div class="col-md mb-4">
                            <label  class="form-label">Salle</label>
                            <select class="form-select" name="salle">
                                <option value="0" disable="true" selected="true">{{$reservation->salle_id}}</option>
                                @foreach ($salles as $key => $value)
                                <option value="{{$value->id}}" {{($reservation->salle_id==$value->id)?"selected":""}}>{{ $value->salle }}</option>
                                @endforeach
                            </select>
                      </div>
                      <div class="mb-3 col-md mb-4">
                        <div class="row">
                            <div class="col">
                                <label  class="form-label">Date Debut</label>
                                <input class="form-control" name="dateD" type="date" id="formFile" value="{{$reservation->date_Debut}}">
                            </div>
                            <div class="col">
                                <label  class="form-label">Date Fin</label>
                                <input class="form-control" name="dateF" type="date" id="formFile" value="{{$reservation->date_Fin}}">
                            </div>
                        </div>
                    </div>

                        <div class="col-md mb-4">
                          <label class="form-label">Type</label>
                            <select onchange="yesnoCheck(this);" class="form-select" name="type">
                                <option value="Certification" {{($reservation->type == "Certification")?'selected':''}} >Certification</option>
                                <option value="Formation" {{($reservation->type == "Formation")?'selected':''}} >Formation</option>
                            </select>
                        </div>
                        <div class="col-md mb-4" id="ifYes">
                            <label class="form-label">Choix</label>
                            <select class="form-select" name="choix">
                                <option> -- Select Votre Choix -- </option>
                                <option {{($reservation->choix == "Communication Skills For Business")?'selected':''}}>Communication Skills For Business</option>
                                <option {{($reservation->choix == "Excel Core")?'selected':''}}>Excel Core</option>
                                <option {{($reservation->choix == "Excel Expert")?'selected':''}}>Excel Expert</option>
                                <option {{($reservation->choix == "Entreprenrutiat ESB")?'selected':''}}>Entreprenrutiat ESB</option>
                            </select>
                        </div>
                        {{-- <div class="col-md mb-4">
                        <label  class="form-label">Consultants</label>
                            <select class="form-select" name="consultant">
                            <option disable="true" selected="true">{{$reservation->consultant_id}}</option>
                                @foreach ($consultants as $key => $value)
                                <option value="{{$value->id}}" {{($reservation->consultant_id==$value->id)?"selected":""}}>{{ $value->Nom }} {{ $value->Prenom }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <!--group button-->
                    <div class="btn-group-lg p-4 d-flex justify-content-center" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="submit" class="btn-check" id="btncheck1" autocomplete="off">
                        <label class="btn btn-outline-success" for="btncheck1" style="width: fit-content; font-size: 17px;">Modifier </label>
                    </div>
                </div>
            </div>

        </div>
</form>
@if ($message = Session::get('success'))
        <div class="alert alert-success pt-4 mt-4">
            <p>{{ $message }}</p>
        </div>
    @endif

@endsection

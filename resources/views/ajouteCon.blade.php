@extends('layouts.master')

@section('content')
<style>
    input, select, input[type='text'],input[type='date']{
        height: 30px;
        font-size: 14px;
    }
    .pull-right > a{
        font-size: 16px;
    }
    body{
        font-family: 'Noto Serif', serif;
    }body{
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
<form class="row g-2 d-flex justify-content-center" action="{{route('store')}}" method="POST" enctype="multipart/form-data">
    @csrf
            <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading display-6 bg-primary text-white">Sections des Consultants
                    <div class="pull-right">
                        <a class="btn btn-warning mb-4" href="{{ route('cons') }}"> Afficher les consultants</a>
                    </div>
                  </div>
                    <div class="panel-body" style="font-size: 14px;">
                        <div class="mb-3 col-md mb-4">
                            <div class="row">
                                <div class="col">
                                    <label  class="form-label">Nom</label>
                                    <input type="text" name="Nom" class="form-control" id="inputEmail4">
                                </div>
                                <div class="col">
                                    <label  class="form-label">Prenom</label>
                                    <input class="form-control" name="Prenom" type="text" id="formFile">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 col-md mb-4">
                            <div class="row">
                                <div class="col">
                                    <label  class="form-label">Email</label>
                                    <input class="form-control" name="Email" type="text" id="formFile">
                                </div>
                                <div class="col">
                                    <label  class="form-label">Numero</label>
                                    <input class="form-control" name="Numero" type="text" id="formFile">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--group button-->
                    <div class="btn-group-lg p-4 d-flex justify-content-center " role="group">
                        <input type="submit" class="btn-check" id="btncheck1" autocomplete="off">
                        <label class="btn btn-success" style="width: 90px; font-size: 16px;" for="btncheck1">Ajouter</label>
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

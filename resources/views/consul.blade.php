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
                <h2><b>Liste des consultants</b></h2>
            </div>
            <div class="col-sm-6">
                <a href="{{route('listconsultant')}}" style="float: right;" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span style="float: left; margin-top: 2px; margin-right: 10px;font-size: 14px;">Ajouter nouveau consultant</span></a>
            </div>
        </div>
    </div>
</div>
<table class="table table-light table-striped rounded-lg text-center mt-2 border " style="font-size: 14px;">
        <thead class="table-light">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Email</th>
            <th scope="col">Numero</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp
            @foreach($consultants as $consultant)
                <tr>
                    <th>{{++$i}}</th>
                    <td>{{$consultant->Nom}}</td>
                    <td>{{$consultant->Prenom}}</td>
                    <td>{{$consultant->Email}}</td>
                    <td>{{$consultant->Numero}}</td>
                </tr>
                <tr>
                    <th>{{++$i}}</th>
                    <td>al mahdi</td>
                    <td>aitounzar</td>
                    <td>mahdiaitounzar@gmail.com</td>
                    <td>+212 654220539</td>
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
    {!! $consultants->links() !!}

@endsection

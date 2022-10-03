<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap-grid.min.css" integrity="sha512-q0LpKnEKG/pAf1qi1SAyX0lCNnrlJDjAvsyaygu07x8OF4CEOpQhBnYiFW6YDUnOOcyAEiEYlV4S9vEc6akTEw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap-grid.rtl.min.css" integrity="sha512-Fi60uaCdw/Je3IZVAMnSWxiUutPyzIrcYUpJr9Wsfys2QchkrnryEn1fUvoBXV78IjXaTfoe54rnwmOEb2sv0Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif&display=swap" rel="stylesheet">
    <!-- jQuery library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.min.js" integrity="sha512-OvBgP9A2JBgiRad/mM36mkzXSXaJE9BEIENnVEmeZdITvwT09xnxLtT4twkCa8m/loMbPHsvPl0T8lRGVBwjlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="container">
    <div class="panel-group">
        <div class="panel panel-default">
            <div class="panel-body bg-primary text-white" style="font-size: 16px; height: 100%; max-width: 100%; text-align: center; line-height: 2;">
                <div class="col mb-4">
                    <span style="font-size: 25px; font-weight: bold; font-family: 'Noto Serif', serif; ">{{$reservation['title']}} </span><br>
                    <span style="font-size: 22px; font-weight: bold; font-family: 'Noto Serif', serif;color: rgb(13, 181, 211); ">{{$reservation['body']}} <br> Pour La Filière : {{$reservation['Filière']}} <br>Le Groupe : {{$reservation['Groupe']}} <br>Date : {{ date('d/m/Y',strtotime($reservation['Date'])) }} </span><br>
                </div>
                <div class="col mb-4">
                    <img src="https://www.skillscampus.ma/new/img/skills_campus_logo1.png" alt="" width="150px" style="margin-top: 15px;">
                </div>
                <div class="col mb-4">
                    <span style="color: dodgerblue; font-size: 18px; font-weight: bold;">Nawal AIT OUNZAR
                        Business Manager
                        Skills Campus
                    </span>
                </div>
                <div class="col mb-4">
                    <span style="color: rgb(228, 6, 54); font-family: 'Noto Serif', serif; font-weight: bold; font-size: 16px;"> Mobile :</span> 06 62 89 42 76 <br>
                    <span style="color: rgb(228, 6, 54); font-family: 'Noto Serif', serif; font-weight: bold; font-size: 16px;">Fixe :</span> 05 20 17 76 46 / 05 22 27 99 01 <br>
                    <span style="color: rgb(228, 6, 54); font-family: 'Noto Serif', serif; font-weight: bold; font-size: 16px;">Fax :</span> 05 22 27 99 01
                </div>
                <div class="col mb-4">
                    <span style="color: rgb(228, 6, 54); font-family: 'Noto Serif', serif; font-weight: bold; font-size: 16px;">Email : </span><a href="mailto:naitounzar@skills-group.com">naitounzar@skills-group.com</a>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- # Introduction
Bonjour Mr{{$reservation['title']}}
{{$reservation['body']}} <br>
{{$reservation['Date']}}
{{$reservation['Salle']}}<br>
{{$reservation['Filière']}}<br>
{{$reservation['Groupe']}}<br>
{{$reservation['Objet']}} --}}
</body>
</html>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">


        <div class="col-md-12">
            <hr>
            <h3 class="footertext">Advisor</h3>

            <hr>

            <p class="text-center"><b>This project is done under the supervision of</b></p>
            <div class="col-md-4 col-md-offset-4 text-center">
                <h3>Md. Asaduzzaman Khan</h3>
                <h4>Assistant Professor</h4>
                <h4>Computer Science & Engineering </h4>
                <h4>Leading University,Sylhet </h4>

                <img src="{{ asset('img/advisor.jpg') }}" class="img img-responsive" alt="..">
            </div>

        </div>
        <hr>
        <div class="col-md-12 text-center">
            <hr>
            <h3 class="footertext">About Us</h3>
            <hr>
            <div class="col-md-2 col-md-offset-2">

                <img src="{{ asset('img/sakib.jpg') }}" class="img-circle img-responsive" alt="..">
                <br>
                <h4 class="footertext">Nazmus Sakib</h4>
                <p class="footertext">ID: 1412020077</p><br>

            </div>
            <div class="col-md-2">

                <img src="{{ asset('img/munna.jpg') }}" class="img-circle img-responsive" alt="..">
                <br>
                <h4 class="footertext">Abdul Halim Munna</h4>
                <p class="footertext">ID: 1412020078</p><br>

            </div>
            <div class="col-md-2">

                <img src="{{ asset('img/shadip.jpg') }}" class="img-circle img-responsive" alt="...">
                <br>
                <h4 class="footertext">Shadip Banik</h4>
                <p class="footertext">ID: 1412020084</p><br>

            </div>
            <div class="col-md-2">

                <img src="{{ asset('img/tipu.jpg') }}" class="img-circle img-responsive" alt="...">
                <br>
                <h4 class="footertext">Azharul Islam Tipu</h4>
                <p class="footertext">ID: 1412020068</p><br>

            </div>
        </div>
    </div>
@endsection
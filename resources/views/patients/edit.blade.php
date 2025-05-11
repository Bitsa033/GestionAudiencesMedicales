@extends('layouts.app')
<link rel="stylesheet" href="bibliotheque/css/bootstrap.min.css">
@section('content')
<section class="page-section" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0"> Mise à jour du patient n°{{$client->id}} </h2>
                <hr class="divider" />
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                
                <form autocomplete="off" method="POST" action="{{route('update_client',$client->id)}}">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input name="name" class="form-control" id="name" value="{{$client->name}}" type="text" placeholder="Nom..." required />
                        <label for="name">nom...</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Ce champ est obligatoire.</div>
                    </div>
                    <!-- Phone address input-->
                    <div class="form-floating mb-3">
                        <input name="phone" class="form-control" value="{{$client->phone}}" id="phone" type="text" placeholder="Contact..." required/>
                        <label for="mark">Contact...</label>
                        <div class="invalid-feedback" data-sb-feedback="client:required">Ce champs est obligatoire.</div>
                        <div class="invalid-feedback" data-sb-feedback="client:email">Ce champs ne doit pas etre valide</div>
                    </div>
                    <!-- Adress number input-->
                    <div class="form-floating mb-3">
                        <input name="address" value="{{$client->address}}" class="form-control" id="phone" type="text" placeholder="Addresse..." required />
                        <label for="address">Addresse...</label>
                        <div class="invalid-feedback">Ce champ est obligatoire.</div>
                    </div>
                    
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Mettre à jour les informations</button></div>
                </form>
            </div>
        </div>
        
    </div>
</section>
@endsection
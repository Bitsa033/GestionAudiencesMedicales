@extends('layouts.app')
<link rel="stylesheet" href="bibliotheque/css/bootstrap.min.css">
@section('content')
<section class="page-section" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Nouveau patient!</h2>
                <hr class="divider" />
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                
                <form autocomplete="off" method="POST" action="{{route('store_patient')}}">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input name="name" class="form-control" id="name" type="text" placeholder="Nom complet..." required />
                        <label for="name">Nom complet...</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Ce champ est obligatoire.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input name="email" id="phone" class="form-control" type="text" placeholder="Email..." required/>
                        <label for="mark">Email...</label>
                        <div class="invalid-feedback" data-sb-feedback="mark:required">Ce champs est obligatoire.</div>
                        <div class="invalid-feedback" data-sb-feedback="mark:email">Ce champs ne doit pas etre valide</div>
                    </div>
                    
                    <!-- Address input-->
                    <div class="form-floating mb-3">
                        <input name="address" class="form-control" id="address" type="text" placeholder="Addresse...">
                        <label for="message">Addresse</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Ce champs est obligatoire.</div>
                    </div>

                    <!-- Phone input-->
                    <div class="form-floating mb-3">
                        <input name="phone" class="form-control" id="address" type="text" placeholder="Telephone...">
                        <label for="message">Telephone</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Ce champs est obligatoire.</div>
                    </div>
                    
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Enregistrer</button></div>
                </form>
            </div>
        </div>
        
    </div>
</section>
@endsection
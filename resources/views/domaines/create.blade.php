@extends('layouts.app')
<link rel="stylesheet" href="bibliotheque/css/bootstrap.min.css">
@section('content')
<section class="page-section" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Nouveau domaine medical!</h2>
                <hr class="divider" />
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                
                <form autocomplete="off" method="POST" action="{{route('store_specialite')}}">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input name="name" class="form-control" id="name" type="text" placeholder="Nom ..." required />
                        <label for="name">Nom de la specialite...</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Ce champ est obligatoire.</div>
                    </div>
                    
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Enregistrer</button></div>
                </form>
            </div>
        </div>
        
    </div>
</section>
@endsection
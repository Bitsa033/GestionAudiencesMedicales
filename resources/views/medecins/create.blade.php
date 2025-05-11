@extends('layouts.app')
<link rel="stylesheet" href="bibliotheque/css/bootstrap.min.css">
@section('content')
<section class="page-section" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Nouvel agenda medical !</h2>
                <hr class="divider" />
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                
                <form autocomplete="off" method="POST" action="{{route('store_medecin')}}">
                    @csrf
                    <!-- Specialitie input-->
                    <div class="form-floating mb-3">
                        <select name="specialite" class="form-control" id="name" type="text" required>
                            @foreach ($domaines as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <label for="name">Domaine medical...</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Ce champ est obligatoire.</div>
                    </div>
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <input name="name" id="day_of_week" class="form-control" type="text" placeholder="Nom ex: Paul la croix..." required/>
                        <label for="mark">Nom...</label>
                        <div class="invalid-feedback" data-sb-feedback="mark:required">Ce champs est obligatoire.</div>
                        <div class="invalid-feedback" data-sb-feedback="mark:email">Ce champs ne doit pas etre valide</div>
                    </div>
                    
                    <!-- Email input-->
                    <div class="form-floating mb-3">
                        <input name="email" id="email" class="form-control" type="email" placeholder="Email..." required/>
                        <label for="email">Email...</label>
                        <div class="invalid-feedback" data-sb-feedback="mark:required">Ce champs est obligatoire.</div>
                        <div class="invalid-feedback" data-sb-feedback="mark:email">Ce champs ne doit pas etre valide</div>
                    </div>

                    <!-- Phone input-->
                    <div class="form-floating mb-3">
                        <input name="phone" id="day_of_week" class="form-control" type="text" placeholder="Contact ex: Paul la croix..." required/>
                        <label for="mark">Telephone...</label>
                        <div class="invalid-feedback" data-sb-feedback="mark:required">Ce champs est obligatoire.</div>
                        <div class="invalid-feedback" data-sb-feedback="mark:email">Ce champs ne doit pas etre valide</div>
                    </div>
                    
                    <!-- Submit Button-->
                    <div class="d-grid"><button class="btn btn-primary btn-xl" id="submitButton" type="submit">Enregistrer</button></div>
                </form>
            </div>
        </div>
        
    </div>
</section>
@endsection
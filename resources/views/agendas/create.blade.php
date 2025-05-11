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
                
                <form autocomplete="off" method="POST" action="{{route('store_agenda')}}">
                    @csrf
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <select name="medecin" class="form-control" id="name" type="text" required>
                            @foreach ($medecins as $item)
                            <option value="{{$item->medecin_id}}">{{$item->medecin_id}}</option>
                            @endforeach
                        </select>
                        <label for="name">Medecin...</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Ce champ est obligatoire.</div>
                    </div>
                    <!-- Email address input-->
                    <div class="form-floating mb-3">
                        <input name="day_of_week" id="day_of_week" class="form-control" type="text" placeholder="Jour ex: lundi..." required/>
                        <label for="mark">Jour de la semaine...</label>
                        <div class="invalid-feedback" data-sb-feedback="mark:required">Ce champs est obligatoire.</div>
                        <div class="invalid-feedback" data-sb-feedback="mark:email">Ce champs ne doit pas etre valide</div>
                    </div>
                    
                    <!-- start time input-->
                    <div class="form-floating mb-3">
                        <input name="start_time" class="form-control" id="start_time" type="text" placeholder="Heure de prise de service...">
                        <label for="start_time">Heure de prise de service</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Ce champs est obligatoire.</div>
                    </div>

                    <!-- end time input-->
                    <div class="form-floating mb-3">
                        <input name="end_time" class="form-control" id="end_time" type="text" placeholder="Heure de fin de service...">
                        <label for="end_time">Heure de prise de service</label>
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
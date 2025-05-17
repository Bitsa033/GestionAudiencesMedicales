@extends('layouts.app')
<link rel="stylesheet" href="bibliotheque/css/bootstrap.min.css">
@section('content')
<section class="page-section" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Nouvel audience medical !</h2>
                <hr class="divider" />
            </div>
        </div>
        <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
            <div class="col-lg-6">
                
                <form autocomplete="off" method="POST" action="{{route('store_audience')}}">
                    @csrf
                    <!-- Specialitie input-->
                    <div class="form-floating mb-3">
                        <select name="patient" class="form-control" id="name" type="text" required>
                            @foreach ($patients as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <label for="name">Patient...</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Ce champ est obligatoire.</div>
                    </div>
                    <!-- Name input-->
                    <div class="form-floating mb-3">
                        <select name="specialitie" class="form-control" id="name" type="text" required>
                            @foreach ($specialities as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                        <label for="name">Domaine de competence...</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Ce champ est obligatoire.</div>
                    </div>
                    
                    <!-- Reason input-->
                    <div class="form-floating mb-3">
                        <textarea name="reason" id="email" class="form-control" type="email" >
                        </textarea>
                        <label for="reason">Raison de l'audience...</label>
                        <div class="invalid-feedback" data-sb-feedback="mark:required">Ce champs est obligatoire.</div>
                        <div class="invalid-feedback" data-sb-feedback="mark:email">Ce champs ne doit pas etre valide</div>
                    </div>

                    <!-- Date input-->
                    <div class="form-floating mb-3">
                        <input name="scheduled_date_at" id="date_audience" class="form-control" type="date" required >
                        <label for="date_audience">Date de l'audience...</label>
                        <div class="invalid-feedback" data-sb-feedback="mark:required">Ce champs est obligatoire.</div>
                        <div class="invalid-feedback" data-sb-feedback="mark:email">Ce champs ne doit pas etre valide</div>
                    </div>

                    <!-- Time input-->
                    <div class="form-floating mb-3">
                        <input name="scheduled_time_at" id="date_audience" class="form-control" type="text" required >
                        <label for="date_audience">Heure de l'audience...</label>
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
@extends('layouts.app')
<link rel="stylesheet" href="bibliotheque/css/bootstrap.min.css">
@section('content')
<section class="page-section" id="contact">
    <div class="container px-4 px-lg-12">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            
            <div class="col-lg-8 col-xl-6 text-center">
                <h2 class="mt-0">Données des patients enregistrés!</h2>
                <hr class="divider" />
            </div>
        </div>
        <div class="row gx-4 gx-lg-12 justify-content-center mb-12">
            <div class="col-lg-12">
                
                <table class="table table-bordered">
                    <thead class="table-danger">
                        <tr>
                            <td>Nom</td>
                            <td>Contact</td>
                            <td>Addresse</td>
                            <td>
                                <a href="{{url('new_patient')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Nouvel enregistrement</a>
                            </td>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($patients as $item)
                        <tr>
                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->address}}</td>
                            <td style="width: 45%;">
                                <a href="{{route('edit_patient',$item->id)}}" class="btn btn-warning"> <i class="fa fa-pen"></i> Modifier</a>
                                <a href="{{route('destroy_patient',$item->id)}}" class="btn btn-danger"> <i class="fa fa-trash"></i> Supprimer</a>
                                <a href="{{route('new_audience',$item->id)}}" class="btn btn-info"> <i class="fa fa-th"></i>  Nouvel audience</a>
                            </td>
                            
                        </tr>
                        
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        
    </div>
</section>
@endsection
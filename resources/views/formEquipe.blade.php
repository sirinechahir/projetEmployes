@extends("layouts.master")

@section('content')
    <form method="POST" action="{{url('/validerEquipe')}}">
        {{csrf_field()}}

        <input type="hidden" name="id" value="{{$equipe->numEqu}}">

        <h1>@if ($equipe->numEqu)Fiche @else Ajout @endif d'une équipe</h1>
        <div class="col-md-12 card card-body bg-light">

            <div class="form-group">
                <label class="col-md-3">Code de l'équipe (en majuscule)</label>
                <div class="col-md-6">
                    <input type="text" name="code" value="{{$equipe->code}}" class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Désignation de l'équipe </label>
                <div class="col-md-6">
                    <input type="text" name="libelle" value="{{$equipe->libelle}}" class="form-control" required/>
                </div>
            </div>


            <div class="form-group">
                <label class="col-md-3">Secteur: vous êtes (veuillez cocher une seule case) </label>
                <div class="col-md-6">
                    <select class="form-select" name="secteur">
                        <option value="admin" @if ($equipe->secteur=="admin") selected @endif>Administration</option>
                        <option value="vente" @if ($equipe->secteur=="vente")selected @endif>Vente</option>
                        <option value="prod" @if ($equipe->secteur=="prod") selected @endif>Production</option>
                    </select>
                </div>
            </div>
            <hr>



            <div class="form-group">
                <div class="col-md-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        Valider
                    </button>
                    <button type="button" class="btn btn-secondary"
                            onclick="if (confirm('Annuler la saisie ? ')) window.location='{{url('/')}}';">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection

@extends('admin.layouts.master')
@section('content')
    <header class="page-header page-header-dark pb-10"
        style="background: linear-gradient(90deg, rgb(86, 146, 113) 0%, rgb(67, 189, 91) 50%, rgb(97, 243, 67) 100%);">
        <div class="container-xl px-4">
            <div class="page-header-content pt-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto mt-4">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                            Ajouter une cotisation
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mt-4">
                        <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                            <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                            <div class="form-control ps-0 pointer">
                                {{ Carbon\Carbon::now()->format('d-m-Y') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->

    <div class="container-xl px-4 mt-n10">
        <div class="row">
            <div class="col-lg-12">

                <div class="card mb-4">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('gestion_cotisations.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label>Membre <span class="text-danger">*</span></label>
                                        <select name="user_id" class="form-control js-example-basic-single">
                                            {{-- @foreach ($users as $item)
                                                <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->nom }} {{ $item->prenom }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label>Code<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="code" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label>Période<span class="text-danger">*</span></label>
                                        <select class="form-select" name="annee_id" required>
                                            <option value="">Selectionner ici...</option>
                                            @foreach ($annees as $item)
                                                <option value="{{ $item->id }}">{{ $item->annee }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label>Somme<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="montant_cotisation" readonly />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label>Date</label>
                                        <input class="form-control" name="date" type="date" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="mb-3">
                                        <label>Mode du paiement <span class="text-danger">*</span></label>
                                        <select class="form-select" name="mode" required>
                                            <option value="">Selectionner ici...</option>
                                            <option value="Administration">Espèce</option>
                                            <option value="Recouvrement">Cheque</option>
                                            <option value="Controle">Virement</option>
                                            <option value="Autre">Mobile Money</option>
                                            <option value="Autre">Autre</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="mb-3">
                                        <label>Observation</label>
                                        <textarea class="form-control" name="desc" rows="5" placeholder="Entrez vos observations ici..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                ajax: {
                    url: 'searchmember',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term,
                            page: params.page
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        return {
                            results: $.map(data.items, function(item) {
                                return {
                                    id: item.id,
                                    text: item.code,
                                    code: item.code,
                                };
                            }),
                            pagination: {
                                more: (params.page * 30) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                placeholder: 'Rechercher un membre...',
                minimumInputLength: 2,
            }).on('select2:select', function(e) {
                var data = e.params.data;
                $('#nom').val(data.nom);
                $('#prenom').val(data.prenom);
                $('#code').val(data.code);
                $('#montant_cotisation').val(data.montant_cotisation);
            });
        });
    </script>


    <script>
        document.getElementById('locationSelect').addEventListener('change', function() {
            var selectedOption = this.options[this.selectedIndex];
            document.getElementById('nom').value = selectedOption.getAttribute('data-nom');
            document.getElementById('prenom').value = selectedOption.getAttribute('data-prenom');
            document.getElementById('code').value = selectedOption.getAttribute('data-code');
            document.getElementById('montant_cotisation').value = selectedOption.getAttribute('data-montant_cotisation');
        });
    </script>
@endsection

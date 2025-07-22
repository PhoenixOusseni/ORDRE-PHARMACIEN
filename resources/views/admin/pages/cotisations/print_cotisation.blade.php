<!DOCTYPE html>
<html lang="fr">

<head>
    @include('admin.partials.meta')
    @yield('title')
    <title>ORDRE PHARMACIEN</title>
    @yield('style')
    @include('admin.partials.style')
    <style>
        .inset-0 {
            z-index: 999999999 !important;
        }
    </style>

<body style="height: 90vh;">
    <div class="container-fluid mt-1">
        <div class="mb-2" style="border-bottom: 2px solid black;">
            <img src="{{ asset('assets/img/entete.png') }}" alt="entete" class="img-fluid"
                style="width: 100%; height: 100px;">
        </div>
        <div class="d-flex justify-content-end">
            <h5>Ouagadougou, le {{ date('d-m-Y') }}</h5>
        </div>
        <section class="mt-4 mb-4">
            <h3 class="text-center mb-3">Quittance N° : {{ $finds->code }}</h3>
            <h4>Doit : {{ $finds->User->nom }} {{ $finds->User->prenom }}</h4>
        </section>
        <section>
            <table class="table table-bordered">
                <tr style="background: rgb(202, 200, 200)">
                    <th class="text-center">Désignation</th>
                    <th class="text-center">Période</th>
                    <th class="text-center">Montant</th>
                </tr>
                <tr>
                    <td>
                        <p>Pour paiement de la cotisation à l'ordre des pharmaciens</p>
                    </td>
                    <td class="text-center">{{ $finds->periode }} {{ $finds->Annee->annee }}</td>
                    <td class="text-center">{{ number_format($finds->montant, 0, ',', ' ') }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between m-1 bg-success p-2">
                <div>
                    <h4 class="text-light"><strong>TOTAL</strong></h4>
                </div>
                <div>
                    <h4 class="text-light"><strong>{{ number_format($finds->montant, 0, ',', ' ') }} FCFA</strong></h4>
                </div>
            </div>

            @php
                $fmt = new NumberFormatter('fr', NumberFormatter::SPELLOUT);
            @endphp

            <h5>Arreté la présente quitance à la somme de : <strong
                    class="text-uppercase">{{ ucfirst($fmt->format($finds->montant)) }}</strong>
                ({{ number_format($finds->montant, 0, ',', ' ') }}) FRANCS
                CFA</h5>
        </section>
        <section class="mt-3" style="margin-bottom: 20px;">
            <div class="d-flex justify-content-between">
                <p>-</p>
                <div style="margin-bottom: 90px;">
                    <h5><strong>Signature</strong></h5>
                </div>
            </div>
        </section>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>

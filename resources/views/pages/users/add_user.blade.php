@extends('layout.master')

@section('content')
    <h2 class="mb-4 text-center">Rejoindre l'ordre !</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Barre de progression -->
    <div class="mb-4">
        <div class="progress" style="height: 20px;">
            <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25"
                aria-valuemin="0" aria-valuemax="100">
                Étape 1 / 5
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Étape 1 : Infos perso -->
        <div id="step-1" class="step active">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Nom</label>
                    <input type="text" name="nom" class="form-control" required>
                    <div class="invalid-feedback">Ce champ est requis</div>
                </div>
                <div class="col-md-6">
                    <label>Prénom</label>
                    <input type="text" name="prenom" class="form-control" required>
                    <div class="invalid-feedback">Ce champ est requis</div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                    <div class="invalid-feedback">Ce champ est requis</div>
                </div>
                <div class="col-md-6">
                    <label>Téléphone</label>
                    <input type="text" name="telephone" class="form-control" required>
                    <div class="invalid-feedback">Ce champ est requis</div>
                </div>
            </div>
            <div class="text-end">
                <button type="button" class="btn btn-primary" onclick="nextStep(2)">Suivant</button>
            </div>
        </div>

        <!-- Étape 2 : Infos pro -->
        <div id="step-2" class="step">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Pays</label>
                    <input type="text" name="pays" class="form-control" required>
                    <div class="invalid-feedback">Ce champ est requis</div>
                </div>
                <div class="col-md-6">
                    <label>Société</label>
                    <input type="text" name="societe" class="form-control" required>
                    <div class="invalid-feedback">Ce champ est requis</div>
                </div>
            </div>
            <div class="mb-3">
                <label>Rôle</label>
                <input type="text" name="role" class="form-control" value="utilisateur" readonly>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="prevStep(1)">Précédent</button>
                <button type="button" class="btn btn-primary" onclick="nextStep(3)">Suivant</button>
            </div>
        </div>

        <!-- Étape 3 : Mot de passe -->
        <div id="step-3" class="step">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Mot de passe</label>
                    <input type="password" name="password" class="form-control" required>
                    <div class="invalid-feedback">Ce champ est requis</div>
                </div>
                <div class="col-md-6">
                    <label>Confirmation</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                    <div class="invalid-feedback">Ce champ est requis</div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="prevStep(2)">Précédent</button>
                <button type="button" class="btn btn-primary" onclick="nextStep(4)">Suivant</button>
            </div>
        </div>

        <!-- Étape 4 : Récapitulatif -->
        <div id="step-4" class="step">
            <h4 class="mb-4">Récapitulatif de votre inscription</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Nom :</strong> <span id="recap-nom"></span></li>
                <li class="list-group-item"><strong>Email :</strong> <span id="recap-email"></span></li>
                <li class="list-group-item"><strong>Téléphone :</strong> <span id="recap-telephone"></span></li>
                <li class="list-group-item"><strong>Pays :</strong> <span id="recap-pays"></span></li>
                <li class="list-group-item"><strong>Société :</strong> <span id="recap-societe"></span></li>
                <li class="list-group-item"><strong>Rôle :</strong> <span id="recap-role"></span></li>
            </ul>
            <div class="d-flex justify-content-between">
                <button type="button" class="btn btn-secondary" onclick="prevStep(3)">Modifier</button>
                <button type="submit" class="btn btn-success">Valider l'inscription</button>
            </div>
        </div>
    </form>
@endsection
@section('scripts')
    <script>
        // Déclarer les fonctions dans le scope global pour éviter les erreurs "not defined"
        function showStep(step) {
            document.querySelectorAll('.step').forEach(div => div.classList.remove('active'));
            const target = document.getElementById('step-' + step);
            if (target) {
                target.classList.add('active');
                updateProgressBar(step);
            }
        }

        function nextStep(step) {
            const currentStep = step - 1;
            const currentFields = document.querySelectorAll(`#step-${currentStep} input[required]`);
            let isValid = true;

            currentFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.classList.add('is-invalid');
                } else {
                    field.classList.remove('is-invalid');
                }
            });

            if (isValid) {
                if (step === 4) {
                    document.getElementById('recap-nom').innerText = document.querySelector('[name="nom"]').value;
                    document.getElementById('recap-email').innerText = document.querySelector('[name="email"]').value;
                    document.getElementById('recap-telephone').innerText = document.querySelector('[name="telephone"]')
                        .value;
                    document.getElementById('recap-pays').innerText = document.querySelector('[name="pays"]').value;
                    document.getElementById('recap-societe').innerText = document.querySelector('[name="societe"]').value;
                    document.getElementById('recap-role').innerText = document.querySelector('[name="role"]').value;
                }

                showStep(step);
            }
        }

        function prevStep(step) {
            showStep(step);
        }

        function updateProgressBar(step) {
            const progressBar = document.getElementById('progress-bar');
            const steps = ['Étape 1 / 4', 'Étape 2 / 4', 'Étape 3 / 4', 'Étape 4 / 4'];
            const widths = ['25%', '50%', '75%', '100%'];
            if (progressBar) {
                progressBar.style.width = widths[step - 1];
                progressBar.innerText = steps[step - 1];
            }
        }

        // Appel initial quand le DOM est chargé
        document.addEventListener('DOMContentLoaded', function() {
            showStep(1);
        });
    </script>
@endsection

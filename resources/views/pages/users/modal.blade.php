<!-- Modal photo -->
<div class="modal fade" id="photoBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-default">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Charger la photo du profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="{{ url('add_profil_image/' . $finds->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Sélectionner une photo</label>
                            <input type="file" class="form-control" name="photo" accept="image/*" required>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Charger</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal edit profile -->
<div class="modal fade" id="editBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modifier mon compte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Étapes visuelles -->
                    <div class="steps mb-4 d-flex justify-content-between">
                        <div class="step-item flex-fill" id="step-nav-1">
                            <div class="step-circle">1</div>
                            <small class="step-label">Etat Civil</small>
                        </div>
                        <div class="step-item flex-fill" id="step-nav-2">
                            <div class="step-circle">2</div>
                            <small class="step-label">Adresse</small>
                        </div>
                        <div class="step-item flex-fill" id="step-nav-3">
                            <div class="step-circle">3</div>
                            <small class="step-label">Diplôme</small>
                        </div>
                        <div class="step-item flex-fill" id="step-nav-4">
                            <div class="step-circle">4</div>
                            <small class="step-label">Régional</small>
                        </div>
                        <div class="step-item flex-fill" id="step-nav-5">
                            <div class="step-circle">5</div>
                            <small class="step-label">Résumé</small>
                        </div>
                    </div>

                    <!-- Barre de progression -->
                    <div class="mb-4">
                        <div class="progress" style="height: 20px;">
                            <div id="progress-bar" class="progress-bar bg-success" role="progressbar"
                                style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                Étape 1 / 5
                            </div>
                        </div>
                    </div>

                    <!-- Formulaire -->
                    <form method="POST" action="{{ url('update_profil/' . $finds->id) }}" enctype="multipart/form-data">
                        @csrf
                        <!-- Étape 1 -->
                        <div id="step-1" class="step active">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Nom</label>
                                    <input type="text" name="nom" class="form-control" value="{{ $finds->nom }}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label>Prénom(s)</label>
                                    <input type="text" name="prenom" class="form-control" value="{{ $finds->prenom }}"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Nom de jeune fille</label>
                                    <input type="text" name="nom_jeune_fille" class="form-control" value="{{ $finds->nom_jeune_fille }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Date de naissance</label>
                                    <input type="date" name="date_naiss" class="form-control" value="{{ $finds->date_naiss }}"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Lieu de naissance</label>
                                    <input type="text" name="lieu_naiss" class="form-control" value="{{ $finds->lieu_naiss }}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label>Nationalité</label>
                                    <input type="text" name="nationalite" class="form-control" value="{{ $finds->nationalite }}"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label>Situation Matrimoniale</label><br>
                                <div class="radio-group">
                                    <label class="radio-option">
                                        Marié
                                        <input type="radio" name="situation_matrimoniale" value="Marié">
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="radio-option">
                                        Veuf(ve)
                                        <input type="radio" name="situation_matrimoniale" value="Veuf(ve)">
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="radio-option">
                                        Célibataire
                                        <input type="radio" name="situation_matrimoniale" value="Célibataire">
                                        <span class="checkmark"></span>
                                    </label>

                                    <label class="radio-option">
                                        Divorcé(e)
                                        <input type="radio" name="situation_matrimoniale" value="Divorcé(e)">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-success" onclick="nextStep(2)">Suivant</button>
                            </div>
                        </div>

                        <!-- Étape 2 -->
                        <div id="step-2" class="step">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Adresse Permanente</label>
                                    <input type="text" name="adresse" class="form-control" value="{{ $finds->adresse }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Domicile</label>
                                    <input type="text" name="domicile" class="form-control" value="{{ $finds->domicile }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $finds->email }}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label>Télephone</label>
                                    <input type="text" name="telephone" class="form-control" value="{{ $finds->telephone }}"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>N° Matricule</label>
                                    <input type="text" name="matricule" class="form-control" value="{{ $finds->matricule }}"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label>Lieu d'exercice</label>
                                    <input type="text" name="lieu_exercice" class="form-control" value="{{ $finds->lieu_exercice }}"
                                        required>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary"
                                    onclick="prevStep(1)">Précédent</button>
                                <button type="button" class="btn btn-success" onclick="nextStep(3)">Suivant</button>
                            </div>
                        </div>

                        <!-- Étape 3 -->
                        <div id="step-3" class="step">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Diplome</label>
                                    <input type="file" name="diplome" class="form-control" accept=".pdf">
                                </div>
                                <div class="col-md-6">
                                    <label>Date d'obtention</label>
                                    <input type="date" name="date_diplome" class="form-control" value="{{ $finds->date_diplome }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Institution ayant délivré</label>
                                    <input type="text" name="inst_delivre" class="form-control" value="{{ $finds->inst_delivre }}">
                                </div>
                                <div class="col-md-6">
                                    <label>Lieu de délivrance</label>
                                    <input type="text" name="lieu_delivrance" class="form-control" value="{{ $finds->lieu_delivrance }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Section</label>
                                    <select name="section_id" class="form-control">
                                        @foreach (App\Models\Section::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Pièces jointes</label>
                                    <input type="file" name="file" class="form-control" accept=".pdf">
                                    <p>
                                        <span>1. Un extrait d'acte de naissance</span>
                                        <br>
                                        <span>2. un extrait d'un casier judiciaire datant de moins de trois mois</span>
                                        <br>
                                        <span>3. Une copie légalisée du diplôme de pharmacien ou l'attestation de diplôme de docteur en pharmacie</span>
                                        <br>
                                        <span>4. Un certificat de nationalité</span>
                                        <br>
                                        <span>5.Un certificat d'aptitude médical</span>
                                    </p>
                                    <p class="text-danger text-italic">
                                        <strong>Note :</strong> Les pièces jointes doivent être au format PDF et ne pas dépasser 2 Mo.
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary"
                                    onclick="prevStep(2)">Précédent</button>
                                <button type="button" class="btn btn-success" onclick="nextStep(4)">Suivant</button>
                            </div>
                        </div>

                        <!-- Étape 3 -->
                        <div id="step-4" class="step">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Région ordinale</label>
                                    <select name="region_ordinal_id" class="form-select">
                                        @foreach (App\Models\RegionOrdinal::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Région</label>
                                    <select name="region_id" class="form-select">
                                        @foreach (App\Models\Region::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label>Province</label>
                                    <select name="province_id" class="form-select">
                                        @foreach (App\Models\Province::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Commune</label>
                                    <select name="commune_id" class="form-select">
                                        @foreach (App\Models\Commune::all() as $item)
                                            <option value="{{ $item->id }}">{{ $item->libelle }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary"
                                    onclick="prevStep(3)">Précédent</button>
                                <button type="button" class="btn btn-success" onclick="nextStep(5)">Suivant</button>
                            </div>
                        </div>

                        <!-- Étape 4 -->
                        <div id="step-5" class="step">
                            <h5 class="mb-4 text-success">Récapitulatif</h5>
                            <ul class="list-group mb-4">
                                <li class="list-group-item"><strong>Nom :</strong> <span id="recap-nom"></span></li>
                                <li class="list-group-item"><strong>Email :</strong> <span id="recap-prenom"></span>
                                </li>
                                <li class="list-group-item"><strong>Téléphone :</strong> <span
                                        id="recap-telephone"></span></li>
                                <li class="list-group-item"><strong>Pays :</strong> <span
                                        id="recap-date_naiss"></span></li>
                                <li class="list-group-item"><strong>Société :</strong> <span
                                        id="recap-lieu_naiss"></span></li>
                                <li class="list-group-item"><strong>Rôle :</strong> <span
                                        id="recap-nationalite"></span></li>
                            </ul>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-secondary"
                                    onclick="prevStep(4)">Precedant</button>
                                <button type="submit" class="btn btn-success">Modifier mon profile</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal add diplomes --}}
<div class="modal fade" id="addDipBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-default">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter autres diplomes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="{{ route('gestion_diplome.store') }}">
                        @csrf
                        <input type="text" name="user_id" value="{{ $finds->id }}" hidden>
                        <div class="mb-3">
                            <label class="form-label">Natures diplomes</label>
                            <input type="text" class="form-control" name="nature" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date optention</label>
                            <input type="date" class="form-control" name="date_diplome" required>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Ajouter</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal add an a fonction --}}
<div class="modal fade" id="addFoctBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-default">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Ajouter une fonction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" action="{{ route('gestion_fonction.store') }}">
                        @csrf
                        <input type="text" name="user_id" value="{{ $finds->id }}" hidden>
                        <div class="mb-3">
                            <label class="form-label">Libelle de fonction</label>
                            <input type="text" class="form-control" name="libelle" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date d'occupation</label>
                            <input type="date" class="form-control" name="date" required>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success">Ajouter</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

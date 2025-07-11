<?php

namespace App\Providers;

use App\Models\Cotisation;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Set the default locale for translations
        App::setLocale(config('app.locale', 'fr'));

        User::created(function (User $user) {
            // récupérer la RegionOrdinal (R1, R2, etc)
            $regionCode = $user->RegionOrdinal->code; // relation belongsTo

            // récupérer la Section (A, B, etc)
            $sectionCode = $user->Section->code; // relation belongsTo

            // compter combien d'utilisateurs sont déjà dans cette region
            $count = User::where('region_ordinal_id', $user->region_ordinal_id)->count();

            // numéro incrémental formaté
            $number = str_pad($count, 4, '0', STR_PAD_LEFT);

            // construire le code
            $code = "{$regionCode}-{$number}{$sectionCode}";

            // mettre à jour le code du user
            $user->update(['code' => $code]);
        });

        Cotisation::created(function (Cotisation $cotisation) {
            // Compter combien d'utilisateurs ont déjà été créés
            $count = Cotisation::count();

            // Générer le numéro formaté
            $number = str_pad($count, 5, '0', STR_PAD_LEFT);

            // Construire le code
            $code = "CT-{$number}";

            // Mettre à jour le user
            $cotisation->update(['code' => $code]);
        });
    }
}

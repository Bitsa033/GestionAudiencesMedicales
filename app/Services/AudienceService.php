<?php

namespace App\Services;

use App\Models\Agenda;
use App\Models\Audience;
use App\Models\Medecin;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AudienceService
{
    protected int $maxAttempts = 2; // 2 tentatives = 1h (car 30 min x 2)

    /**
     * Réserver une audience avec tentative intelligente
     */
    public function createAudience(int $clientId, int $specialityId, string $preferredDateTime, string $reason = null): ?Audience
    {
        $scheduledAt = Carbon::parse($preferredDateTime);

        return DB::transaction(function () use ($clientId, $specialityId, $scheduledAt, $reason) {

            for ($attempt = 0; $attempt <= $this->maxAttempts; $attempt++) {
                
                // Chercher médecin disponible
                $medecin = Medecin::where('speciality_id', $specialityId)
                            ->where('is_available', true)
                            ->whereDoesntHave('audiences', function ($query) use ($scheduledAt) {
                                $query->where('scheduled_at', $scheduledAt);
                            })
                            ->first();

                if ($medecin) {
                    // Trouvé ! Créer l'audience
                    return Audience::create([
                        'client_id' => $clientId,
                        'medecin_id' => $medecin->id,
                        'speciality_id' => $specialityId,
                        'scheduled_at' => $scheduledAt,
                        'status' => 'confirmed',
                        'reason' => $reason,
                    ]);
                }

                // Sinon, essayer +30 minutes
                $scheduledAt->addMinutes(30);
            }

            return null; // Aucun médecin disponible après toutes les tentatives
        });
    }
}

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
    public function createAudience(int $clientId, int $specialityId, string $preferredDate,$preferredTime, string $reason = null): ?Audience
    {
        $scheduledDateAt = Carbon::parse($preferredDate);
        $scheduledTimeAt = Carbon::parse($preferredTime);


        return DB::transaction(function () use ($clientId, $specialityId, $scheduledDateAt,$scheduledTimeAt, $reason) {

            for ($attempt = 0; $attempt <= $this->maxAttempts; $attempt++) {
                
                // Chercher médecin disponible
                $medecin = Medecin::where('speciality_id', $specialityId)
                            ->where('is_available', true)
                            ->whereDoesntHave('audiences', function ($query) use ($scheduledDateAt) {
                                $query->where('scheduled_date_at', $scheduledDateAt);
                            })
                            ->first();

                if ($medecin) {
                    // Trouvé ! Créer l'audience
                    return Audience::create([
                        'client_id' => $clientId,
                        'medecin_id' => $medecin->id,
                        'speciality_id' => $specialityId,
                        'scheduled_date_at' => $scheduledDateAt,
                        'scheduled_time_at' => $scheduledTimeAt,
                        'status' => 'confirmed',
                        'reason' => $reason,
                    ]);
                }

                // Sinon, essayer +10 minutes
                $scheduledDateAt->addMinutes(10);
            }

            return null; // Aucun médecin disponible après toutes les tentatives
        });
    }
}

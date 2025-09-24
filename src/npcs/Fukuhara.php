<?php
namespace App\Npcs;

use App\Items\BTBrownSugar;
use Jugid\Staurie\Game\Npc;
use App\Items\Torch;

class Fukuhara extends Npc
{
    public function name(): string { return 'Fukuhara'; }
    public $first_meet = true;

    public function description(): string
    {
        return 'Un vieil homme au regard bienveillant. Il semble avoir besoin d’aide.';
    }

    public function speak(): string|array
    {
        // Si le joueur a déjà ramené l’herbe : récompense
        if ($this->playerHasItem(BTBrownSugar::class)) {
            // On garde l’herbe et on donne une torche
            return [
                "Oh ! Les rumeurs sont donc vrai !",
                "Maintenant je vais pouvoir m'en délecter en attendant mon sirops qui n'a toujours pas fini de couler !",
                $this->takeItem(BTBrownSugar::class) ? "Laissez-moi vous donner ceci..." : "",
                ($this->giveItem(new Torch(0, 0)) ? "Vous recevez une Torche !" : "Hum, revenez me voir plus tard."),
                "Tiens, pour le service rendu."
            ];
        }

        // Première rencontre : il offre un bouclier + donne l'objectif
        if (!$this->first_meet == true) {
            $this->first_meet = false;
            return [
                "On m'a dit qu'en tuant le monstre au bout du chemin de terre, on récupérait un délicieux brevage.",
                "Pourrais-tu le faire à ma place ? Je dois finir de récolter mon sirop d'érable .."
            ];
        }

        // Rappel de la quête
        if (!$this->first_meet == true) {
            return [
                "Mon sirop met du temps à couler...",
                "As-tu trouvé mon délicieux bubble tea ?",
                "Je le boirais bien en attendant mon sirop."
            ];
        }
    }
}

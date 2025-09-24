<?php
namespace App\Npcs;

use App\Items\BTBrownSugar;
use Jugid\Staurie\Game\Npc;
use App\Items\Torch;

class Fukuhara extends Npc
{
    public function name(): string { return 'Fukuhara'; }

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
                "Merci pour les herbes, elles me seront utiles.",
                $this->takeItem(BTBrownSugar::class) ? "Laissez-moi vous donner ceci..." : "",
                ($this->giveItem(new Torch(0, 0)) ? "Vous recevez une Torche !" : "Hum, revenez me voir plus tard."),
                "Avec une torche, la forêt à l'est sera moins dangereuse."
            ];
        }

        // Première rencontre : il offre un bouclier + donne l'objectif
        if (!$this->playerHasItem(WoodenShield::class)) {
            $this->giveItem(new WoodenShield(0, 0));
            return [
                "Bienvenue, voyageur.",
                "Prenez ce bouclier — la prudence est mère de sûreté.",
                "J’aurais besoin d’un service : au sud, près de la rivière, pousse une herbe médicinale.",
                "Ramenez-m’en un paquet, s’il vous plaît."
            ];
        }

        // Rappel de la quête
        return [
            "Avez-vous trouvé l’herbe au bord de la rivière (au sud) ?",
            "Revenez me voir avec un paquet d’herbes et je vous récompenserai."
        ];
    }
}

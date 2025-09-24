<?php
namespace App\Npcs;

use App\Items\BTCocoMenthe;
use Jugid\Staurie\Game\Npc;
use App\Items\Torch;

class Hiroto extends Npc
{
    public function name(): string { return 'Hiroto'; }
    public $first_meet = true;

    public function description(): string
    {
        return 'Un vieil homme au regard bienveillant. Il semble avoir besoin d’aide.';
    }

    public function speak(): string|array
    {
        // Si le joueur a déjà ramené l’herbe : récompense
        if ($this->playerHasItem(BTCocoMenthe::class)) {
            // On garde l’herbe et on donne une torche
            return [
                "Aaaah enfin ^^",
                "Mon envie de bubble tea Coco Menthe va enfin être étouffée.",
                "Merci, je crois que c'est ça qu'on dit dans ces cas...",
                $this->takeItem(BTCocoMenthe::class) ? "Et tiens, on est quitte." : "",
                ($this->giveItem(new Torch(0, 0)) ? "Vous recevez une Torche !" : "Hum, revenez me voir plus tard."),
                "Avec une torche, la forêt à l'est sera moins dangereuse."
            ];
        }

        // Première rencontre : il offre un bouclier + donne l'objectif
        if (!$this->first_meet == true) {
            $this->first_meet = false;
            return [
                "Tu as vu les cocotiers ? Ils sont beaux, pas vrai ?",
                "Leurs fruits sont délicieux et j'aime faire des bubble tea Coco Menthe.",
                "Seulement je n'arrive plus à en faire."
            ];
        }

        // Rappel de la quête
        if (!$this->first_meet == true) {
            return [
                "Quoi ?! Tu n'en a toujours pas trouvé ?",
                "MAIS DEPECHE TOI !",
                "Vas tuer les monstres sur la plages ! Je meurs de soif !"
            ];
        }
    }
}

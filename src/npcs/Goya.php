<?php
namespace App\Npcs;

use App\Items\BTPecheLitchi;
use Jugid\Staurie\Game\Npc;
use App\Items\Torch;

class Goya extends Npc
{
    public function name(): string { return 'Goya'; }
    
    public $first_meet = true;

    public function description(): string
    {
        return 'Un vieil homme au regard bienveillant. Il semble avoir besoin d’aide.';
    }

    public function speak(): string|array
    {
        // Si le joueur a déjà ramené l’herbe : récompense
        if ($this->playerHasItem(BTPecheLitchi::class)) {
            // On garde l’herbe et on donne une torche
            return [
                "Oh merci beaucoup !",
                "\e[3m*Slurp*\e[0m",
                "...", 
                "J'adore",
                $this->takeItem(BTPecheLitchi::class) ? "Laissez-moi vous donner ceci..." : "",
                ($this->giveItem(new Torch(0, 0)) ? "Vous recevez une Torche !" : "Hum, revenez me voir plus tard."),
                "Avec une torche, la forêt à l'est sera moins dangereuse."
            ];
        }

        // Première rencontre : il offre un bouclier + donne l'objectif
        if (!$this->first_meet == true) {
            $this->first_meet = false;
            return [
                "J'ai une cousine qui m'avait recommandé le bubble tea Pêche Litchi.",
                "Tu pourrais m'en ramener un pour que je goûte ?"
            ];
        }

        // Rappel de la quête
        if (!$this->first_meet == true) {
            return [
                "Je te conseille de chercher le monstre associé dans le coin.",
                "Je l'ai vu passer par là récemment."
            ];
        }
    }
}

<?php
namespace App\Npcs;

use App\Items\BTTheJasminMangue;
use Jugid\Staurie\Game\Npc;
use App\Items\Torch;

class Mizutani extends Npc
{
    public function name(): string { return 'Mizutani'; }
    public $first_meet = true;

    public function description(): string
    {
        return 'Un vieil homme au regard bienveillant. Il semble avoir besoin d’aide.';
    }

    public function speak(): string|array
    {
        // Si le joueur a déjà ramené l’herbe : récompense
        if ($this->playerHasItem(BTTheJasminMangue::class)) {
            // On garde l’herbe et on donne une torche
            return [
                "Merci jeune ami.",
                "Grâce à toi je vais pouvoir mieux méditer...",
                $this->takeItem(BTTheJasminMangue::class) ? "Tiens prends ceci en remerciement pour ta bonté. " : "",
                "Avec une torche, la forêt à l'est sera moins dangereuse."
            ];
        }

        // Première rencontre : il donne la quête
        if (!$this->first_meet == true) {
            $this->first_meet = false;
            return [
                "Bonjour, l'ami ! J'espère que tu profite des cerisier.",
                "Rien de mieux qu'un Bubble tea Mangue et thé au jasmin pendant ma méditation ... Mais je suis pacifiste.",
                "Tu pourrais aller le chercher pour moi s'il te plaît ?"
            ];
        }

        // Rappel de la quête
        if (!$this->first_meet == true) {
            return [
                "Il te suffit de vaincre un monstre dans la plaine de cerisier pour récupérer le bubble tea.",
                "Je ne crois pas puisse argumenter avec eux ..."
            ];
        }
    }
}

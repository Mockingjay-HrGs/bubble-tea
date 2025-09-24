<?php
namespace App\Npcs;

use App\Items\BTTheNoirGrainDeCafe;
use Jugid\Staurie\Game\Npc;
use App\Items\Torch;

class Rumiko extends Npc
{
    public function name(): string { return 'Rumiko'; }
    public $first_meet = true;

    public function description(): string
    {
        return 'Un vieil homme au regard bienveillant. Il semble avoir besoin d’aide.';
    }

    public function speak(): string|array
    {
        // Si le joueur a déjà ramené l’herbe : récompense
        if ($this->playerHasItem(BTTheNoirGrainDeCafe::class)) {
            // On garde l’herbe et on donne une torche
            return [
                "Ooooh c'est tellement bon ! Merci beaucoup jeune novice.",
                "C'est agréable de croiser des gens comme toi !",
                $this->takeItem(BTTheNoirGrainDeCafe::class) ? "bon courage pour la suite et tiens un peu d'argent de poche pour te faire plaisir." : "",
                ($this->earn(10) ? "Vous recevez une Torche !" : "Hum, revenez me voir plus tard."),
                "Avec une torche, la forêt à l'est sera moins dangereuse."
            ];
        }

        // Première rencontre : il offre un bouclier + donne l'objectif
        if (!$this->first_meet == true) {
            $this->first_meet = false;
            return [
                "Rhhhh ... Bonjour jeune novice.",
                "Je suis Rumiko. Je paris que tu connais les bubble tea ?",
                "Cette fameuse boissons que je buvait dans mes vieux jour... Elle me manque tant",
                "Quand j'en bois ça me rappelle mes premières amours ...",
                "Oh j'ai une idée ! Tu crois que tu pourrais m'en apporter pour que je puisse me rappeler une dernière fois de son goût ?",
                "Je ne peut malheuresement pas avec mes vieux os.",
                "Vas-y ! Mes préférés sont ceux que tu trouve tuant les monstres pas loin de chez moi.",
                "Bonne chance !"
            ];
        }

        // Rappel de la quête
        if (!$this->first_meet == true) {
            return [
                "Vas-y ! Je crois en toi, jeune novice ! J'ai tellement hâte de regouter à ce bubble tea."
            ];
        }
    }
}

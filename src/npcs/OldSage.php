<?php
namespace App\Npcs;

use Jugid\Staurie\Game\Npc;
use App\Items\WoodenShield;
use App\Items\HerbBundle;   // ⚠️ assure-toi que c’est bien la classe de ton item
use App\Items\Torch;

class OldSage extends Npc
{
    public function name(): string { return 'Old_Sage'; }

    public function description(): string
    {
        return 'Un vieil homme au regard bienveillant. Il semble avoir besoin d’aide.';
    }

    public function speak(): string|array
    {
        // --- ÉCHANGE : 1 paquet d’herbes -> 1 torche ---
        if ($this->playerHasItem(HerbBundle::class)) {
            // 1) on tente de prendre l’item (retire 1 du sac du joueur)
            $took = $this->takeItem(HerbBundle::class);

            if (!$took) {
                // échec improbable si l’item a disparu entre-temps
                return [
                    "Ah… je ne trouve plus les herbes dans votre sac.",
                    "Revenez me voir avec un paquet d’herbes et je vous donnerai une torche."
                ];
            }

            // 2) on tente de donner la torche
            $gave = $this->giveItem(new Torch(0, 0)); // adapte le constructeur si besoin

            if ($gave) {
                return [
                    "Merci pour les herbes, elles me seront utiles.",
                    "Laissez-moi vous donner ceci...",
                    "Vous recevez une Torche !",
                    "Avec une torche, la forêt à l'est sera moins dangereuse."
                ];
            }

            // 3) si l’inventaire du joueur est plein, on annulera pas l’échange (on pourrait rendre l’herbe, mais on reste simple)
            return [
                "Merci pour les herbes !",
                "Hmm… votre inventaire est plein. Repassez me voir quand vous aurez une place pour la torche."
            ];
        }

        // --- PREMIÈRE RENCONTRE : donner un bouclier si pas encore ---
        if (!$this->playerHasItem(WoodenShield::class)) {
            $this->giveItem(new WoodenShield(0, 0));
            return [
                "Bienvenue, voyageur.",
                "Prenez ce bouclier — la prudence est mère de sûreté.",
                "J’aurais besoin d’un service : au sud, près de la rivière, pousse une herbe médicinale.",
                "Ramenez-m’en un paquet, s’il vous plaît."
            ];
        }

        // --- Rappel de quête ---
        return [
            "Avez-vous trouvé l’herbe au bord de la rivière (au sud) ?",
            "Revenez me voir avec un paquet d’herbes et je vous récompenserai d’une torche."
        ];
    }
}

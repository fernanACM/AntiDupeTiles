<?php

#      _       ____   __  __ 
#     / \     / ___| |  \/  |
#    / _ \   | |     | |\/| |
#   / ___ \  | |___  | |  | |
#  /_/   \_\  \____| |_|  |_|
# The creator of this plugin was fernanACM.
# https://github.com/fernanACM

namespace fernanACM\AntiDupeTiles;

use pocketmine\Server;

use pocketmine\plugin\PluginBase;

use pocketmine\event\Listener;

use pocketmine\block\VanillaBlocks;

use pocketmine\event\player\PlayerInteractEvent;

class AntiDupeTiles extends PluginBase implements Listener{

    /**
     * @return void
     */
    public function onEnable(): void{
        Server::getInstance()->getPluginManager()->registerEvents($this, $this);
    }

    /**
     * @param PlayerInteractEvent $event
     * @return void
     */
    public function onInteract(PlayerInteractEvent $event): void{
        $block = $event->getBlock();
        $blockedBlockIds = [
            VanillaBlocks::ENCHANTING_TABLE()->getTypeId(),
            VanillaBlocks::BARREL()->getTypeId(),
            VanillaBlocks::ANVIL()->getTypeId(),
            VanillaBlocks::SMITHING_TABLE()->getTypeId(),
            VanillaBlocks::CARTOGRAPHY_TABLE()->getTypeId(),
            VanillaBlocks::POTION_CAULDRON()->getTypeId(),
            VanillaBlocks::STONECUTTER()->getTypeId(),
        ];
        if(in_array($block->getTypeId(), $blockedBlockIds)){
            $event->cancel();
        }
    }
}
<?php
declare(strict_types=1);

namespace Pathfinder\MainMenu;

use Pathfinder\DatabaseAdapter\Adapter;
use Pathfinder\Renderer\PageRenderer;
use Pathfinder\Renderer\TemplateLoader;

class MainMenuHandler
{
    private Adapter $dataBaseAdapter;

    public function __construct()
    {
        $this->dataBaseAdapter = new Adapter();
    }

    public function loadCharacter(string $template, string $charName):void
    {
        $character = $this->dataBaseAdapter->loadCharacter($charName);
        $pageRenderer = new PageRenderer(new TemplateLoader($template));

        $pageRenderer->loadCharacterDetails([$character->getProficiencyBonus()]);
        $pageRenderer->loadAbilityScores($character->getAbilityScores());
        $pageRenderer->loadSkillList($character->getSkillList());
        $pageRenderer->loadSavingThrows($character->getSavingThrowList());
        $pageRenderer->loadResistances($character->getResistances());
        $pageRenderer->loadActionBar($character->getEquippedItems());
        $pageRenderer->loadInventory($character->getInventory());
        $pageRenderer->loadSpellbook([]);

        echo $pageRenderer->renderPage();
    }

    public function loadMainMenu(string $template):void
    {
        $pageRenderer = new PageRenderer(new TemplateLoader($template));
        $characters = $this->dataBaseAdapter->listCharacters();
        $pageRenderer->loadCharacterList($characters);
        echo $pageRenderer->renderPage();
    }

    public function createNewCharacter(string $template):void
    {
        $pageRenderer = new PageRenderer(new TemplateLoader($template));
        echo $pageRenderer->renderPage();
    }
}
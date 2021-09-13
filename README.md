# Pathfinder2CharacterSheet
This is a Character Sheet Manager [and later Connector to the Roll20 API]

Atm goal is to implement functions to create characters, feats, items, spells and 
to create and manage a character

Roadmap:

pathfinder 2  charactersheet roadmap

alpha:

- implement database plug
	- save character into database, load from database
- implement welcome page with characters
- implement inventory
- implement character/item/spell Creation page
- implement feats prototype

beta:

- new character will load a complete list of races / classes for lvl 1 -> CharacterCreator.js
- implement race boni at character creation (!) -> map from selection to database feats!
- implement class boni at character creation (!) -> map from selection to database feats!
- implement feats at character creation -> map from selection to database feats!
- implement system for items and item database, and active item bar(equipped and attuned)
- implement races
- implement classes
- implement feat option to create feats via the mask -> don'T implement each feat per hand
- items may add resistances / stat boni etc.
- implement system for spells and spell database / spellbook
- new feats and levelup_screen
- implement rolling and ajax
- implement customization of skills, inventar and spells to add custom versions / content


post-launch:
build mobile first css into creators
add javascript validation for some creators (f.e. the weapon_creator needs at least 1 tag, but not light and heavy together)
items should probably be held by multiple item collection objects like "weapons" etc.
spells should AT LEAST be saved by spell school
if we don't do this, the objects are getting really fucking big and we should consider
saving them in another format instead (like on hard drive...)
maybe move skills into database table instead of keeping it inside file
prefix characters with player_names so multiple characters with same name can co-exist?
make a login system, maybe use plugin, read player name but keep independend
implement style switcher for mobile
make a nice gui, implement the option to hold images for characters and items
make spellbook and inventory switchable (vlt. umblättern oder so)


-------------------------------------------

1 - main menu loading: show all characters currently in database ( loadList, later load image f.e. )
1.1 - create new character: give simple form to create a new character, details can be added later,
                            just option to choose race and class.
2 - load actual character sheet, give option to switch character ( aka go back to main menu )

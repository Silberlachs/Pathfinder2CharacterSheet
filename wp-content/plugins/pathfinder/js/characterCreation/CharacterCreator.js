jQuery(document).ready(function($) {

    $('#character_race').change(function(){
        eval("select"+$('#character_race').find(":selected").text() + "();");
    });

    $('#character_background').change(function(){

    });

    $('#character_class').change(function(){

    });

    //#############################     Races     ##########################################

    function selectDwarf()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="ancient_blood">Ancient Blood Dwarf</option>'+
            '<option value="deat_warden">Death Warden Dwarf</option>'+
            '<option value="forge">Forge Dwarf</option>'+
            '<option value="rock">Rock Dwarf</option>'+
            '<option value="strong_blooded">Strong-Blooded Dwarf</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="dwarfen_lore">Dwarfen Lore</option>'+
            '<option value="dwarfen_weapon_familarity">Dwarfen Weapon Familarity</option>'+
            '<option value="rock_runner">Rock Runner</option>'+
            '<option value="stone_cunning">Stone Cunning</option>'+
            '<option value="unburdened_iron">Unburdened Iron</option>'+
            '<option value="vengeful_hatred">Vengeful Hatred</option>'
        );
    }
    function selectElf()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="arctic">Arctic Elf</option>'+
            '<option value="cavern">Cavern Elf</option>'+
            '<option value="seer">Seer Elf</option>'+
            '<option value="whisper">Whisper Elf</option>'+
            '<option value="woodland">Woodland Elf</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="ancestral_longlivety">Ancestral Longlivety</option>'+
            '<option value="elfen_lore">Elfen Lore</option>'+
            '<option value="elfen_weapon_familarity">Elfen Weapon Familarity</option>'+
            '<option value="forlorn">Forlorn</option>'+
            '<option value="nimble_elf">Nimble Elf</option>'+
            '<option value="otherwordly_magic">Otherworldly Magic</option>'+
            '<option value="unwavering_mien">Unwavering Mien</option>'
        );
    }
    function selectGnome()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="chameloen">Chameleon Gnome</option>'+
            '<option value="fey-touched">Fey-touched Gnome</option>'+
            '<option value="sensate">Sensate Gnome</option>'+
            '<option value="umbral">Umbral Gnome</option>'+
            '<option value="wellspring">Wellspring Gnome</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="animal_accomplice">Animal Accomplice </option>'+
            '<option value="burrow_elocutionist">Burrow Elocutionist</option>'+
            '<option value="fey_fellowship">Fey Fellowship</option>'+
            '<option value="first_world_magic">First World Magic</option>'+
            '<option value="gnome_obsession">Gnome Obsession</option>'+
            '<option value="gnome_weapon_familarity">Gnome Weapon Familarity</option>'+
        '<option value="illusion_sense">Illusion Sense</option>'
        );
    }
    function selectGoblin()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="charhide">Charhide Goblin</option>'+
            '<option value="irongut">Irongut Goblin</option>'+
            '<option value="razortooth">Razortooth Goblin</option>'+
            '<option value="snow">Snow Goblin</option>'+
            '<option value="unbreakable">Unbreakable Goblin</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="burn_it">Burn It!!!</option>'+
            '<option value="city_scavenger">City Scavenger</option>'+
            '<option value="goblin_lore">Goblin Lore</option>'+
            '<option value="goblin_scuttle">Goblin Scuttle</option>'+
            '<option value="goblin_song">Goblin Song</option>'+
            '<option value="goblin_weapon_familarity">Goblin Weapon Familarity</option>'+
            '<option value="junk_tinker">Junk Tinker</option>'+
            '<option value="rough_rider">Rough Rider</option>'+
            '<option value="very_sneaky">Very Sneaky</option>'
        );
    }
    function selectHalfling()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="gutsy">Gutsy Halfling</option>'+
            '<option value="hillock">Hillock Halfling</option>'+
            '<option value="nomadic">Nomadic Halfling</option>'+
            '<option value="twilight">Twilight Halfling</option>'+
            '<option value="wildwood">Wildwood Halfling</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="distracting_shadows">Distracting Shadows</option>'+
            '<option value="halfling_lore">Halfling Lore</option>'+
            '<option value="halfling_luck">Halfling Luck</option>'+
            '<option value="sure_feet">Sure Feet</option>'+
            '<option value="titan_slinger">Titan Slinger</option>'+
            '<option value="halfling_weapon_familarity">Halfling Weapon Familarity</option>'+
            '<option value="unfettered_halfling">Unfettered Halfling</option>'+
            '<option value="watchfull_halfling">Watchfull Halfling</option>'
        );
    }
    function selectHuman()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="half-elf">Half-Elf</option>'+
            '<option value="half-orc">Half-Orc</option>'+
            '<option value="skilled">Skilled Human</option>'+
            '<option value="versatile">Versatile Human</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="adapted_cantrip">Adapted Cantrip</option>'+
            '<option value="cooperative_nature">Cooperative Nature</option>'+
            '<option value="general_training">General Training</option>'+
            '<option value="haughty_obsinacy">Haughty Obstinacy</option>'+
            '<option value="natural_ambition">Natural Ambition</option>'+
            '<option value="natural_skill">Natural Skill</option>'+
            '<option value="unconventional_weaponary">Unconventional Weaponary</option>'
        );
    }

});





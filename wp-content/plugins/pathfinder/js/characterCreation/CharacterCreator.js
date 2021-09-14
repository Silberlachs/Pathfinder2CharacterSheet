jQuery(document).ready(function($) {

    $('#character_race').change(function(){
        eval("select"+$('#character_race').find(":selected").text() + "();");
    });

    //special cases (mainly humans)
    $('#character_ancestry').change(function(){
       if($('#character_ancestry').val() === 'half-elf')
       {
           $('#character_race_feats').empty().append('' +
           '<option value="adapted_cantrip">Adapted Cantrip</option>'+
           '<option value="cooperative_nature">Cooperative Nature</option>'+
           '<option value="general_training">General Training</option>'+
           '<option value="haughty_obsinacy">Haughty Obstinacy</option>'+
           '<option value="natural_ambition">Natural Ambition</option>'+
           '<option value="natural_skill">Natural Skill</option>'+
           '<option value="unconventional_weaponary">Unconventional Weaponary</option>'+
           '<option value="elf_atavism">Elf Atavism</option>'+
           '<option value="earned_glory">Earned Glory</option>'
           );
       }
        else if($('#character_ancestry').val() === 'half-orc')
        {
            $('#character_race_feats').empty().append('' +
                '<option value="adapted_cantrip">Adapted Cantrip</option>'+
                '<option value="cooperative_nature">Cooperative Nature</option>'+
                '<option value="general_training">General Training</option>'+
                '<option value="haughty_obsinacy">Haughty Obstinacy</option>'+
                '<option value="natural_ambition">Natural Ambition</option>'+
                '<option value="natural_skill">Natural Skill</option>'+
                '<option value="unconventional_weaponary">Unconventional Weaponary</option>'+
                '<option value="monstrous_peacemaker">Monstrous Peacemaker</option>'+
                '<option value="orc_ferocity">Orc Ferocity</option>'+
                '<option value="orc_sight">Orc Sight</option>'+
                '<option value="orc_superstition">Orc Superstition</option>'+
                '<option value="orc_weapon_familarity">Orc Weapon Familarity</option>'
            );
        }
        else
       {
           $('#character_race_feats').empty().append('' +
               '<option value="adapted_cantrip">Adapted Cantrip</option>'+
               '<option value="cooperative_nature">Cooperative Nature</option>'+
               '<option value="general_training">General Training</option>'+
               '<option value="haughty_obsinacy">Haughty Obstinacy</option>'+
               '<option value="natural_ambition">Natural Ambition</option>'+
               '<option value="natural_skill">Natural Skill</option>'+
               '<option value="unconventional_weaponary">Unconventional Weaponary</option>'+
               '<option value="monstrous_peacemaker">Monstrous Peacemaker</option>'
           );
       }
    });

    $('#character_background').change(function(){
        alert("why");
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
            '<option value="vengeful_hatred">Vengeful Hatred</option>'+
            '<option value="dwarfen_doughtiness">Dwarfen Doughtiness</option>'+
            '<option value="eye_for_treasure">Eye for Treasure</option>'
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
            '<option value="unwavering_mien">Unwavering Mien</option>'+
            '<option value="ancestral_linguistics">Ancestral Linguistics</option>'+
            '<option value="elven_alooveness">Elven Alooveness</option>'+
            '<option value="know_your_own">Know your own</option>'
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
        '<option value="illusion_sense">Illusion Sense</option>'+
        '<option value="empathetic_plea">Empathetic Plea</option>'+
        '<option value="razzle_dazzle">Razzle Dazzle</option>'
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
            '<option value="very_sneaky">Very Sneaky</option>'+
            '<option value="extra_squishy">Extra Squishy</option>'+
            '<option value="twitchy">Twitchy</option>'
        );
    }
    function selectHalfling()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="gutsy">Gutsy Halfling</option>'+
            '<option value="hillock">Hillock Halfling</option>'+
            '<option value="nomadic">Nomadic Halfling</option>'+
            '<option value="twilight">Twilight Halfling</option>'+
            '<option value="wildwood">Wildwood Halfling</option>'+
            '<option value="jinxed">Jinxed Halfling</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="distracting_shadows">Distracting Shadows</option>'+
            '<option value="halfling_lore">Halfling Lore</option>'+
            '<option value="halfling_luck">Halfling Luck</option>'+
            '<option value="sure_feet">Sure Feet</option>'+
            '<option value="titan_slinger">Titan Slinger</option>'+
            '<option value="halfling_weapon_familarity">Halfling Weapon Familarity</option>'+
            '<option value="unfettered_halfling">Unfettered Halfling</option>'+
            '<option value="watchfull_halfling">Watchfull Halfling</option>'+
            '<option value="folksy_patter">Folksy Patter</option>'+
            '<option value="prairie_rider">Prairie Rider</option>'
        );
    }
    function selectHuman()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="half-elf">Half-Elf</option>'+
            '<option value="half-orc"">Half-Orc</option>'+
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
    function selecCatfolk()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="clawed">Clawed Catfolk</option>'+
            '<option value="hunting"">Hunting Catfolk</option>'+
            '<option value="jungle">Jungle Catfolk</option>'+
            '<option value="nine_lives">Nine Lives Catfolk</option>'+
            '<option value="winter">Winter Catfolk</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="cats_luck">Cat\'s Luck</option>'+
            '<option value="catfolk_lore">Catfolk Lore</option>'+
            '<option value="catfolk_weapon_familarity">Catfolk Weapon Familarity</option>'+
            '<option value="well_met_traveler">Well-Met Traveler</option>'
        );
    }
    function selecKobold()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="cavern">Cavern Kobold</option>'+
            '<option value="dragonscaled">Dragonscaled Kobold</option>'+
            '<option value="spellscale">Spellscale kobold</option>'+
            '<option value="strongjaw">Strongjaw Kobold</option>'+
            '<option value="venomtail">Venomtail Kobold</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="cringe">Cringe</option>'+
            '<option value="dragons_presence">Dragon\'s Presence</option>'+
            '<option value="kobold_breath">Kobold Breath</option>'+
            '<option value="kobold_lore">Kobold Lore</option>'+
            '<option value="scamper">Scamper</option>'+
            '<option value="snare_setter">Snare Setter</option>'
        );
    }
    function selectOrc()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="badlands">Badlands Orc</option>'+
            '<option value="deep_orc">Deep Orc</option>'+
            '<option value="hold_scarred">Hold-Scarred Orc</option>'+
            '<option value="rainfall">Rainfall Orc</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="beast_trainer">Beast Trainer</option>'+
            '<option value="iron_fists">Iron Fists</option>'+
            '<option value="tusks">Tusks</option>'+
            '<option value="orc_lore">Orc Lore</option>'
        );
    }
    function selectRatfolk()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="desert">Desert Rat</option>'+
            '<option value="deep_rat">Deep Rat</option>'+
            '<option value="longsnout">Longsnout Rat</option>'+
            '<option value="sewer">Sewer Rat</option>'+
            '<option value="shadow">Shadow Rat</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="cheek_pouches">Cheek Pouches</option>'+
            '<option value="pack_rat">Pack Rat</option>'+
            '<option value="rat_familiar">Rat Familiar</option>'+
            '<option value="ratfolk_lore">Ratfolk Lore</option>'+
            '<option value="ratspeak">Ratspeak</option>'+
            '<option value="tinkering_fingers">Tinkering Fingers</option>'+
            '<option value="vicious_incisors">Vicious Incisors</option>'+
            '<option value="warren_navigator">Warren Navigator</option>'
        );
    }
    function selectTengu()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="jinxed">Jinxed Tengu</option>'+
            '<option value="mountainkeeper">Mountainkeeper Tengu</option>'+
            '<option value="skyborn">Skyborn Tengu</option>'+
            '<option value="stormtossed">Stormtossed Tengu</option>'+
            '<option value="taloned">Taloned Tengu</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="scavangers_search">Scavenger\'s Search</option>'+
            '<option value="squawk">Squawk!!!</option>'+
            '<option value="storms_lash">Storm\'s Lash</option>'+
            '<option value="tengu_lore">Tengu Lore</option>'+
            '<option value="tengu_weapon_familarity">Tengu Weapon Familarity</option>'
        );
    }
    function selectChangeling()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="changeling">Changeling (Versatile Heriatage)</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="brine_may">Brine May</option>'+
            '<option value="callow_may">Callow May</option>'+
            '<option value="dream_may">Dream May</option>'+
            '<option value="slag_may">Slag May</option>'+
            '<option value="changeling_lore">Changeling Lore</option>'+
            '<option value="hag_claws">Hag Claws</option>'+
            '<option value="hag_sight">Hag Sight</option>'
        );
    }
    function selectDhampir()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="dhampir">Dhampir (Versatile Heriatage)</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="eyes_of_night">Eyes of Night</option>'+
            '<option value="fangs">Fangs</option>'+
            '<option value="straveika">Straveika</option>'+
            '<option value="svetocher">Svetocher</option>'+
            '<option value="vampire_lore">Vampire Lore</option>'+
            '<option value="voice_of_night">Voice of Night</option>'
        );
    }
    function selectAasimar()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="aasimar">Aasimar (Planetary Scion)</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="angelkin">Angelkin</option>'+
            '<option value="celestial_eyes">Celestial Eyes</option>'+
            '<option value="celestial_lore">Celestial Lore</option>'+
            '<option value="halo">Halo</option>'+
            '<option value="lawbringer">Lawbringer</option>'
        );
    }
    function selectDuskwalker()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="dhampir">Duskwalker (Planetary Scion)</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="duskwalker_lore">Duskwalker Lore</option>'+
            '<option value="ghost_hunter">Ghost Hunter</option>'+
            '<option value="gravesigth">Gravesigth</option>'
        );
    }
    function selectTiefling()
    {
        $('#character_ancestry').empty().append('' +
            '<option value="dhampir">Tiefling (Planetary Scion)</option>'
        );
        $('#character_race_feats').empty().append('' +
            '<option value="fiendish_eyes">Fiendish Eyes</option>'+
            '<option value="fiendish_lore">Fiendish Lore</option>'+
            '<option value="form_of_the_fiend">Form of the Fiend</option>'+
            '<option value="grimspawn">Grimspawn</option>'+
            '<option value="hellspawn">Hellspawn</option>'+
            '<option value="nimble_hoofes">Nimble Hoofes</option>'+
            '<option value="pitborn">Pitborn</option>'
        );
    }


    //###########################  END RACES (STANDART)    ####################################
    //TODO: change form based on races ( later for backgrounds and classes , too )

});





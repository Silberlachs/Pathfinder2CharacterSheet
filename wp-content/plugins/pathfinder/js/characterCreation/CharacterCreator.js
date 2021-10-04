
jQuery(document).ready(function($)
{
    let character_strength_score = parseInt($('#character_strength').val());
    let character_dexterity_score = parseInt($('#character_dexterity').val());
    let character_constitution_score = parseInt($('#character_constitution').val());
    let character_intelligence_score = parseInt($('#character_intelligence').val());
    let character_wisdom_score = parseInt($('#character_wisdom').val());
    let character_charisma_score = parseInt($('#character_charisma').val());
    let standardField_class = "";
    let standardField_background = "";

    $('#character_race, #character_ancestry, #character_class, #character_background').change(function(){
        resetStats();
        resetSkillsAndFeats();
        clearExtraBox();
        eval("select"+$('#character_race').find(":selected").text() + "();");
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
        console.log("race added")
        eval("select"+$('#character_class').find(":selected").text() + "();");
        console.log("class added");
        eval("select"+$('#character_background').find(":selected").text() + "();");
        console.log("background added");

        //add additional skills to choose from here
    });

    $('#right_extra').change(function(){
        removeFrom(standardField_class);
        removeFrom(standardField_class);
        addTo($('#right_extra').find(":selected").text().toLowerCase());
        addTo($('#right_extra').find(":selected").text().toLowerCase());
        standardField_class = $('#right_extra').find(":selected").text().toLowerCase();
    });

    $('#character_class_specialisation').change(function() {
        switch ($('#character_class_specialisation option:selected').text())
        {
            case "Abberant" :
                $('#right_extra').html('Spell list [ occult ]');
            break;
            case "Angelic" :
                $('#right_extra').html('Spell list [ divine ]');
            break;
            case "Demonic" :
                $('#right_extra').html('Spell list [ divine ]');
            break;
            case "Diabolic" :
                $('#right_extra').html('Spell list [ divine ]');
            break;
            case "Draconic" :
                $('#right_extra').html(''+
                    '<select id="sorcerer_type">'+
                        '<optgroup label="Metallic">' +
                            '<option value="brass" selected>Brass (Fire)</option>'+
                            '<option value="bronze">Bronze (Electro)</option>'+
                            '<option value="copper">Copper (Acid)</option>'+
                            '<option value="gold">Gold (Fire)</option>'+
                            '<option value="silver">Silver (Ice)</option>'+
                        '</optgroup>'+
                        '<optgroup label="Chromatic">' +
                            '<option value="black">Black (Acid)</option>'+
                            '<option value="blue">Blue (Electro)</option>'+
                            '<option value="green">Green (Toxic / Poison)</option>'+
                            '<option value="red">Red (Fire)</option>'+
                            '<option value="white">White (Ice)</option>'+
                        '</optgroup>'+
                    '</select>'+
                    'Spell list [ arcane ]<br>'
                );
            break;
            case "Elemental" :
                $('#right_extra').html(''+
                    '<select id="sorcerer_type">'+
                        '<option value="air">Air</option>'+
                        '<option value="fire">Fire</option>'+
                        '<option value="water">Water</option>'+
                        '<option value="earth">Earth</option>'+
                    '</select>'+
                    'Spell list [ primal ]<br>'+
                    'Marked Spells deal bludgeoning damage for [ Air / Water / Earth ] or fire damage for [ Fire ].'
                );
            break;
            case "Fey" :
                $('#right_extra').html('Spell list [ divine ]');
            break;
            case "Hag" :
                $('#right_extra').html('Spell list [ occult ]');
            break;
            case "Imperial" :
                $('#right_extra').html('Spell list [ arcane ]');
            break;
            case "Undead" :
                $('#right_extra').html('Spell list [ divine ]');
            break;
            default:
                $('#right_extra').html('');
            break;
        }
    });

    //#############################     Skill Reset  ######################################

    function resetStats()
    {
        $('#character_strength').val(10);
        $('#character_dexterity').val(10);
        $('#character_constitution').val(10);
        $('#character_intelligence').val(10);
        $('#character_wisdom').val(10);
        $('#character_charisma').val(10);

        $('#chosen_boni').html(0);

        character_strength_score = parseInt($('#character_strength').val());
        character_dexterity_score = parseInt($('#character_dexterity').val());
        character_constitution_score = parseInt($('#character_constitution').val());
        character_intelligence_score = parseInt($('#character_intelligence').val());
        character_wisdom_score = parseInt($('#character_wisdom').val());
        character_charisma_score = parseInt($('#character_charisma').val());
    }

    //##########################  Skill/Feat Reset     #######################################

    function resetSkillsAndFeats()
    {
        $('#skill_list').html("");
        $('#feat_list').html("");
    }

    //##########################  Number box manipulation ###############################

    $('.inline_ability').change(function(){
        if(parseInt(this.value) > parseInt(eval(this.getAttribute("id")+"_score"))){
            if(parseInt($('#chosen_boni').html()) > 0) {
                let newValue = $('#chosen_boni').html();
                $('#chosen_boni').html(parseInt(newValue) - 1);
                let score_id_name = this.getAttribute("id")+"_score";
                eval(  score_id_name + "+= 1");
            }
            else
            {
                this.value = parseInt(this.value)-1;
            }
        }
       else if(parseInt(this.value) < parseInt(eval(this.getAttribute("id")+"_score"))){
            let newValue = $('#chosen_boni').html();
            $('#chosen_boni').html(parseInt(newValue) + 1);
            let score_id_name = this.getAttribute("id")+"_score";
            eval(  score_id_name + "-= 1");
        }
       else{
            console.log("unknown ability score input box case [line 157]");
        }

    });

    function addTo(attribute)
    {
            let ergebniss = +$("#character_" + arguments[0]).val() + 1;
            $("#character_" + arguments[0]).val(ergebniss);
            let score_id_name = "character_" + arguments[0] + "_score";
            eval(  score_id_name + "+= 1");
    }

    function removeFrom(attribute)
    {
        let ergebniss = +$("#character_"+arguments[0]).val() - 1;
        $("#character_"+arguments[0]).val(ergebniss);
        let score_id_name = "character_" + arguments[0] + "_score";
        eval(  score_id_name + "-= 1");
    }

    function addFree()
    {
        let ergebniss = +$('#chosen_boni').html() + 1;
        $("#chosen_boni").text(ergebniss);
    }

    function printMsg()
    {
        $('#message').text(arguments[0]);
    }
    //#############################  extra Box    ##########################################

    function clearExtraBox()
    {
        $('#right_extra').html("");
    }


    //#############################     Races     ##########################################

    function selectDwarf()
    {
        addTo('constitution');
        addTo('wisdom');
        addFree();
        removeFrom('charisma');
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
        addTo('dexterity');
        addTo('intelligence');
        addFree();
        removeFrom('constitution');
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
        addTo('constitution');
        addTo('charisma');
        addFree();
        removeFrom('strength');
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
        addTo('dexterity');
        addTo('charisma');
        addFree();
        removeFrom('wisdom');
        $('#character_ancestry').empty().append('' +
            '<optgroup label="Core Rulebook">'+
                '<option value="charhide">Charhide Goblin</option>'+
                '<option value="irongut">Irongut Goblin</option>'+
                '<option value="razortooth">Razortooth Goblin</option>'+
                '<option value="snow">Snow Goblin</option>'+
                '<option value="unbreakable">Unbreakable Goblin</option>'+
            '</optgroup>'
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
        addTo('dexterity');
        addTo('wisdom');
        addFree();
        removeFrom('strength');
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
        $('#feat_list').append('<b>Halfling</b><br>');
        $('#feat_list').append('Keen Eyes<br>');
    }
    function selectHuman()
    {
        addFree();
        addFree();
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
    function selectCatfolk()
    {
        addTo('dexterity');
        addTo('charisma');
        addFree();
        removeFrom('wisdom');
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
        addTo('dexterity');
        addTo('charisma');
        addFree();
        removeFrom('constitution');
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
        addTo('strength');
        addFree();
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
        addTo('dexterity');
        addTo('intelligence');
        addFree();
        removeFrom('strength');
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
        addTo('dexterity');
        addFree();
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

    //###########################  BEGIN CLASS SELECTOR    ####################################
    function selectAlchemist()
    {
        addTo('intelligence');
        addTo('intelligence');
        $('#class_specialisation_name').html("Research Field");
        $('#character_class_specialisation').empty().append('' +
            '<option value="bomber">Bomber</option>'+
            '<option value="chirurGeon">ChirurGeon</option>'+
            '<option value="mutagenist">Mutagenist</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="alchemical_familiar">Alchemical Familiar</option>'+
            '<option value="alchemical_savant">Alchemical Savant</option>'+
            '<option value="far_lobber">Far Lobber</option>'+
            '<option value="quick_bomber">Quick Bomber</option>'
        );
    }
    function selectBarbarian()
    {
        addTo('strength');
        addTo('strength');
        $('#class_specialisation_name').html("Instincts");
        $('#character_class_specialisation').empty().append('' +
            '<option value="animal_instinct">Animal instinct</option>'+
            '<option value="dragon_instinct">Dragon Instinct</option>'+
            '<option value="fury_instinct">Fury Instinct</option>'+
            '<option value="spirit_instinct">Spirit Instinct</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="acute_vision">Acute Vision</option>'+
            '<option value="moment_of_clarity">Moment of Clarity</option>'+
            '<option value="raging_intimidation">Raging Intimidation</option>'+
            '<option value="raging_thrower">Raging Thrower</option>'+
            '<option value="sudden_charge">Sudden Charge</option>'
        );

        $('#skill_list').append('<b>Barbarian</b><br>');
        $('#skill_list').append('Athletics<br>');
        $('#skill_list').append('Perception<br>');
        $('#skill_list').append('Additional Skills (Int Mod)<br>');

    }
    function selectBard()
    {
        addTo('charisma');
        addTo('charisma');
        $('#class_specialisation_name').html("Muses");
        $('#character_class_specialisation').empty().append('' +
            '<option value="enigma">Enigma</option>'+
            '<option value="maestro">Maestro</option>'+
            '<option value="polymath">Polymath</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="bardic_lore">Bardic Lore</option>'+
            '<option value="lingering_composition">Lingering Composition</option>'+
            '<option value="reach_spell">Reach Spell</option>'+
            '<option value="versatile_performance">Versatile Performance</option>'
        );
    }
    function selectChampion()
    {
        addTo('strength');
        addTo('strength');
        $('#right_extra').html('<label>Key Ability Score</label>'+
            '<select class="full-width-element" id="chosen_attribute">'+
            '<option value="Strenght">Strength</option>'+
            '<option value="Dexterity">Dexterity</option>'+
            '</select>'+
            'Choose between strength and dexterity'
        );
        standardField_class = "strength";
        $('#class_specialisation_name').html("Cause");
        $('#character_class_specialisation').empty().append('' +
            '<option value="paladin">Paladin (Lawfull good)</option>'+
            '<option value="redeemer">Redeemer (Neutral good)</option>'+
            '<option value="liberator">Liberator (chaotic good)</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="deitys_domain">Deity\'s Domain</option>'+
            '<option value="ranged_reprisal">Ranged Reprisal</option>'+
            '<option value="unimpeded_step">Unimpeded Step</option>'+
            '<option value="weigth_of_guilt">Weight of Guilt</option>'
        );
    }
    function selectCleric()
    {
        addTo('wisdom');
        addTo('wisdom');
        $('#class_specialisation_name').html("Doctrine");
        $('#character_class_specialisation').empty().append('' +
            '<option value="cloistered_cleric">Cloistered Cleric</option>'+
            '<option value="warpriest">Warpriest</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="deadly_simplicity">Deadly Simplicity</option>'+
            '<option value="domain_initiate">Domain Initiate</option>'+
            '<option value="harming_hands">Harming Hands</option>'+
            '<option value="healing_hands">Healing Hands</option>'+
            '<option value="holy_castigation">Holy Castigation</option>'+
            '<option value="reach_spell">Reach Spell</option>'
        );
    }
    function selectDruid()
    {
        addTo('wisdom');
        addTo('wisdom');
        $('#class_specialisation_name').html("Druidic Order");
        $('#character_class_specialisation').empty().append('' +
            '<option value="animal">Animal</option>'+
            '<option value="leaf">Leaf</option>'+
            '<option value="storm">Storm</option>'+
            '<option value="wild">Wild</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="animal_companion">Animal Companion</option>'+
            '<option value="leshy_familiar">Leshy Familiar</option>'+
            '<option value="reach_spell">Reach Spell</option>'+
            '<option value="storm_born">Storm Born</option>'+
            '<option value="widen_spell">Widen Spell</option>'+
            '<option value="wild_shape">Wild Shape</option>'
        );
    }
    function selectFighter()
    {
        addTo('strength');
        addTo('strength');
        $('#right_extra').html('<label>Key Ability Score</label>'+
            '<select class="full-width-element" id="chosen_attribute">'+
            '<option value="Strenght">Strength</option>'+
            '<option value="Dexterity">Dexterity</option>'+
            '</select>'+
            'Choose between strength and dexterity'
        );
        standardField_class = "strength";
        $('#class_specialisation_name').html("No specialisation");
        $('#character_class_specialisation').empty().append('' +
            '<option value="none">-----</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="double_slice">Double Slice</option>'+
            '<option value="exacting_strike">Exacting Strike</option>'+
            '<option value="point-blank_shot">Point-Blank Shot</option>'+
            '<option value="power_attack">Power Attack</option>'+
            '<option value="reactive_shield">Reactive Shield</option>'+
            '<option value="snagging_strike">Snagging Strike</option>'+
            '<option value="sudden_charge">Sudden Charge</option>'
        );
    }
    function selectMonk()
    {
        addTo('strength');
        addTo('strength');
        $('#right_extra').html('<label>Key Ability Score</label>'+
            '<select class="full-width-element" id="chosen_attribute">'+
            '<option value="Strenght">Strength</option>'+
            '<option value="Dexterity">Dexterity</option>'+
            '</select>'+
            'Choose between strength and dexterity'
        );
        standardField_class = "strength";
        $('#class_specialisation_name').html("No specialisation");
        $('#character_class_specialisation').empty().append('' +
            '<option value="none">-----</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="crane_stance">Crane Stance</option>'+
            '<option value="dragon_stance">Dragon Stance</option>'+
            '<option value="ki_rush">KI Rush</option>'+
            '<option value="ki_strike">KI Strike</option>'+
            '<option value="monastic_weaponry">Monastic Weaponry</option>'+
            '<option value="mountain_stance">Mountain Stance</option>'+
            '<option value="tiger_stance">Tiger Stance</option>'+
            '<option value="wolf_stance">Wolf Stance</option>'
        );
    }
    function selectRanger()
    {
        addTo('strength');
        addTo('strength');
        $('#right_extra').html('<label>Key Ability Score</label>'+
            '<select class="full-width-element" id="chosen_attribute">'+
                '<option value="Strenght">Strength</option>'+
                '<option value="Dexterity">Dexterity</option>'+
            '</select>'+
            'Choose between strength and dexterity'
        );
        standardField_class = "strength";
        $('#class_specialisation_name').html("No specialisation");
        $('#character_class_specialisation').empty().append('' +
            '<option value="none">-----</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="animal_companion">Animal Companion</option>'+
            '<option value="crossbow_ace">Crossbow Ace</option>'+
            '<option value="hunted_shot">Hunted Shot</option>'+
            '<option value="monster_hunter">Monster Hunter</option>'+
            '<option value="twin_takedown">Twin Takedown</option>'
        );
    }
    function selectRogue()
    {
        addTo('dexterity');
        addTo('dexterity');
        $('#right_extra').html('<label>Key Ability Score</label>'+
            '<select id="chosen_attribute">'+
                '<option value="Strenght">Strength</option>'+
                '<option value="Dexterity" selected>Dexterity</option>'+
                '<option value="Constitution">Constitution</option>'+
                '<option value="Intelligence">Intelligence</option>'+
                '<option value="Wisdom">Wisdom</option>'+
                '<option value="Charisma">Charisma</option>'+
            '</select>'+
            'Can Choose any ability Score'
        );
        standardField_class = "dexterity";
        $('#class_specialisation_name').html("Rogue's Racket");
        $('#character_class_specialisation').empty().append('' +
            '<option value="ruffian">Ruffian</option>'+
            '<option value="scoundrel">Scoundrel</option>'+
            '<option value="thief">Thief</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="nimble_dodge">Nimble Dodge</option>'+
            '<option value="trap_finder">Trap Finder</option>'+
            '<option value="twin_feint">Twin Feint</option>'+
            '<option value="youre_next">You\'re Next</option>'
        );
    }
    function selectSorcerer()
    {
        addTo('charisma');
        addTo('charisma');
        $('#class_specialisation_name').html("Bloodline");
        $('#right_extra').html('Spell list [ occult ]');
        $('#character_class_specialisation').empty().append('' +
            '<option value="abberant">Abberant</option>'+
            '<option value="angelic">Angelic</option>'+
            '<option value="demonic">Demonic</option>'+
            '<option value="diabolic">Diabolic</option>'+
            '<option value="draconic">Draconic</option>'+
            '<option value="elemental">Elemental</option>'+
            '<option value="fey">Fey</option>'+
            '<option value="hag">Hag</option>'+
            '<option value="imperial">Imperial</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="counterspell">Counterspell</option>'+
            '<option value="dangerous_sorcery">Dangerous Sorcery</option>'+
            '<option value="familiar">Familiar</option>'+
            '<option value="reach_spell">Reach Spell</option>'+
            '<option value="widen_spell">Widen Spell</option>'
        );
    }
    function selectWizard()
    {
        addTo('intelligence');
        addTo('intelligence');
        $('#class_specialisation_name').html("School");
        $('#character_class_specialisation').empty().append('' +
            '<option value="universal_school">Universal School</option>'+
            '<option value="abjuration_school">Abjuration School</option>'+
            '<option value="conjuration_school">conjuration School</option>'+
            '<option value="divination_school">Divination School</option>'+
            '<option value="enchantment_school">Enchantment School</option>'+
            '<option value="evocation_school">Evocation School</option>'+
            '<option value="illusion_school">Illusion School</option>'+
            '<option value="necromancy_school">Necromancy School</option>'+
            '<option value="transmutation_school">Transmutation School</option>'
        );
        $('#character_class_feats').empty().append('' +
            '<option value="counterspell">Counterspell</option>'+
            '<option value="eschew_materials">Eschew Materials</option>'+
            '<option value="familiar">Familiar</option>'+
            '<option value="hand_of_the_apprentice">Hand of the Apprentice</option>'+
            '<option value="enhanced_familiar">Enhanced Familiar</option>'+
            '<option value="reach_spell">Reach Spell</option>'+
            '<option value="widen_spell">Widen Spell</option>'
        );

        $('#right_extra').html('Arcane Thesis<br>' +
            '<select id="wizard_arcane_thesis">' +
                '<option value="improved_familiar_attunement">Improved Familiar Attunement</option>'+
                '<option value="metamagical_experimentation">Metamagical Experimentation</option>'+
                '<option value="spell_blending">Spell Blending</option>'+
                '<option value="spell substitution">Spell Substitution</option>'+
            '</select>'
        );
    }

    //###########################  END CLASS SELECTOR      ####################################

    //##########################   BEGIN BACKGROUND SELECTOR  ################################

    function selectAcolyte()
    {
        addFree();
        addTo("intelligence");

        $('#character_background_attribute').html(''+
            '<option value="intelligence">Intelligence</option>'+
            '<option value="wisdom">Wisdom</option>'
        );

        $('#skill_list').append('<b>Acolyte</b><br>');
        $('#skill_list').append('Religion<br>');
        $('#skill_list').append('Scribing Lore<br>');

        $('#feat_list').append('<b>Acolyte</b><br>');
        $('#feat_list').append('Student of the Canon<br>');
    }

    /*
            add additional skills -> inline selectors
            add function at end of initial routine
            add function to return filled select fields
            (no 2 same skills can be chosen)
     */

});




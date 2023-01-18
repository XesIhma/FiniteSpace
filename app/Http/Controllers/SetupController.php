<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ship;
use App\Models\Weapon;
use App\Models\Engine;
use App\Models\Armor;
use App\Models\Material;
use App\Models\Amunition;
use App\Models\Cargo;
use App\Models\Profile;

use App\Models\ShipType;
use App\Models\WeaponType;
use App\Models\EngineType;
use App\Models\ArmorType;
use App\Models\MaterialType;
use App\Models\AmunitionType;

use App\Models\Slot;
use App\Models\SlotType;

function generateSlotTypes($slotTypeData){
    $slotType = [];
    foreach($slotTypeData as $data){
        $slotType[] = SlotType::create([
          'name' => $data[0],
          'type' => $data[1],
          'position' => $data[2],
          'position_z' => $data[3],
          'size' => $data[4],
          'ship_type_id' => $data[5]
        ]);
    }
    return $slotType;
}



class SetupController extends Controller
{

    function createAdminsStuff(){
        $admin = findUser(userName : 'XesIhma');
        $profile = $admin->profiles[0];

        $admin->premium = 500;
        $admin->save();
        $profile->name = "Alveus";
        $profile->image = "/avatars/commander.jpg";
        $profile->money = 10000;

        $profile->save();
    
        $adminShip = Ship::where('profile_id', $profile->id)->first();
        if(!$adminShip){
            $shipType = ShipType::create([
                'name' => "Frightener",
                'type' => "korweta",
                'UAN' => generateUAN("Statki"),
                'description' => "Bardzo szybki i sprawny statek bojowy. Potrafi stawić czoła kilku jednostkom podobnej klasy jednocześnie",
                'size_x' => 10,
                'size_y' => 10,
                'size_z' => 30,
                'image' => "ships/freightener.jpg",
                'hp_max' => 4500,
                'mass' => 12400,
                'power_max' => 2500,
                'deuter_max' => 500
            ]);
            $ship = Ship::create([
                'ship_type_id' => $shipType->id,
                'deuter' => 500,
                'status' => 1,
                'hp' => 4500,
                'profile_id' => $profile->id
            ]);
            echo "Stworzono statek<br>";

            $cargoGeneral = Cargo::create([
                'volume' => 500,
                'type' => 'general',
                'unloading_time' => 10,
                'ship_id' => $ship->id
            ]);
            $cargoOre = Cargo::create([
                'volume' => 200,
                'type' => 'bulk',
                'unloading_time' => 25,
                'ship_id' => $ship->id
            ]);
            echo "Stworzono ładownie<br>";

            $slotTypeData = [
                ["Główny silnik", "engine", 1, 4, "M", $shipType->id],
                ["Działo dziobowe", "weapon", 1, 0, "M", $shipType->id],
                ["Działko kontaktowe", "weapon", 0, 1, "S", $shipType->id],
                ["Działko kontaktowe", "weapon", 2, 1, "S", $shipType->id],
                ["Działo rufowe", "weapon", 0, 3, "S", $shipType->id],
                ["Działo rufowe", "weapon", 2, 3, "S", $shipType->id],
                ["Wyrzutnia rakiet", "weapon", 1, 2, "M", $shipType->id],
                ["Luk torpedowy", "weapon", 3, 2, "M", $shipType->id],

                ["Pancerz dziobowy", "armor", 1, 0, "M", $shipType->id],
                ["Pancerz dziobowy", "armor", 3, 0, "M", $shipType->id],
                ["Pancerz główny", "armor", 0, 1, "M", $shipType->id],
                ["Pancerz główny", "armor", 1, 1, "M", $shipType->id],
                ["Pancerz główny", "armor", 2, 1, "M", $shipType->id],
                ["Pancerz główny", "armor", 3, 1, "M", $shipType->id],
                ["Pancerz główny", "armor", 3, 2, "M", $shipType->id],
                ["Pancerz główny", "armor", 2, 2, "M", $shipType->id],
                ["Pancerz główny", "armor", 1, 2, "M", $shipType->id],
                ["Pancerz główny", "armor", 0, 2, "M", $shipType->id],
                ["Pancerz główny", "armor", 0, 3, "M", $shipType->id],
                ["Pancerz główny", "armor", 1, 3, "M", $shipType->id],
                ["Pancerz główny", "armor", 2, 3, "M", $shipType->id],
                ["Pancerz główny", "armor", 3, 3, "M", $shipType->id],
                ["Pancerz rufowy", "armor", 1, 4, "M", $shipType->id],
                ["Pancerz rufowy", "armor", 3, 4, "M", $shipType->id]
            ];

            $slotTypes = generateSlotTypes($slotTypeData);

            
            $slots = new \Illuminate\Database\Eloquent\Collection;
            foreach($slotTypes as $type){
                $slots[] = Slot::create([
                    'slot_type_id' => $type->id,
                    'ship_id' => $ship->id
                ]);
            }
            echo "Stworzono sloty<br><br>";

            
            //SILNIKI
            $engineType = EngineType::create([
                'name' => "Koolaid Rocket",
                'type' => "silnik rakietowy",
                'UAN' => generateUAN("Silniki"),
                'description' => "Koncepcyjny silnik rakietowy zasilający małe jednostki bojowe",
                'image' => "engines/koolaid_engine.jpg",
                'size_x' => 1.2,
                'size_y' => 1,
                'size_z' => 3,
                'hp_max' => 300,
                'mass' => 400,
                'power_max' => 5500,
                'thrust' => 25000,
                'deuter_usage' => 500,
            ]);
            $engine = Engine::create([
                'engine_type_id' => $engineType->id,
                'status' => 1,
                'hp' => 300,
                'slot_id' => $slots[0]->id,
                'profile_id' => $profile->id
            ]);

            $engineType = EngineType::create([
                'name' => "Rocket 1",
                'type' => "silnik rakietowy",
                'UAN' => generateUAN("Silniki"),
                'description' => "Podstawowy silnik, znajduje zastosowanie na małych jednostakch transportowych",
                'image' => "engines/engine1.jpg",
                'size_x' => 1.2,
                'size_y' => 1,
                'size_z' => 3,
            ]);
            $engine = Engine::create([
                'engine_type_id' => $engineType->id,
                'status' => 0,
                'hp' => 300,
                'cargo_id' => $cargoGeneral->id,
                'profile_id' => $profile->id
            ]);
            echo "Stworzono silniki<br>";


            //BRONIE
            $weaponType = WeaponType::create([
                'name' => "LaserBeam Origin",
                'type' => "działo laserowe",
                'UAN' => generateUAN("Bronie"),
                'description' => "Wydajna i prosta broń. Zużywa dużo mocy, ale zadaje odpowiednio duże obrażenia",
                'image' => "weapons/laser_beam.jpg",
                'size_x' => 0.8,
                'size_y' => 1,
                'size_z' => 4.55,
                'hp_max' => 60,
                'mass' => 300,
                'power_max' => 300000,
                'damage' => 120,
            ]);
            for($i= 0; $i<3; $i++){
                $weapon = Weapon::create([
                    'weapon_type_id' => $weaponType->id,
                    'status' => 0,
                    'hp' => 60,
                    'cargo_id' => $cargoGeneral->id,
                    'profile_id' => $profile->id
                ]);
            }
            $weapon->cargo_id = null;
            $weapon->slot_id = $slots[1]->id;
            $weapon->save();

            $weaponType = WeaponType::create([
                'name' => "Minigun 2k",
                'type' => "gatling",
                'UAN' => generateUAN("Bronie"),
                'description' => "Ten karabin potrafi wystrzelić nawet 2000 pocisków na minutę i nieźle narozrabiać z osprzętem przeciwnika, chociaż raczej nie przebije pancerza",
                'image' => "weapons/minigun.jpg",
                'size_x' => 1,
                'size_y' => 1,
                'size_z' => 3.2,
                'hp_max' => 60,
                'mass' => 300,
                'power_max' => 300000,
                'damage' => 120,
                'ammo_max' => 10000
            ]);
            $j = 2;
            for($i= 0; $i<5; $i++){
                $weapon = Weapon::create([
                    'weapon_type_id' => $weaponType->id,
                    'status' => 0,
                    'hp' => 60,
                    'ammo' => 5000,
                    'slot_id' => $slots[$j]->id,
                    'profile_id' => $profile->id
                ]);
                $j++;
            }
            $weapon->cargo_id = $cargoGeneral->id;
            $weapon->slot_id = null;
            $weapon->save();

            $weaponType = WeaponType::create([
                'name' => "Rocket Launcher",
                'type' => "rocket_launcher",
                'UAN' => generateUAN("Bronie"),
                'description' => "Potężna wyrzutnia rakiet. ",
                'image' => "weapons/rocket_launcher.jpg",
                'size_x' => 3,
                'size_y' => 3,
                'size_z' => 3.8,
                'hp_max' => 200,
                'mass' => 800,
                'power_max' => 1200,
                'damage' => 500,
                'ammo_max' => 6
            ]);
            $weapon = Weapon::create([
                'weapon_type_id' => $weaponType->id,
                'status' => 0,
                'hp' => 200,
                'ammo' => 2,
                'slot_id' => $slots[6]->id,
                'profile_id' => $profile->id
            ]);

            $weaponType = WeaponType::create([
                'name' => "Luk torpedowy",
                'type' => "torpedo_bay",
                'UAN' => generateUAN("Bronie"),
                'description' => "Wyposażenie okrętu zdolne wysyłać potężne głowice w kierunku nieprzyjaciela",
                'image' => "weapons/torpedo.jpg",
                'size_x' => 6,
                'size_y' => 12.2,
                'size_z' => 4.5,
                'hp_max' => 500,
                'mass' => 1500,
                'power_max' => 3000,
                'damage' => 2500,
                'ammo_max' => 4
            ]);
            $weapon = Weapon::create([
                'weapon_type_id' => $weaponType->id,
                'status' => 0,
                'hp' => 200,
                'ammo' => 2,
                'slot_id' => $slots[7]->id,
                'profile_id' => $profile->id
            ]);

            echo "Stworzono bronie<br>";
            

            //PANCERZE
            $armorType = ArmorType::create([
                'name' => "Pancerz stalowy",
                'type' => "pancerz jednorodny",
                'UAN' => generateUAN("Pancerze"),
                'description' => "pancerz trochę mocniejszy niż żelazny",
                'image' => "armors/steel.jpg",
                'size_x' => 3,
                'size_y' => 3,
                'size_z' => 0.2,
                'hp_max' => 70,
                'mass' => 45,
                'resistance' => 20
            ]);
            for($i= 8; $i<24; $i++){
                $armor = Armor::create([
                    'armor_type_id' => $armorType->id,
                    'status' => 1,
                    'hp' => 70,
                    'slot_id' => $slots[$i]->id,
                    'profile_id' => $profile->id
                ]);
            }

            $armorType = ArmorType::create([
                'name' => "Pancerz żelazny",
                'type' => "pancerz jednorodny",
                'UAN' => generateUAN("Pancerze"),
                'description' => "pancerz trochę mocniejszy niż żelazny",
                'image' => "armors/iron.jpg",
                'size_x' => 3,
                'size_y' => 3,
                'size_z' => 0.2,
                'hp_max' => 50,
                'mass' => 55,
                'resistance' => 10
            ]);
            for($i= 0; $i<12; $i++){
                $armor = Armor::create([
                    'armor_type_id' => $armorType->id,
                    'status' => 1,
                    'hp' => 50,
                    'cargo_id' => $cargoGeneral->id,
                    'profile_id' => $profile->id
                ]);
            }
            echo "Stworzono pancerze<br>";


            //MATERIAŁY
            $materialType = MaterialType::create([
                'name' => "Ruda żelaza",
                'image' => "materials/iron_ore.jpg"
            ]);
            $ore = Material::create([
                'material_type_id' => $materialType->id,
                'count' => "100",
                'cargo_id' => $cargoOre->id,
                'profile_id' => $profile->id
            ]);
            $ore = Material::create([
                'material_type_id' => $materialType->id,
                'count' => "20",
                'cargo_id' => $cargoOre->id,
                'profile_id' => $profile->id
            ]);
            $materialType = MaterialType::create([
                'name' => "Ruda tytanu",
                'image' => "materials/titan_ore.jpg",
            ]);
            $ore = Material::create([
                'material_type_id' => $materialType->id,
                'count' => "60",
                'cargo_id' => $cargoOre->id,
                'profile_id' => $profile->id
            ]);
            echo "Stworzono rudę<br>";
        }

        //DRUGI STATEK
        $shipType = ShipType::create([
            'name' => "Rouge",
            'type' => "lekki myśliwiec",
            'UAN' => generateUAN("Statki"),
            'description' => "Podstawowy statek bojowy, prostej konstrukcji. Ma niewielką siłę ognia i opancerzenie, ale czego więcej potrzeba na początek.",
            'size_x' => 4,
            'size_y' => 2.5,
            'size_z' => 12,
            'image' => "ships/fighter.jpg",
            'hp_max' => 900,
            'mass' => 15000,
            'power_max' => 500,
            'deuter_max' => 200
        ]);
        $ship = Ship::create([
            'ship_type_id' => $shipType->id,
            'deuter' => 200,
            'status' => 0,
            'hp' => 900,
            'profile_id' => $profile->id,
            'cargo_id' => $cargoGeneral->id
        ]);
        echo "Stworzono drugi statek<br>";

        $cargoGeneral = Cargo::create([
            'volume' => 150,
            'type' => 'general',
            'unloading_time' => 20,
            'ship_id' => $ship->id
        ]);
        echo "Stworzono ładownię<br>";

        $slotTypeData = [
            ["Główny silnik", "engine", 1, 2, "S", $shipType->id],
            ["Działo dziobowe", "weapon", 1, 0, "M", $shipType->id],
            ["Działko lewe", "weapon", 0, 1, "S", $shipType->id],
            ["Działko prawe", "weapon", 2, 1, "S", $shipType->id],

            ["Pancerz dziobowy", "armor", 1, 0, "M", $shipType->id],
            ["Pancerz dziobowy", "armor", 3, 0, "M", $shipType->id],
            ["Pancerz główny", "armor", 0, 1, "M", $shipType->id],
            ["Pancerz główny", "armor", 1, 1, "M", $shipType->id],
            ["Pancerz główny", "armor", 2, 1, "M", $shipType->id],
            ["Pancerz główny", "armor", 3, 1, "M", $shipType->id],
            ["Pancerz rufowy", "armor", 3, 2, "M", $shipType->id]
        ];

        $slotTypes = generateSlotTypes($slotTypeData);

        
        $slots = new \Illuminate\Database\Eloquent\Collection;
        foreach($slotTypes as $type){
            $slots[] = Slot::create([
                'slot_type_id' => $type->id,
                'ship_id' => $ship->id
            ]);
        }
        //Stworzono sloty


        //STACJA HANDLOWA
        $ahmar = ShipType::where('name', 'Ahmar')->first();
        if(!$ahmar){
            $shipType = ShipType::create([
                'name' => "Ahmar",
                'type' => "stacja handlowa",
                'UAN' => generateUAN("Statki"),
                'description' => "Wielka stacja handlowa, wyposarzona w kilka doków kosmicznych i wielką przestrzeń magazynową. ",
                'size_x' => 500,
                'size_y' => 500,
                'size_z' => 130,
                'image' => "ships/trade_station.jpg",
                'hp_max' => 150000,
                'mass' => 10000000,
            ]);
            $ship = Ship::create([
                'ship_type_id' => $shipType->id,
                'hp' => 150000,
                'status' => 1,
                'profile_id' => $profile->id
            ]);
            echo "Stworzono stację Ahmar<br>";

            $cargoGeneral = Cargo::create([
                'volume' => 10000,
                'type' => 'general',
                'unloading_time' => 10,
                'ship_id' => $ship->id
            ]);
            $cargoOre = Cargo::create([
                'volume' => 20000,
                'type' => 'bulk',
                'unloading_time' => 25,
                'ship_id' => $ship->id
            ]);
            $cargoFuel = Cargo::create([
                'volume' => 5000,
                'type' => 'tank',
                'unloading_time' => 30,
                'ship_id' => $ship->id
            ]);
            $cargoHangar = Cargo::create([
                'volume' => 25000,
                'type' => 'hangar',
                'unloading_time' => 60,
                'ship_id' => $ship->id
            ]);
            echo "Stworzono ładownie<br>";
        }

    }

    function testStuff(){
        $UAN = generateUAN("Pancerze");
        dump($UAN);
    }

    function shipType(){
        $types = Armor::find(1);
        dump($types);
        echo $types->armorType->name;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ship;
use App\Models\Weapon;
use App\Models\Engine;
use App\Models\Armor;
use App\Models\Material;
use App\Models\Cargo;
use App\Models\Profile;

class SetupController extends Controller
{
    function createFirstMarketplace(){
        $admin = findUser(userName : 'XesIhma');
        $profile = Profile::where('user_id', $admin->id)->first();
        $ahmar = Ship::where('name', 'Ahmar')->first();
        if(!$ahmar){
            $ship = Ship::create([
                'name' => "Ahmar",
                'type' => "stacja handlowa",
                'UAN' => generateUAN("Statki"),
                'description' => "Wielka stacja handlowa, wyposarzona w kilka doków kosmicznych i wielką przestrzeń magazynową. ",
                'size' => "500m x 500m x 130m",
                'image' => "ships/trade_station.jpg",
                'status' => 1,
                'hp' => 150000,
                'hp_max' => 15000,
                'mass' => 10000000,
                'profile_id' => $profile->id
            ]);
            echo "Stworzono stację";
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
            echo "Stworzono ładownie";
        }
        

    
    }

    function createAdminsStuff(){
        $admin = findUser(userName : 'XesIhma');
        $profile = Profile::where('user_id', $admin->id)->first();
        $adminShip = Ship::where('profile_id', $profile->id)->first();
        if(!$adminShip){
            $ship = Ship::create([
                'name' => "Frightener",
                'type' => "myśliwiec",
                'UAN' => generateUAN("Statki"),
                'description' => "Bardzo szybki i sprawny statek bojowy. Potrafi stawić czoła kilku jednostkom podobnej klasy jednocześnie",
                'size' => "35m x 12m x 10m",
                'image' => "ships/freightener.jpg",
                'status' => 1,
                'hp' => 4500,
                'hp_max' => 4500,
                'mass' => 12400,
                'power_max' => 2500,
                'deuter' => 500,
                'deuter_max' => 500,
                'weapon_slots' => 8,
                'engine_slots' => 1,
                'armor_slots' => 24,
                'profile_id' => $profile->id
            ]);
            echo "Stworzono statek";

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
            echo "Stworzono ładownię";

            $engine = Engine::create([
                'name' => "Koolaid Rocket",
                'type' => "silnik rakietowy",
                'UAN' => generateUAN("Silniki"),
                'description' => "Koncepcyjny silnik rakietowy zasilający małe jednostki bojowe",
                'size' => "2m x 1m x 1m",
                'image' => "engines/koolaid_engine.jpg",
                'status' => 1,
                'hp' => 300,
                'hp_max' => 300,
                'mass' => 400,
                'power_max' => 5500,
                'thrust_max' => 25000,
                'deuter_usage_max' => 500,
                'ship_id' => $ship->id,
                'profile_id' => $profile->id
            ]);
            $engine = Engine::create([
                'name' => "Rocket 1",
                'type' => "silnik rakietowy",
                'UAN' => generateUAN("Silniki"),
                'description' => "Podstawowy silnik, znajduje zastosowanie na małych jednostakch transportowych",
                'size' => "1.5m x 1m x 1m",
                'image' => "engines/engine1.jpg",
                'status' => 0,
                'hp' => 100,
                'hp_max' => 120,
                'mass' => 300,
                'power_max' => 2500,
                'thrust_max' => 11000,
                'deuter_usage_max' => 600,
                'profile_id' => $profile->id,
                'cargo_id' => $cargoGeneral->id
            ]);
            echo "Stworzono silniki";

            $weaponUAN = generateUAN("Bronie");
            for($i= 0; $i<5; $i++){
                $weapon = Weapon::create([
                    'name' => "LaserBeam Origin",
                    'type' => "działo laserowe",
                    'UAN' => $weaponUAN,
                    'description' => "Wydajna i prosta broń. Zużywa dużo mocy, ale zadaje odpowiednio duże obrażenia",
                    'size' => "2.5m x 0.5m x 0.5m",
                    'image' => "weapons/laser_beam.jpg",
                    'status' => 0,
                    'hp' => 60,
                    'hp_max' => 60,
                    'mass' => 300,
                    'power_max' => 300000,
                    'damage' => 120,
                    'ship_id' => $ship->id,
                    'profile_id' => $profile->id
                ]);
            }
            $weapon->ship_id = null;
            $weapon->cargo_id = $cargoGeneral->id;
            $weapon->save();

            $weaponUAN = generateUAN("Bronie");
            for($i= 0; $i<2; $i++){
                $weapon = Weapon::create([
                    'name' => "Minigun 2k",
                    'type' => "gatling",
                    'UAN' => $weaponUAN,
                    'description' => "Ten karabin potrafi wystrzelić nawet 2000 pocisków na minutę i nieźle narozrabiać z osprzętem przeciwnika, chociaż raczej nie przebije pancerza",
                    'size' => "2.5m x 0.5m x 0.5m",
                    'image' => "weapons/laser_beam.jpg",
                    'status' => 0,
                    'hp' => 60,
                    'hp_max' => 60,
                    'mass' => 300,
                    'power_max' => 300000,
                    'damage' => 120,
                    'ship_id' => $ship->id,
                    'profile_id' => $profile->id
                ]);
            }
            echo "Stworzono bronie";
            
            $armorUAN = generateUAN("Pancerze");
            for($i= 0; $i<24; $i++){
                $armor = Armor::create([
                    'name' => "Pancerz stalowy",
                    'type' => "pancerz jednorodny",
                    'UAN' => $armorUAN,
                    'description' => "pancerz trochę mocniejszy niż żelazny",
                    'size' => "2m x 2m",
                    'image' => "armors/steel.jpg",
                    'status' => 1,
                    'hp' => 70,
                    'hp_max' => 70,
                    'mass' => 45,
                    'resistance' => 20,
                    'ship_id' => $ship->id,
                    'profile_id' => $profile->id
                ]);
            }
            $armorUAN = generateUAN("Pancerze");
            for($i= 0; $i<12; $i++){
                $armor = Armor::create([
                    'name' => "Pancerz żelazny",
                    'type' => "pancerz jednorodny",
                    'UAN' => $armorUAN,
                    'description' => "podstawowy rodzaj opancerzenia",
                    'size' => "2m x 2m",
                    'image' => "armors/iron.jpg",
                    'status' => 1,
                    'hp' => 50,
                    'hp_max' => 50,
                    'mass' => 55,
                    'resistance' => 10,
                    'cargo_id' => $cargoGeneral->id,
                    'profile_id' => $profile->id
                ]);
            }
            echo "Stworzono pancerze";

            $ore = Material::create([
                'name' => "Ruda żelaza",
                'image' => "materials/iron_ore.jpg",
                'count' => "100",
                'cargo_id' => $cargoOre->id,
                'profile_id' => $profile->id
            ]);
            $ore = Material::create([
                'name' => "Ruda żelaza",
                'image' => "materials/iron_ore.jpg",
                'count' => "20",
                'cargo_id' => $cargoOre->id,
                'profile_id' => $profile->id
            ]);
            $ore = Material::create([
                'name' => "Ruda tytanu",
                'image' => "materials/titan_ore.jpg",
                'count' => "60",
                'cargo_id' => $cargoOre->id,
                'profile_id' => $profile->id
            ]);
            echo "Stworzono rudę";
        }

    }

    function testStuff(){
        $UAN = generateUAN("Pancerze");
        dump($UAN);
    }
}

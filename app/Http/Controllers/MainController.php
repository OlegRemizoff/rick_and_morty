<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use App\Models\Characters;
use App\Models\Episodes;
use App\Models\Locations;


class MainController extends Controller
{
    public function index()
    {

        $characters = Characters::take(5)->get() ?? [];
        $total = Characters::get()->count() ?? 0;
        return view('index', compact('characters', 'total'));


    }


    // Заполнение базы данных
    public function fillTheDatabase() 
    {

        // Получение данных из API       https://rickandmortyapi.com/documentation/
        function getAllCharacters() 
        {
            // Колличество страниц
            $get_pages_count = json_decode(file_get_contents('https://rickandmortyapi.com/api/character'), true);
            $pages = $get_pages_count['info']['pages'];
        
            // Сюда будем добавлять персонажей 
            $all_characters = [];
        
            // Запускаем цикл с изменением страниц, 
            for ($page = 1; $page <= $pages; $page++) {
                $url = "https://rickandmortyapi.com/api/character?page=$page";
                $json = file_get_contents($url);
                $data = json_decode($json, true);
            
                if (isset($data['results'])) {
                    $all_characters = array_merge($all_characters, $data['results']);
                }
            }
        
            return $all_characters;
        }

        function getAllEpisodes() 
        {
            $get_pages_count = json_decode(file_get_contents('https://rickandmortyapi.com/api/episode'), true);
            $pages = $get_pages_count['info']['pages'];

            $episodes = [];

            for ($page =  1; $page <=  $pages; $page++) {
                $url = "https://rickandmortyapi.com/api/episode?page=$page";
                $json = file_get_contents($url);
                $data = json_decode($json, true);
            
                if (isset($data['results'])) {
                    $episodes =  array_merge($episodes, $data['results']);
                }    
            }

            return $episodes;
        }

        function getAllLocations () 
        {
            $get_pages_count =  json_decode(file_get_contents('https://rickandmortyapi.com/api/location'), true);
            $pages = $get_pages_count['info']['pages'];
    
            $location = [];
    
            for ($page = 1; $page <= $pages; $page++) {
                $url = "https://rickandmortyapi.com/api/location?page=$page";
                $json = file_get_contents($url);
                $data = json_decode($json, true);
            
                if (isset($data['results'])) {
                    $location = array_merge($location, $data['results']);
                }    
            }
            return $location;
        }
        
        // Логика заполнение таблиц 
        function insertCharacters($characters)
        {
            $charactersData = [];
            
            foreach ($characters as $character) {
                $charactersData[] = [
                    'id' => $character['id'],
                    'name' => $character['name'],
                    'status' => $character['status'],
                    'species' => $character['species'],
                    'type' => $character['type'] ?? '',
                    'gender' => $character['gender'],
                    'image' => $character['image'],
                    'url' => $character['url'],
                    'created' => $character['created'],
                ];

                // Заполнение таблицы character_episode | many-to-many
                // Тут проходимся по массиву episode: [0] => https://rickandmortyapi.com/api/episode/6,
                // заберем id каждого. Затем преобразуем в int и добавим в БД.
                try {
                    foreach ($character['episode'] as $ch) {
                        $tmp = (explode('/', $ch));
                        $episode_id = (int)end($tmp);
                        DB::table('character_episode')->insert([
                            'character_id' => $character['id'],
                            'episode_id' => $episode_id,
                        ]);
                    } 
                } catch (\Exception $e) {
                    echo "Ошибка при заполнении character_episode_table: " . $e->getMessage() . "<br>";
                }
            }
                    
            $chunks = array_chunk($charactersData, 100);

            foreach ($chunks as $chunk) {
                try {
                    Characters::insert($chunk);
                } catch (\Exception $e) {
                    echo "Ошибка при вставке персонажей: " . $e->getMessage() . "<br>";
                }
                
            }

        }

        function insertLocations($locations)
        {
            $locationData = [];
    
            foreach ($locations as $location) {
                $locationData[] = [
                    'id' => $location['id'],
                    'name' => $location['name'],
                    'type' => $location['type'],
                    'dimension' => $location['dimension'],
                    'url' => $location['url'],
                    'created' => $location['created'],
                ];
            }
    
            try {
                Locations::insert($locationData);
            } catch (\Exception $e) {
                echo "Ошибка при вставке локации: " . $e->getMessage() . "<br>";
            } 
        }
    
        function insertEpisodes($episodes)
        {
            $episodeData = [];

            foreach ($episodes as $episode) {
                $episodeData[] = [
                    'id' => $episode['id'],
                    'name' => $episode['name'],
                    'air_date' => $episode['air_date'],
                    'episode' => $episode['episode'],
                    'url' => $episode['url'],
                    'created' => $episode['created'],
                ];
            }

            try {
                Episodes::insert($episodeData);
            } catch (\Exception $e) {
                echo "Ошибка при вставке персонажей: " . $e->getMessage() . "<br>";
            }
            
            

        }

        // Вставка данных
        $characters = getAllCharacters();
        $episodes = getAllEpisodes();
        $locations = getAllLocations();


        insertCharacters($characters);
        insertLocations($locations);
        insertEpisodes($episodes);

        return redirect()->route('home');

    }
  
}


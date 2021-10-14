<?PHP
    class db{
        # nom du fichier csv a explorer
        private string $csv = 'i_have_brain_damage.csv';

        function __construct()
        {
        }

        # fonction permettant de lire le csv et récupéré ses data
        function read($csv){
            $file = fopen($csv, 'r');
            while (!feof($file) ) {
                $line[] = fgetcsv($file, 32768);
            }
            fclose($file);
            return $line;
        }

        # permet de récupéré les 10 dernieres lignes du csv et de le transformer en objet "song"
        function get10Last(){
            // Définir le chemin d'accès au fichier CSV
            $csv = $this->read($this->csv);
            $csv = array_slice($csv, -10, 10);
            $songs = [];
            foreach ($csv as $song){
                array_push($songs, new song($song[0], $song[1],$song[2],$song[3],$song[4],$song[5],$song[6],$song[7],$song[8],$song[9]));
            }
            return $songs;
        }

        # permet de récupéré tout le contenue du csv et de le transformer en objet "song"
        function getAll(){
            // Définir le chemin d'accès au fichier CSV
            $csv = $this->read($this->csv);
            $songs = [];
            foreach ($csv as $song){
                array_push($songs, new song($song[0], $song[1],$song[2],$song[3],$song[4],$song[5],$song[6],$song[7],$song[8],$song[9]));
            }
            return $songs;
        }
    }

    # classe représentant une chanson
    class song{
        function __construct(private int $annid, private string $animetitle, private string $animeenglishtitle, private string $songname, private string $artist, private string $songtype, private string $length, private string $difficulty, private string $webm, private string $mp3)
        {
            $this->annid = $annid;
            $this->animetitle = $animetitle;

            # si l'anime n'a pas de titre anglais, utiliser son titre original
            if ($animeenglishtitle != ""){
                $this->animeenglishtitle = $animeenglishtitle;
            } else {
                $this->animeenglishtitle = $animetitle;
            }

            $this->songname = $songname;
            $this->artist = $artist;
            $this->songtype = $songtype;
            $this->length = $length;
            $this->difficulty = $difficulty;
            $this->webm = $webm;
            $this->mp3 = $mp3;
        }

        function getAnnid(){
            return $this->annid;
        }
        function getAnimetitle(){
            return $this->animetitle;
        }
        function getAnimeenglishtitle(){
            return $this->animeenglishtitle;
        }
        function getSongname(){
            return $this->songname;
        }
        function getArtist(){
            return $this->artist;
        }
        function getSongtype(){
            return $this->songtype;
        }
        function getLength(){
            return $this->length;
        }
        function getDifficulty(){
            return $this->difficulty;
        }
        function getWebm(){
            return $this->webm;
        }
        function getMp3(){
            return $this->mp3;
        }
    }
?>
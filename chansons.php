<?PHP
    class db{
        protected string $csv = 'i_have_brain_damage.csv';

        function __construct()
        {
        }

        function read($csv){
            $file = fopen($csv, 'r');
            while (!feof($file) ) {
                $line[] = fgetcsv($file, 32768);
            }
            fclose($file);
            return $line;
        }

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

    class song{
        private int $annid;
        private string $animetitle;
        private string $animeenglishtitle;
        private string $songname;
        private string $artist;
        private string $songtype;
        private string $length;
        private string $difficulty;
        private string $webm;
        private string $mp3;

        function __construct(int $annid, string $animetitle, string $animeenglishtitle, string $songname, string $artist, string $songtype, string $length, string $difficulty, string $webm, string $mp3)
        {
            $this->annid = $annid;
            $this->animetitle = $animetitle;
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
<?PHP
include ('chansons.php');

$db = new db();

echo "<a class='nav-link' href='/index.php'>Les 10 dernieres chansons <span class='sr-only'>(current)</span></a></br>";
echo "<a class='nav-link' href='/index2.php'>Toute les chansons</a>";

$songs = $db->get10Last();

echo '<table>';
echo '<tr>';
echo '<th>Annid</th>';
echo '<th>Anime Title</th>';
echo '<th>Anime English Title</th>';
echo '<th>Song Name</th>';
echo '<th>Artist</th>';
echo '<th>Song Type</th>';
echo '<th>Length</th>';
echo '<th>Difficulty</th>';
echo '<th>webm</th>';
echo '<th>mp3</th>';
echo '</tr>';

$songs = match ($songs) {
    0 => false,
    default => $songs,
};

if($songs) {
    foreach ($songs as $song){
        echo '<tr>';
            echo '<td>';
            echo '<a href=https://www.animenewsnetwork.com/encyclopedia/anime.php?id='.$song->getAnnid().'>'.$song->getAnnid().'</a>';
            echo '</td>';
            echo '<td>';
            echo $song->getAnimetitle();
            echo '</td>';
            echo '<td>';
            echo $song->getAnimeenglishtitle();
            echo '</td>';
            echo '<td>';
            echo $song->getSongname();
            echo '</td>';
            echo '<td>';
            echo $song->getArtist();
            echo '</td>';
            echo '<td>';
            echo $song->getSongtype();
            echo '</td>';
            echo '<td>';
            echo $song->getLength();
            echo '</td>';
            echo '<td>';
            echo $song->getDifficulty();
            echo '</td>';
            echo '<td>';
            echo '<a href="'.$song->getWebm().'">'.$song->getWebm().'</a>';
            echo '</td>';
            echo '<td>';
            echo '<a href="'.$song->getMp3().'">'.$song->getMp3().'</a>';
            echo '</td>';
        echo '</tr>';
    }
} else {
    echo '<tr>';
    echo "<th>their is no songs in the database</th>";
    echo '</tr>';
}

echo '</table>';
?>
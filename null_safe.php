<?php

# n'ayant pas réussis a trouver un moyen de l'intégré dans mon projet, voici un exemple d'utilisation du null safe

$annid = $song?->getAnnid()
# cette ligne ne va fonctionner que si l'annid de la chanson est set

?>
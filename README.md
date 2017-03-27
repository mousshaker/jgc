# [JGC]
Jeu de gages

C'est un projet permettant de choisir aléatoirement un gage (résultat) parmi des listes prédéfinies.<br>
Cette application est responsive, elle s'adapte au format mobile.<br>
Aucun besoin de BDD, les quelques données utilisées sont enregistrées dans les fichiers .log de /data.

<h2> Prérequis </h2>
Avoir un serveur hébergeur ou bien un hôte virtuel local (auquel cas l'application ne sera pas accessible via smartphone, en toute logique).<br>
Savoir lire un minimum le HTML et éventuellement un peu le PHP si vous souhaiter personnaliser (pour pouvoir remplacer quelques données dans certains fichier de config, au besoin).

<h2> Installation </h2>
Copiez tout simplement tel quel l'ensemble des fichiers du dépôt dans votre racine serveur/localhost.
Le fichier "process" ainsi que les schémas et le présent fichier README.dm peuvent rester en local pour simple information.

<h2>Outils de l'application </h2><ul>
<li>- 4 listes (pour 4 niveaux d'intensité de gages)</li>
<li>- 1 liste "medley" reprenant un pot-pourri des 4 listes</li>
<li>- 1 version "supplice" (basée sur un matrice de gages : un tableau avec 10 niveaux de gages et 5 variantes par niveau)</li>
<li>- 1 version illustrée (les gages sont des images illustrées au lieu de descriptifs en phrases)</li>
<li>- 1 version "online" avec 3 listes de gages spécifiques pour les jeux "à distance" + une version illustrée</li>
<li>- 1 jeu de 21 (lancé de dés pour obtenir 21) afin d'obtenir des gages</li>
<li>- des logs (volontairement non accessible depuis le front. Il faut aller chercher les fichiers dans /data)</li>
<li>- 1 fichier PROCESS dévrivant le fonctionnement de l'application</li>
</ul>

<h2>Notes / infos </h2>
Attention : l'image de background est ici à titre illustratif, mais aucun droit d'utilisation n'a été cédé par l'auteur de la photo. Pensez à remplacer l'exemple par une photo dont vous avez les droits nécessaires.
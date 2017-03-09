<?php
#-> DEFINITION DES VARIABLES GLOBALES <-#
    global $dataPath;
#-> END <-#
/*
*Gages version ONLINE
*/

/*** Page 1 ***/
// SENSUEL //
$GLOBALS['liste_1'] = array(
1=>"Envoyer une photo sensuellement provocatrice du torse/poitrine (on doit deviner que la partie est nue, même si on ne le voit pas entièrement et directement)",
2=>"Envoyer à l'autre une phrase décrivant une envie sensuelle du moment",
3=>"Envoyer un enregistrement audio d'un soupir sensuel",
4=>"Envoyer une photo sensuellement provocatrice des fesses",
5=>"Envoyer une photo sensuellement provocatrice du sexe (dissimulé par une main, un tissu, ...)",
6=>"Envoyer une photo sensuellement provocatrice de votre choix (chinée sur le Net autorisée)",
7=>"Envoyer une photo sensuellement provocatrice de votre choix, mais de VOUS (où vous êtes le modèle)",
8=>"A la manière de action/vérité, répondre à une question de l'autre joueur, en toute franchise",
9=>"Avouer à l'autre 1 envie/désir non réalisé, mais que vous espérez bien mettre en pratique un jour",
10=>"Avouer à l'autre 1 envie/désir déjà réalisé, et qu'il vous délecterait de mettre en pratique avec elle/lui",
11=>"Avouer à l'autre un de vos péché-mignons que vous vous délecter d'offrir à l'autre",
12=>"Avouer à l'autre un de vos péché-mignons que vous vous délecter de recevoir de l'autre",
13=>"Décrire à l'autre une scène/acte coquin(e) que vous imagineriez bien partager avec elle/lui",
14=>"Décrire à l'autre une scène/acte HOT que vous imagineriez bien partager avec elle/lui",
15=>"Envoyer une phrase écrite provoquante et 'hot' susceptible d'émousser l'excitation de l'autre"

);

$GLOBALS['total_gage_1'] = count($GLOBALS['liste_1']);


/*** Page 2 ***/
// COQUIN //

$GLOBALS['liste_2'] = array(
1=>"Envoyer une vidéo montrant une partie intime de vous (10 sec)",
2=>"Envoyer un photo incitatrice/provocatrice d'une partie intime non dissimulée",
3=>"Envoyer un enregistrement audio d'une phrase coquine comportant 4 mots au choix de l'autre joueur",
4=>"Envoyer un enregistrement audio d'un gémissement sensuel (du genre 'hummm')",
5=>"Envoyer une photo coquine et provocatrice (d'un acte sexuel, d'une position,...) de votre choix (chinée sur le Net autorisée)",
6=>"Envoyer une photo coquine et provocatrice (par votre regard, votre expression de visage, de corps,...) de VOUS",
7=>"Envoyer une photo de votre sexe non dissimulé (sexe en main (H) / doigt dans sexe (F))",
8=>"Envoyer une vidéo de vous en train de vous mordiller/lécher les lèvres (5-10 sec)",
9=>"Faire un gage de VOTRE choix parmi les exemples illustrés online (onglet jaune)",
10=>"Faire un strip tease en cam (jusqu'à être en sous-vêtement). Vidéo envoyée acceptée",
11=>"Faire une photo en lingerie sexy (porte-jartelle, bustier, dentelle,...). Homme : boxer/calçon moulant en jouant sur l'angle et/ou la mise en scène"

);

$GLOBALS['total_gage_2'] = count($GLOBALS['liste_2']);

/*** page 3 ***/
// HOT //

$GLOBALS['liste_3'] = array(
1=>"Se caresser le sexe en cam > 15 sec (vidéo envoyée acceptée)",
2=>"Se caresser le torse/poitrine en cam > 15 sec (vidéo envoyée acceptée)",
3=>"Envoyer un enregistrement audio cru/provocant (J'ai 1 envie folle de ta queue/chatte, ...)",
4=>"Envoyer un enregistrement audio d'un râle de plaisir (simulant l'orgasme)",
5=>"Faire un gage de VOTRE choix parmi les exemples illustrés online (onglet jaune)",
6=>"Faire un gage au choix de l'autre joueur, parmi les exemples illustrés online (onglet jaune)",
7=>"Exécuter en cam une requête au choix de l'autre",
8=>"Exécuter en photo une requête au choix de l'autre",
9=>"Se provoquer un orgasme en cam sous le regard de l'autre (qui peut, à son choix, participer aussi)",
);

$GLOBALS['total_gage_3'] = count($GLOBALS['liste_3']);


/*** page 8 ***/
### MEDLEY ###

$GLOBALS['liste_8'] = array(
1=> "Prendre une photo coquine de vous dans un lieu extérieur (autre que chez soi)",
2=> "Decrire une scène coquine (hot ou sauvage ou sensuel peu importe) que vous aimeriez faire avec elle/lui dans un lieu public",
3=> "Envoyer un enregistrement audio d'une envie coquine alors que vous n'êtes pas seul(e)",
4=> "Avouer à l'autre 1 envie/désir NON réalisé, mais que vous espérez bien mettre en pratique un jour",
5=> "Avouer à l'autre 1 envie/désir DEJA réalisé en extérieur, et qu'il vous délecterait de mettre en pratique avec elle/lui",
6=> "Décrire à l'autre une scène/acte coquin(e) que vous imagineriez bien partager avec elle/lui",
7=> "Faire un gage de VOTRE choix parmi les exemples illustrés online (onglet jaune)",
8=> "A la manière de action/vérité, répondre à une question de l'autre joueur, en toute franchise",
9=> "Prendre une photo laissant apparaître clairement un sein/pectoraux, tout en étant dans un lieu publique (on doit voir tout ou partie, au moins, du mamelon",
10=>"Prendre une photo laissant apparaître votre sexe, tout en étant dans un lieu publique (tout ou partie de toison acceptée, si il y a)",
11=>"Prendre une photo/vidéo de vos lèvres et/ou regard sensuel (dans votre contexte actuel, c'est à dire au bureau, dans la rue, etc)"

);
$GLOBALS['total_gage_8'] = count($GLOBALS['liste_8']);





if(LEVEL_GAGE == null){
    define('LEVEL_GAGE', 1, true);
}
else{
    $levelGage = wLogRead($dataPath,"levelGage");
    define('LEVEL_GAGE', $levelGage, true);
}


###### GAGE ILLUSTRES ######

#on calcule la limite en fonction du nombre de fichier dans chaque dossier image
$limit_girl = countFiles(PATH_IMG.'/illustration/illu_girl_online_lvl_'.LEVEL_GAGE);
$limit_boy = countFiles(PATH_IMG.'/illustration/illu_boy_online_lvl_'.LEVEL_GAGE);


# gages filles #
for($i=0;$i<=$limit_girl;$i++){
    $GLOBALS['liste_player1'][] = PATH_IMG."/illustration/illu_girl_online_lvl_".LEVEL_GAGE."/".$i.".jpg";
}
$total_gage_SampleGirl = count($GLOBALS['liste_player1']);

# gages homme #
for($i=0;$i<=$limit_boy;$i++){
    $GLOBALS['liste_player2'][] = PATH_IMG."/illustration/illu_boy_online_lvl_".LEVEL_GAGE."/".$i.".jpg";
}
$total_gage_SampleMan = count($GLOBALS['liste_player2']);


# Définition de la limite maxi = liste la plus longue de gages
if($total_gage_SampleGirl>$total_gage_SampleMan){
    $GLOBALS['total_gage'] = $total_gage_SampleGirl-1;
}
else{
    $GLOBALS['total_gage'] = $total_gage_SampleMan-1;
}


?>


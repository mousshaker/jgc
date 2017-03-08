<?php
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





###### GAGE ILLUSTRES ######

$GLOBALS['limit_gage'] = 20;

# gages filles #
for($i=0;$i<=$GLOBALS['limit_gage'];$i++){
    $GLOBALS['liste_player1'][] = PATH_IMG."/illustration/illu_girl_online/".$i.".jpg";
}
$total_gage_SampleGirl = count($GLOBALS['liste_player1']);

# gages homme #
for($i=0;$i<=$GLOBALS['limit_gage'];$i++){
    $GLOBALS['liste_player2'][] = PATH_IMG."/illustration/illu_boy_online/".$i.".jpg";
}
$total_gage_SampleMan = count($GLOBALS['liste_player2']);

/*
$GLOBALS['liste_player2222'] = array(
1=>"http://68.media.tumblr.com/263412918d621678fdacf536b3cfb143/tumblr_nxxnbh50gQ1r60p8qo1_1280.jpg",
2=> "https://68.media.tumblr.com/4f8aa3fc3bc79b81e10d4181293941ef/tumblr_o6bhzg4VCV1unrs9bo1_1280.jpg",
3=> "https://68.media.tumblr.com/caaab02b517ea81790ce2b0a68aa1669/tumblr_mjr414GTXH1rexu8to1_1280.jpg",
4=> "https://68.media.tumblr.com/tumblr_m0fd65Tvzh1rr6lnao1_500.jpg",
5=>"https://68.media.tumblr.com/48a577553a7e5e3a47dc24eb20074380/tumblr_mjo7wjL7cH1s7u3qlo1_500.jpg",
6=>"https://68.media.tumblr.com/5830f3a1a2497089a403161b643f51b6/tumblr_neqsh8cxJV1rjpfpco1_500.jpg",
7=>"http://68.media.tumblr.com/cce1353b9b3dbffb59b82850d8120485/tumblr_oaxpsq6Ms01uwipo9o5_540.jpg",
8=>"http://68.media.tumblr.com/67ac9a06831f0dcefe6701e4798c18b9/tumblr_ogltuzxjrA1unrs9bo1_540.jpg",
9=>"http://68.media.tumblr.com/05cdb2b61ef0423984442f58af7ee8f6/tumblr_oglo0jpR8l1unrs9bo1_1280.jpg",
10=>"http://68.media.tumblr.com/774ee59227ed0a96c9287074fa9167fa/tumblr_ofbleggyFO1unrs9bo1_1280.jpg",
11=>"http://68.media.tumblr.com/f6739100906708063d7722475548731a/tumblr_og5qyjjYJL1unrs9bo1_1280.jpg",
12=>"http://68.media.tumblr.com/1701b97e6f6ceb80f539420e2a1e96fa/tumblr_ofu4hftg571unrs9bo1_500.jpg",
13=>"http://68.media.tumblr.com/572bdc2b8bbaecf72c3560fcf3bc5fc2/tumblr_ofu4h5N9wL1unrs9bo1_1280.jpg",
14=>"https://68.media.tumblr.com/8757d92dc776ce2b88094b9e5ab20634/tumblr_mttihonNTq1sq8hxqo1_500.jpg",
15=>"https://68.media.tumblr.com/43687b38d68cbd469a583afaa72c0672/tumblr_ogs4grRlek1t5v89po1_1280.jpg",
16=>"https://68.media.tumblr.com/bffd4bd8ada9fa590b64a8d4d0bfded8/tumblr_o7cx6rpLQ11vufeyuo1_1280.jpg",

);
*/

# Définition de la limite maxi = liste la plus longue de gages
if($total_gage_SampleGirl>$total_gage_SampleMan){
    $GLOBALS['total_gage'] = $total_gage_SampleGirl-1;
}
else{
    $GLOBALS['total_gage'] = $total_gage_SampleMan-1;
}


?>


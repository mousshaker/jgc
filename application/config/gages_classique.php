<?php
$dataPath = PATH_VAR;

/*
*Gages version CLASSIQUE
*/


### NIVEAU 1 ###

$GLOBALS['liste_1'] = array(
1=>"Lorem ipsum 1 dolor sit amet, consectetur adipisicing elit",
2=>"Lorem ipsum 2 dolor sit amet, consectetur adipisicing elit",
3=>"Lorem ipsum 3 dolor sit amet, consectetur adipisicing elit",
4=>"Lorem ipsum 4 dolor sit amet, consectetur adipisicing elit",
);

$GLOBALS['total_gage_1'] = count($GLOBALS['liste_1']);




### NIVEAU 2 ###

$GLOBALS['liste_2'] = array(
1=>"Lorem ipsum 1 dolor sit amet, consectetur adipisicing elit",
2=>"Lorem ipsum 2 dolor sit amet, consectetur adipisicing elit",
3=>"Lorem ipsum 3 dolor sit amet, consectetur adipisicing elit",
4=>"Lorem ipsum 4 dolor sit amet, consectetur adipisicing elit",
);

$GLOBALS['total_gage_2'] = count($GLOBALS['liste_2']);



### NIVEAU 3 ###
$GLOBALS['liste_3'] = array(
1=>"Lorem ipsum 1 dolor sit amet, consectetur adipisicing elit",
2=>"Lorem ipsum 2 dolor sit amet, consectetur adipisicing elit",
3=>"Lorem ipsum 3 dolor sit amet, consectetur adipisicing elit",
4=>"Lorem ipsum 4 dolor sit amet, consectetur adipisicing elit",
);
$GLOBALS['total_gage_3'] = count($GLOBALS['liste_3']);



### NIVEAU 4 ###
$GLOBALS['liste_6'] = array(
1=>"Lorem ipsum 1 dolor sit amet, consectetur adipisicing elit",
2=>"Lorem ipsum 2 dolor sit amet, consectetur adipisicing elit",
3=>"Lorem ipsum 3 dolor sit amet, consectetur adipisicing elit",
4=>"Lorem ipsum 4 dolor sit amet, consectetur adipisicing elit",
);
$GLOBALS['total_gage_6'] = count($GLOBALS['liste_6']);



### NIVEAU 5 ###
$GLOBALS['liste_8'] = array(
1=>"Lorem ipsum 1 dolor sit amet, consectetur adipisicing elit",
2=>"Lorem ipsum 2 dolor sit amet, consectetur adipisicing elit",
3=>"Lorem ipsum 3 dolor sit amet, consectetur adipisicing elit",
4=>"Lorem ipsum 4 dolor sit amet, consectetur adipisicing elit",
);
$GLOBALS['total_gage_8'] = count($GLOBALS['liste_8']);


/*** page 9 ***/
### ILLUSTRATIONS ###
###### GAGE ILLUSTRES ######


if(LEVEL_GAGE == null){
    define('LEVEL_GAGE', 1, true);
}
else{
    $levelGage = wLogRead($dataPath,"levelGage");
    define('LEVEL_GAGE', $levelGage, true);
}




#on calcule la limite en fonction du nombre de fichier dans chaque dossier image
$limit_girl = countFiles(PATH_IMG.'/illustration/illu_girl_classic_lvl_'.LEVEL_GAGE);
$limit_boy = countFiles(PATH_IMG.'/illustration/illu_boy_classic_lvl_'.LEVEL_GAGE);


# gages filles #
for($i=0;$i<=$limit_girl;$i++){
    $GLOBALS['liste_player1'][] = PATH_IMG."/illustration/illu_girl_classic_lvl_".LEVEL_GAGE."/".$i.".jpg";
}
$total_gage_SampleGirl = count($GLOBALS['liste_player1']);

# gages homme #
for($i=0;$i<=$limit_boy;$i++){
    $GLOBALS['liste_player2'][] = PATH_IMG."/illustration/illu_boy_classic_lvl_".LEVEL_GAGE."/".$i.".jpg";
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

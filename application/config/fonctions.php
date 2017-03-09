<?php
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set("Europe/Paris");

/*
Moussh@ker
Page fonctions.php

Contient quelques fonctions globales.

Quelques indications : (utiliser l'outil de recherche et rechercher les mentions données)

Liste des fonctions :
--------------------------
sqlquery($requete,$number)
connexionbdd()
actualiser_session()
vider_cookie()
wLog()
sRace()
--------------------------


Liste des informations/erreurs :
--------------------------
Mot de passe de session incorrect
Mot de passe de cookie incorrect
L'id de cookie est incorrect
--------------------------
*/


//***********
function pageTitle($siteTitleShort,$param){
    echo '<title>['.$siteTitleShort.'] - '.$param.'</title>';
}


function wLog($path,$param,$sMessage) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/log_".$param.".log", "a+");
            if (fputs ($fp, $sMessage.(chr(13)))) {
                    return true;
            } else {
                    return false;
            }
            fclose ($fp);
        
}

function wHistoric($path,$param,$sMessage) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/log_".$param.".log", "a+");
            if (fputs ($fp, $sMessage."\n")) {
                    return true;
            } else {
                    return false;
            }
            fclose ($fp);
        
}
function readHistoric($path,$param){
    /*Ouverture du fichier en lecture seule*/
$handle = fopen($path."/log_".$param.".log", 'r');
/*Si on a réussi à ouvrir le fichier*/
    if ($handle)
    {
        /*Tant que l'on est pas à la fin du fichier*/
        while (!feof($handle))
        {
            /*On lit la ligne courante*/
            $buffer = fgets($handle);
            /*On l'affiche*/
            echo $buffer;
        }
        /*On ferme le fichier*/
        fclose($handle);
    }
}

function wLogErase($path,$param) { // Fonction d'inscription dans la logs
  
            $fp = unlink($path."/log_".$param.".log");
            //fclose ($fp);
        
}

function wLogEraseLine($path,$param,$nbToErase){
            $fic=fopen($path."/log_".$param.".log", "r");
            $contenu = fread($fic, filesize($path."/log_".$param.".log"));

            /* On a plus besoin du pointeur */
            fclose($fic);

            $contenu = explode(PHP_EOL, $contenu);//HP_EOL contient le saut à la ligne utilisé sur le serveur (\n linux, \r\n windows ou \r Macintosh */   
            $fp = fopen ($path."/logsave/log_".$param."_".date('n-Y').".log", "a+");   
            fwrite ($fp,'<font color="red">[ '.date('d m Y - H:i:s').' - Ligne(s) effacée(s) par </font><font color="#fff">'.$_SERVER["REMOTE_ADDR"]." </font><font color='red'>]</font>\n");


            for($i=0;$i<$nbToErase;$i++)
            {
                //On ouvre un fichier de log de sauvegarde des éléments effacé, à la date du jour
                
                fwrite ($fp, $contenu[$i]."\n");// on sauvegarde la ligne qu'on va supprimer du fichier d'origine 
                unset($contenu[$i]); /* On supprime la ligne correspondant au tour de boucle dans le fichier d'origine */
            }
             /* Puis on reconstruit le tout et on l'écrit */
           $contenu = implode(PHP_EOL, $contenu);
           $ptr = fopen($path."/log_".$param.".log", "w");
           fwrite($ptr, $contenu);
           fclose ($fp);
}

function wLogSeeArchive($path,$month,$year){
    //lecture d'un fichier ligne par 
    $file=$path."/log_global_".$month."-".$year.".log";
    

    if (file_exists($file)) {
        $fic=fopen($file, "r");
        $i=1 ;//Compteur de ligne
        while(!feof($fic))
        {
        $ligne= fgets($fic,1024);
        //echo "ligne numéro ".$i." : " . $line . "<br />";
        echo $ligne.'<br>';
        $i ++;
        }
        fclose($fic) ;


    } else {
        echo "Aucune archive pour cette date";
    }
    
     
}

function wLogGlobalReadNew($path,$param){
    //lecture d'un fichier ligne par ligne
    $fic=fopen($path."/log_".$param.".log", "r");
    $i=1 ;//Compteur de ligne
    while(!feof($fic))
    {
    $ligne= fgets($fic,1024);
    //echo "ligne numéro ".$i." : " . $line . "<br />";
    echo $ligne.'<br>';
    $i ++;
    }
    fclose($fic) ; 
}



function wLogRead($path,$param) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/log_".$param.".log", "a+");// Un nouveau fichier créé chaque jour
            $ligne = fgetcsv($fp, 1024);
            fclose ($fp);

            return $ligne[0];
        
}
function wLogGlobalRead($path,$param) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/log_".$param.".log", "a+");// Un nouveau fichier créé chaque jour
            $ligne = fgetcsv($fp, 1024);
            fclose ($fp);

            return $ligne;
        
}


function wLogGlobal($path,$param,$sMessage) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/log_global.log", "a+");
            if (fwrite ($fp, date('d m Y - H:i:s').' - Log '.$param.' - [Ip '.$_SERVER["REMOTE_ADDR"].'] obtient : '.$sMessage."\n")) {
                    return true;
            } else {
                    return false;
            }
            fclose ($fp);
        
}

function wUseCountLogGlobal($path,$joueur1,$joueur2) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/log_global.log", "a+");
            if (fwrite ($fp, date('d m Y - H:i:s').' - Log COUNT - [Ip '.$_SERVER["REMOTE_ADDR"].'] <font color ="#fff">UTILISE</font> le compteur enregistré de '.$joueur1.' et '.$joueur2.''."\n")) {
                    return true;
            } else {
                    return false;
            }
            fclose ($fp);
        
}

/*function wLogAJ($sMessage) { // Fonction d'inscription dans la logs
  
            $fp = fopen ("../log_files/logAJ".date('Y F').'.log', "a+");// Un nouveau fichier créé chaque jour
            if (fwrite ($fp, date('d m Y, H:i').' '.$sMessage.(chr(13)))) {
                    return true;
            } else {
                    return false;
            }
            fclose ($fp);
        
}*/


/*** COMPTEUR ***/

function wCountAdd($path,$param,$sMessage) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/count_".$param.".log", "a+");
            if (fwrite ($fp, $sMessage.(chr(13)))) {
                    return true;
            } else {
                    return false;
            }
            fclose ($fp);
        
}
function wCountRead($path,$param) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/count_".$param.".log", "a+");// Un nouveau fichier créé chaque jour
            $ligne = fgetcsv($fp, 1024);
            fclose ($fp);

            return $ligne[0];
        
}


function wCountErase($path,$param) { // Fonction d'inscription dans la logs
  
            $fp = unlink($path."/count_".$param.".log");
            //fclose ($fp);
        
}

function wCountInLogGlobal($path,$action,$sMessage,$counter,$motif) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/log_global.log", "a+");
            if (fwrite ($fp, date('d m Y - H:i:s').' - Log COUNT - [Ip '.$_SERVER["REMOTE_ADDR"].'] <font color="yellow">'.$action.' </font>: '.$sMessage.' gage(s) au compteur de '.$counter.' <font color="grey">{'.$motif."}</font> \n")) {
                    return true;
            } else {
                    return false;
            }
            fclose ($fp);
        
}

function wCountEraseInLogGlobal($path,$action,$countJ1,$countJ2,$joueur1,$joueur2) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/log_global.log", "a+");
            if (fwrite ($fp, date('d m Y - H:i:s').' - Log COUNT - [Ip '.$_SERVER["REMOTE_ADDR"].'] <font color="red">'.$action.' </font> le compteur ! '.$joueur1.' avait <font color="#fff"><b>'.$countJ1.'</b></font> et '.$joueur2.' avait <font color="#fff"><b>'.$countJ2."</b></font>\n")) {
                    return true;
            } else {
                    return false;
            }
            fclose ($fp);
        
}


function wChangeNameInLogGlobal($path,$action,$oldName,$newName) { // Fonction d'inscription dans la logs
  
            $fp = fopen ($path."/log_global.log", "a+");
            if (fwrite ($fp, date('d m Y - H:i:s').' - Log NAME - [Ip '.$_SERVER["REMOTE_ADDR"].'] <font color="#70c3ed">'.$action.' </font>: '.$oldName.' en '.$newName." \n")) {
                    return true;
            } else {
                    return false;
            }
            fclose ($fp);
        
}

function listGage($limit,$vGage){
    for($i=0;$i<$limit;$i++){
		$number=$i+1;
		//$gage="gage".$number;
		$gages=$vGage[$number];
		echo "<font size='1px'><i>[".$number."] - ".$gages."</i></font><br>";
	}
    
    //echo "pouet";

}


function doubleListe($list1,$list2,$limit){
    for($i=1;$i<=$limit;$i++){
        echo '<tr>';
        echo '<th class="tdShowGirl">F '.$i.'</th>';
        echo '<td class="tdShow" id="'.$i.'"><img src="'.$list1[$i].'" class="illuGage"></td>';
        echo '<td class="tdShow"><img src="'.$list2[$i].'" class="illuGage"></td>';
        echo '<th class="tdShowBoy">M '.$i.'</th>';
        echo '</tr>';
    }
}

function countFiles($path)
{
    /* cette fonction remplace la fonction glog() en cas d'incompatibilité*/
    $nbFichiers = -2;
    $repertoire = opendir($path);
                 
    while ($fichier = readdir($repertoire))
    {
        if($fichier!=".DS_Store"){
            $nbFichiers += 1;
        }
        //$nbFichiers += 1;
    }
                 
    return (int) $nbFichiers;
}












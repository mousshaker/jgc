<?php

/* Définition des variables globales. */
global $viewContent;


if(TYPE_PAGE == 3){
    $viewContent = 'simpleContentView';
}
else{
    $viewContent = 'indexView';
}


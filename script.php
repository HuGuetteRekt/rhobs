<?php

    /*$fichier = file('salarie.txt');
    $lignes = count($fichier);

    
    
    $fichier = fopen('salarie.txt', 'a');
    fwrite($fichier, "Nouveau salarie");
    fclose($fichier);

    // la variable $fichier contient notre fichier salarie.txt
    

    // on recupere le contenu de notre fichier et on l'affiche
    //echo file_get_contents($fichier);

    $fichier = file('salarie.txt');
    $lignes = count($fichier);
    echo $lignes;

    for($i = 0; $i<$lignes; $i++)
    {
        echo explode(',',$fichier[$i]);
    }
    

    // on créer un tableau afin de remplir notre fichier de données aléatoires pour les 60 autres salariés
    $tableau = array('S10.G00.00.001' => 'FacticeLogPaye',
                     'S11.G00.00.001' => 'Test',
                     'S12.G00.00.001' => 'oui'
                    );
    // on initie le nombre de salariés à 0
    $nbSalarie = 0;
    
    // tant que le nombre de salariés n'a pas atteint 60, on repete chaque information de notre tableau pour créer un nouveau salarié et insérer ses données dans le fichier

    while($nbSalarie < 30)
    {
        foreach($tableau as $cle => $valeur)
        {
            //on insere une fois notre tableau dans le fichier en conservant ce qui est déjà ecrit
            echo file_put_contents($fichier, implode("\n", $tableau), FILE_APPEND);
            echo '<br/>';
        }
        // A chaque passage on ajoute un salarie pour s'arreter a 60
        $nbSalarie = $nbSalarie+1;
    }

    for($i = 0; $i <61; $i++)
    {
        echo file_put_contents($fichier, implode("\n", $tableau), FILE_APPEND);
        echo '<br/>';
    }*/
    // le fichier
    $fichier='salarie.txt';

    // ouverture du fichier
    $fp=fopen($fichier,'r');
    $data = array();
    while (!feof ($fp)) // tant que pas en fin de fichier
    {
        $lecture = fgets($fp, 4096); // stockage dans $lecture
        $donnee = explode(",",$lecture);  // parsing des données basé sur "")
        $combien = count($donnee)-1; // nbre d'éléments séparés par ""
        for ($i=0;$i<3960;$i++)
        {
            $data[] = $donnee[0].", ". $donnee[1];
            if($donnee[0] == "S10.G00.00.003"){
                $data[] =  $donnee[0].", ". hashemdp($donnee[1]). "\n";
            }else if($donnee[0] == "S21.G00.20.003"){
                $data[] =  $donnee[0].", ". hashemdp($donnee[1]). "\n";
            }


        }
    }
        //ecriture dans un nouveau fichier client.txt
        file_put_contents('client.txt', $data);
    
    
    fclose($fp); // fermeture


    //on cache les données
    function hashemdp($value){
        $nombre_caracteres = strlen($value);
        $chaine = '';
        for($i = 1; $i <= $nombre_caracteres; $i ++)
        {
            $chaine .= '*';
        }

        return "'".$chaine."'";
    }
?>
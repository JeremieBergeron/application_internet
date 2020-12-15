<?php $this->titre = 'Blog de Jérémie Bergeron'; ?>

<ol>
    <li>Jérémie Bergeron</li>

    <li>Titre du cours</li>
    <ol>
        <li>4205B7MO - Applications Internet.</li>
        <li>Automne 2020, Collège Montmorency</li>
    </ol>
    <li><a href="https://github.com/moi15moi/application_internet">Repos Github</a></li>

    <ol>
        <ol>JQuery-ui Autocomplete (4.1)
            <li>Dans la vue add et edit du controlleur products, on peut avoir en autocompétion les pays. Il suffit d'écrire pour voir un nom de pays apparaître.</li>
        </ol>
        <ol>Listes liées par Ajax (4.2)	
            <li>Dans la vue add et edit du controlleur products, on a une liste lié entre catégorie et sous-catégorie.</li>
        </ol>

        <ol>Lecture et suppression en Ajax et Rest (5.1 et 5.2)	
            <li>Dans la vue monopage tags, la lecture fonctionne bien. L'option supprimé fonctionne, mais si on fait une autre action avant celle-ci, elle ne fonctionne plus.</li>
        </ol>
        <ol>        Ajout et modification en Ajax et Rest (5.1 et 5.2)		
            <li>Dans la vue monopage tags, ces 2 actions fonctionnent bien.</li>
        </ol>
        <ol> Interface avec préfixe de routage "Admin" (6.1)	
            <li>Dans la vue admin/tags, tout fonctionne bien</li>
        </ol>
        <ol> Interface adaptative Bootstrap (6.2)	
            <li>Dans la vue monopage tags, l'interface adaptative fonctionne bien. </li>
        </ol>
        <ol> affichage d'un document pdf (6.3)		
            <li>Fonctionne bien, mais le css et les images ne s'affichent pas. </li>
        </ol>
        <ol> Démarrage de session et du changement de mot de passe : (7+8)		
            <li>Pour se connecter ou changer son mot de passe, il faut remplir un captcha. On utilise celui de google parce que c'est extrêmement plus simple que d'en développer un. </li>
        </ol>
        <ol> Procédure pour tester le fonctionnement de l'interface AngularJS des listes liées et du modèle "CRUD" monopage (7)		
            <li>Il suffit d'aller dans la vue add du product pour tester le tout.</li>
            <li>Il suffit d'aller dans la vue monopage tags et se connecter. Par la suite, il suffit d'ajouter/modifier/supprimer un tag.</li>
        </ol>
         <ol> Fonctionnement du cliquer-glisser pour ajouter une image à l'application (9)	
            <li>Dans la vue File, il suffit de glisser un fichier et il sera ajouter. Par contre, il ajoute tout type de fichier et non simplement les images.</li>
        </ol>
    </ol>

<li>Base de données : <a href="http://www.databaseanswers.org/data_models/hardware_sales/index.htm">Customers and Hardware Store</a></li>

    <li><?php
        echo $this->Html->image("pages/" . "diagramme_bdd.png", [
        ]);
        ?>
    </li>

    

</ol>
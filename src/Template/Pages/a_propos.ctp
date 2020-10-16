<?php $this->titre = 'Blog de Jérémie Bergeron'; ?>

<h1>Jérémie Bergeron</h1>

<h2>4205B7MO - Applications Internet.</br>Automne 2020, Collège Montmorency</h2>

<ol>
    <li>Le site web sert effectuer des achats. Pour qu'un achat soit réalisable, il faut être connecter, avoir confirmer son compte et remplir les champs nécessaires.
        <ol>
            <ol>
                <li class="bold">BD avec hasMany (1-n)</li>
                <ol type="a">
                    <li>Le lien entre les tables purchases et products.</li>
                </ol>
                <li class="bold">BD avec belongsToMany (n-n)</li>
                <ol type="a">
                    <li>Le lien entre les tables products et tags OU encore le lien des tables products et files.</li>
                </ol>
                <li class="bold">cake bake pour 5 tables + validations</li>
                <ol type="a">
                    <li>Les 5 tables sont Files, Products, Purchases, Roles, Tags et Users.</li>
                    <li>L'application est basée sur le résultat des modèles, vues et contrôleurs par la commande cake bake all pour chacune des tables.</li>
                </ol>
                <li class="bold">Actions et infos en menu pour trois types d'utilisateurs</li>
                <ul>
                    <li class="underline">Admin</li>
                    <ol type="a">
                        <li>Courriel: admin@admin.com</li>
                        <li>Mot de passe: admin</li>
                    </ol>
                </ul>
                <ul>
                    <li class="underline">Manager</li>
                    <ol type="a">
                        <li>Courriel: manager@manager.com</li>
                        <li>Mot de passe: manager</li>
                    </ol>

                </ul>
                <ul>
                    <li class="underline">Customer</li>
                    <ol type="a">
                        <li>Courriel: customer@customer.com</li>
                        <li>Mot de passe: customer</li>
                    </ol>
                </ul>
                <ol type="a">
                    <li>Si nous ne sommes pas connecter, on a accès à l'index de toutes les vues et on peut ajouter des utilisateurs.</li> 
                    <li>Si nous n'avons pas confirmé notre compte, nous avons les même permissions qu'une personne non-connecté.</li> 
                    <li>Peu importe notre rôle (admin, manager ou customer), on doit pouvoir ajouter des achats.</li>
                    <li>Un customer ne peut que visualier, modifier et supprimer  ses propres achats.</li>
                    <li>Si nous sommes admin ou manager, on doit pouvoir ajouter/modifier/supprimer des achats.</li>
                    <li>Si nous sommes admin ou manager, on doit pouvoir ajouter/modifier/supprimer des produits.</li>
                    <li>Si nous sommes admin ou manager, on doit pouvoir ajouter/modifier/supprimer des fichiers.</li>
                    <li>Si nous sommes admin ou manager, on doit pouvoir ajouter/modifier/supprimer des tags.</li>
                    <li>Si nous sommes admin, on doit pouvoir ajouter/modifier/supprimer des rôles.</li>
                </ol>
                <li class="bold">Traduction i18n en français et 3ième langue</li>
                <ol type="a">
                    <li>Les tables Roles et Tags ont été traduite.</li>
                </ol>
                <li class="bold">Téléversement et affichage d'images liées</li>
                <ol type="a">
                    <li>Le contrôleur Files permet de rajouter des images. La table Pdroduits est lié à la table Files.</li>
                </ol>
                <li class="bold">Envoi d'un courriel de confirmation avec UUID</li>
                <ol type="a">
                    <li>Le contrôleur Emails permet d'envoyer un courriel de confirmation.</li>s
                </ol>
            </ol>
            <li>Base de données : <a href="http://www.databaseanswers.org/data_models/hardware_sales/index.htm">Customers and Hardware Store</a></li>

            <p><?php
                echo $this->Html->image("pages/" . "diagramme_bdd.png", [
                ]);
                ?>
            </p>
            
            <li><a href="https://github.com/moi15moi/application_internet">Repos Github</a></li>

        </ol>
    </li>


</ol>
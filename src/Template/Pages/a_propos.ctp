<?php $this->titre = 'Blog de Jérémie Bergeron'; ?>

<h1>Jérémie Bergeron</h1>

<h2>4205B7MO - Applications Internet.</br>Automne 2020, Collège Montmorency</h2>

<ol>
    <li>Le site web sert effectuer des achats. Pour qu'un achat soit réalisable, il faut être connecter et remplir les champs pour en ajouter une
        <ol>
            <ol>
                <li>BD avec hasMany (1-n)</li>
                <ol>
                    <li>Le lien des tables purchases et products</li>
                </ol>
                <li>BD avec belongsToMany (n-n)</li>
                <ol>
                    <li>Le lien des tables products et tags OU encore le lien des tables products et files</li>
                </ol>
                <li>cake bake pour 5 tables + validations</li>
                <ol>
                    <li>Les 5 tables sont Files, Products, Purchases, Roles, Tags et Users</li>
                    <li>L'application est basée sur le résultat des modèles, vues et contrôleurs par la commande cake bake all pour chacune des tables</li>
                </ol>
                <li>Actions et infos en menu pour trois types d'utilisateurs</li>
                <ol>
                    <li>Admin</li>
                    <ol>
                        <li>Courriel: admin@admin.com</li>
                        <li>Mot de passe: admin</li>
                    </ol>
                </ol>
                <ol>
                    <li>Manager</li>
                    <ol>
                        <li>Courriel: manager@manager.com</li>
                        <li>Mot de passe: manager</li>
                    </ol>

                </ol>
                <ol>
                    <li>Customer</li>
                    <ol>
                        <li>Courriel: customer@customer.com</li>
                        <li>Mot de passe: customer</li>
                    </ol>
                </ol>
                <ol>
                    <li>Si nous ne sommes pas connecter, on a accès à l'index de toutes les vues.</li>                    
                    <li>Peu importe notre rôle, on doit pouvoir ajouter des achats.</li>
                    <li>Si nous sommes admin ou manager, on doit pouvoir ajouter/modifier/supprimer des achats.</li>
                    <li>Si nous sommes admin ou manager, on doit pouvoir ajouter/modifier/supprimer des produits.</li>
                    <li>Si nous sommes admin ou manager, on doit pouvoir ajouter/modifier/supprimer des fichiers.</li>
                    <li>Si nous sommes admin, on doit pouvoir ajouter/modifier/supprimer des rôles.</li>
                    <li>Si nous sommes admin ou manager, on doit pouvoir ajouter/modifier/supprimer des tags.</li>
                    <li>On doit toujours pouvoir ajouter des utilisateurs.</li>               
                </ol>
                <li>Traduction i18n en français et 3ième langue</li>
                <ol>
                    <li>Le lien des tables purchases et products</li>
                </ol>
                <li>Téléversement et affichage d'images liées</li>
                <ol>
                    <li>Fait dans le contrôleur Files. Les produits sont liés à des images.</li>
                </ol>
                <li>Envoi d'un courriel de confirmation avec UUID	</li>
                <ol>
                    <li>Fait dans le contrôleur Emails.</li>s
                </ol>
            </ol>
            <li>Base de données : <a href="http://www.databaseanswers.org/data_models/hardware_sales/index.htm">Customers and Hardware Store</a></li>

            <p><?php
                echo $this->Html->image("pages/" . "diagramme_bdd.png", [
                ]);
                ?>
            </p>

        </ol>
    </li>


</ol>
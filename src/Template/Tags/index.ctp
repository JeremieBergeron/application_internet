<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js',
    'https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit'
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Tags'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Tags/index', ['block' => 'scriptBottom']);
?>



<div  ng-app="app" ng-controller="TagCRUDCtrl">
    <div id="example1"></div> 
    <p style="color:red;">{{ captcha_status}}</p>
    <div class="float-left">
        <a href="javascript:void(0);" class="btn btn-success" data-type="add" data-toggle="modal" data-target="#modalTagAddEdit" ng-click="addModal()"><i class="plus"></i> Ajouter un tag</a>
    </div>
    <div class="float-right">
        <a href="javascript:void(0);" class="btn btn-success" data-type="add" data-toggle="modal" data-target="#modalLoginLogout"><i class="plus"></i> Connexion/Déconnexion</a>
    </div>

    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>

    <table class="hoverable bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody ng-init="getAllTags()">
            <tr ng-repeat="tag in tags| filter:search">
                <td class="text-align-center">
                    {{tag.id}}
                </td>
                <td>
                    {{tag.title}}
                </td>
                <td>
                    <button type="button" class="btn btn-warning btm-sm" data-toggle="modal" data-target="#modalTagAddEdit" ng-click="getTag(tag.id)">Modifier</button>
                    <button type="button" class="btn btn-danger btm-sm" ng-click="deleteTag(tag.id)">Supprimer</button>

                </td>
            </tr>
        </tbody>
    </table>

    <div class="modal fade" id="modalTagAddEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" ng-model="addEditTitle">{{addEditTitle}}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="addEditStatusMsg"></div>
                    <form role="form">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter the title" ng-model="tag.title">
                        </div>
                        <input type="hidden" class="form-control" name="id" id="id" ng-model="tag.id">
                    </form>
                </div>    


                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="tagAdd" ng-click="updateTag(tag.id, tag.title)" ng-show="editButton">Mettre à jour Tag</button>
                    <button type="button" class="btn btn-success" id="tagEdit" ng-click="addTag(tag.title)" ng-show="addButton">Ajouter un Tag</button>
                </div>  
            </div>  
        </div>  
    </div>

    <div class="modal fade" id="modalLoginLogout" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Connexion</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="userStatusMsg"></div>
                    <form role="form">
                        <div class="form-group">
                            <label for="username"> Nom d'utilisateur</label>
                            <input input="text" class="form-control" name="username" id="username" placeholder="Entrez le nom d'utilisateur" ng-model="user.username">
                        </div>
                        <div class="form-group">
                            <label for="password"> Mot de passe</label>
                            <input input="text" class="form-control" name="password" id="password" placeholder="Entrez le mot de passe" ng-model="user.password">
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-success" id="userLogin" ng-click="login(user)">Connexion</button>
                    <button type="button" class="btn btn-success" id="userLogout" ng-click="logout()">Déconnexion</button>
                    <button type="button" class="btn btn-success" id="changePassword" ng-click="changePassword(user.password)">Changer votre mot de passe</button>
                </div>
            </div>
        </div>
    </div>
</div>

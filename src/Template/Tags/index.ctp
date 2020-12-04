<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js'
        ], ['block' => 'scriptLibraries']
);
$urlToRestApi = $this->Url->build([
    'prefix' => 'api',
    'controller' => 'Tags'], true);
echo $this->Html->scriptBlock('var urlToRestApi = "' . $urlToRestApi . '";', ['block' => true]);
echo $this->Html->script('Tags/index', ['block' => 'scriptBottom']);
?>

<div  ng-app="app" ng-controller="TagCRUDCtrl">
    <input type="hidden" id="id" ng-model="tag.id" />
    <table>

        <tr>
            <td width="100">Title:</td>
            <td><input type="text" id="title" ng-model="tag.title" /></td>
        </tr>
    </table>
    <br /> <br /> 
    <button ng-click="updateTag(tag.id, tag.title)">Update Tag</button> 
    <button ng-click="addTag(tag.title)">Add Tag</button> 
        
    
    <p style="color: green">{{message}}</p>
    <p style="color: red">{{errorMessage}}</p>
    
    <table class="hoverable bordered">
        <thead>
            <tr>
                <th class="text-align-center">ID</th>
                <th class="width-30-pct">Title</th>
                <th class="text-align-center">Actions</th>
            </tr>
        </thead>
        
        <tbody ng-init="getAllTags()">
            <tr ng-repeat="tag in tags | filter:search">
                <td class="text-align-center">
                    {{tag.id}}
                </td>
                <td>
                    {{tag.title}}
                </td>
                <td>
                    <button type="button" class="btn btn-warning btn-sm" ng-click="getTag(tag.id)">Get Tag</button>
                    <button type="button" class="btn btn-danger btn-sm" ng-click="deleteTag(tag.id)">Delete Tag</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>


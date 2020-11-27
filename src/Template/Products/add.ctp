<?php
echo $this->Html->script([
    'https://ajax.googleapis.com/ajax/libs/angularjs/1.6.6/angular.js'
        ], ['block' => 'scriptLibraries']
);
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "Subcategories",
    "action" => "getByCategory",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Products/add_edit', ['block' => 'scriptBottom']);
?>
<?php
$urlToCarsAutocompletedemoJson = $this->Url->build([
    "controller" => "Countries",
    "action" => "findCountries",
    "_ext" => "json"
        ]);
echo $this->Html->scriptBlock('var urlToAutocompleteAction = "' . $urlToCarsAutocompletedemoJson . '";', ['block' => true]);
echo $this->Html->script('Products/CountryAutocomplete', ['block' => 'scriptBottom']);
?>
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Products'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Purchases'), ['controller' => 'Purchases', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Purchase'), ['controller' => 'Purchases', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tags'), ['controller' => 'Tags', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tag'), ['controller' => 'Tags', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="obecCities form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="categoriesController">
    <?= $this->Form->create($product) ?>
    <fieldset>
        <legend><?= __('Add Product') ?></legend>
        <?php
        echo $this->Form->control('name');
        echo $this->Form->control('description');
        echo $this->Form->control('price');
        echo $this->Form->control('quantity_available');
        ?>
        <div>
            <?= __('Categorie') ?> : 
            <select 
                name="category_id"
                id="category-id" 
                ng-model="category" 
                ng-options="category.name for category in categories track by category.id"
                >
                <option value=''>Select</option>
            </select>
        </div>
        <?php
        echo $this->Form->control('subcategory_id', ['options' => [__('Please select a categorie first')]]);
        echo $this->Form->control('country_id', ['label' => __('Country') . ' (' . __('Autocomplete demo') . ')', 'type' => 'hidden']);
        ?>
        <div class="input text">
            <label for="autocomplete"><?= __("Country") ?></label>
            <input id="autocomplete" type="text">
        </div>
        <?php
        echo $this->Form->control('files._ids', ['options' => $files]);
        echo $this->Form->control('tags._ids', ['options' => $tags]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>

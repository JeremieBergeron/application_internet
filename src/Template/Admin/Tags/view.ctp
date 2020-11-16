<?php $this->extend('../../Layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id], ['class' => 'nav-link']) ?></li>
<li><?= $this->Form->postLink( __('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id), 'class' => 'nav-link'] ) ?></li>
<li><?= $this->Html->link(__('List Tags'), ['action' => 'index'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('New Tag'), ['action' => 'add'], ['class' => 'nav-link']) ?> </li>
<li><?= $this->Html->link(__('List Tags Title Translation'), ['controller' => 'Tags_title_translation', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Tags Title Translation'), ['controller' => 'Tags_title_translation', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List I18n'), ['controller' => 'I18n', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New I18n'), ['controller' => 'I18n', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('List Products'), ['controller' => 'Products', 'action' => 'index'], ['class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('New Product'), ['controller' => 'Products', 'action' => 'add'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->title) ?></h3>
    <div class="table-responsive">
        <table class="table table-striped">
            <tr>
                <th scope="row"><?= __('Title') ?></th>
                <td><?= h($tag->title) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Tags Title Translation') ?></th>
                <td><?= $tag->has('title_translation') ? $this->Html->link($tag->title_translation->id, ['controller' => 'Tags_title_translation', 'action' => 'view', $tag->title_translation->id]) : '' ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Id') ?></th>
                <td><?= $this->Number->format($tag->id) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Created') ?></th>
                <td><?= h($tag->created) ?></td>
            </tr>
            <tr>
                <th scope="row"><?= __('Modified') ?></th>
                <td><?= h($tag->modified) ?></td>
            </tr>
        </table>
    </div>
    <div class="related">
        <h4><?= __('Related Products') ?></h4>
        <?php if (!empty($tag->products)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Category Id') ?></th>
                    <th scope="col"><?= __('Subcategory Id') ?></th>
                    <th scope="col"><?= __('Country Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Description') ?></th>
                    <th scope="col"><?= __('Price') ?></th>
                    <th scope="col"><?= __('Quantity Available') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($tag->products as $products): ?>
                <tr>
                    <td><?= h($products->id) ?></td>
                    <td><?= h($products->category_id) ?></td>
                    <td><?= h($products->subcategory_id) ?></td>
                    <td><?= h($products->country_id) ?></td>
                    <td><?= h($products->name) ?></td>
                    <td><?= h($products->description) ?></td>
                    <td><?= h($products->price) ?></td>
                    <td><?= h($products->quantity_available) ?></td>
                    <td><?= h($products->created) ?></td>
                    <td><?= h($products->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Products', 'action' => 'view', $products->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Products', 'action' => 'edit', $products->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'Products', 'action' => 'delete', $products->id], ['confirm' => __('Are you sure you want to delete # {0}?', $products->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related I18n') ?></h4>
        <?php if (!empty($tag->_i18n)): ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Locale') ?></th>
                    <th scope="col"><?= __('Model') ?></th>
                    <th scope="col"><?= __('Foreign Key') ?></th>
                    <th scope="col"><?= __('Field') ?></th>
                    <th scope="col"><?= __('Content') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($tag->_i18n as $i18n): ?>
                <tr>
                    <td><?= h($i18n->id) ?></td>
                    <td><?= h($i18n->locale) ?></td>
                    <td><?= h($i18n->model) ?></td>
                    <td><?= h($i18n->foreign_key) ?></td>
                    <td><?= h($i18n->field) ?></td>
                    <td><?= h($i18n->content) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'I18n', 'action' => 'view', $i18n->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'I18n', 'action' => 'edit', $i18n->id], ['class' => 'btn btn-secondary']) ?>
                        <?= $this->Form->postLink( __('Delete'), ['controller' => 'I18n', 'action' => 'delete', $i18n->id], ['confirm' => __('Are you sure you want to delete # {0}?', $i18n->id), 'class' => 'btn btn-danger']) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>

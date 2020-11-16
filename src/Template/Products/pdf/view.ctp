<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>

<div class="products view large-9 medium-8 columns content">
    <h3><?= h($product->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity Available') ?></th>
            <td><?= $this->Number->format($product->quantity_available) ?></td>
        </tr>

        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $product->has('category') ? $this->Html->link($product->category->name, ['controller' => 'categories', 'action' => 'view', $product->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subcategory') ?></th>
            <td><?= $product->has('subcategory') ? $this->Html->link($product->subcategory->name, ['controller' => 'subcategories', 'action' => 'view', $product->subcategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Country') ?></th>
            <td><?= $product->has('country') ? $this->Html->link($product->country->name, ['controller' => 'countries', 'action' => 'view', $product->country->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($product->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($product->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($product->files)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col" class="actions"><?= __('Image(s)') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($product->files as $files): ?>
                    <tr>
                        <td>
                            <?php
                            echo $this->Html->image($files->path . $files->name, [
                                "alt" => $files->name,
                                "width" => "300px",
                                "height" => "150px",
                            ]);
                            ?>
                        </td>
                        <td class="actions">

                            <?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $files->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $files->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $files->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tags') ?></h4>
        <?php if (!empty($product->tags)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Title') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($product->tags as $tags): ?>
                    <tr>
                        <td><?= h($tags->title) ?></td>
                        <td><?= h($tags->created) ?></td>
                        <td><?= h($tags->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Tags', 'action' => 'view', $tags->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Tags', 'action' => 'edit', $tags->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tags', 'action' => 'delete', $tags->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tags->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Purchases') ?></h4>
        <?php if (!empty($product->purchases)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th scope="col"><?= __('Quantity Purchased') ?></th>
                    <th scope="col"><?= __('Detail') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($product->purchases as $purchases): ?>
                    <tr>
                        <td><?= h($purchases->quantity_purchased) ?></td>
                        <td><?= h($purchases->detail) ?></td>
                        <td><?= $purchases->has('user') ? $this->Html->link($purchases->user->username, ['controller' => 'Users', 'action' => 'view', $purchases->user->id]) : '' ?></td>
                        <td><?= h($purchases->created) ?></td>
                        <td><?= h($purchases->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Purchases', 'action' => 'view', $purchases->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Purchases', 'action' => 'edit', $purchases->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'Purchases', 'action' => 'delete', $purchases->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchases->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</div>

<h1>Votre compte n'est pas confirmé.</h1>
<p>Voici les restrictions auquel vous serez soumis.</p>
<ol>
    <li>Si vous pouvez uniquement accédez à l'index de toutes les vues et consulter les produits.</li>                    
</ol>
<p>Si vous souhaitez pouvoir en faire plus, veuillez confirmer votre compte.</p>
<?php
echo $this->Html->link(
    'Dashboard',
    ['controller' => 'Users', 'action' => 'index', 'sendConfirmEmail' => $user]
 );

?>

 <?= echo $this->Form->create($user, [
    'url' => ['controller' => 'Users', 'action' => 'sendConfirmEmail']
]);
?>
<?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>

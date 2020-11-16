<h1>Votre compte n'est pas confirmé.</h1>
<p>Voici les restrictions auquel vous serez soumis.</p>
<ol>
    <li>Si vous pouvez uniquement accédez à l'index de toutes les vues et consulter les produits.</li>                    
</ol>
<p>Si vous souhaitez pouvoir en faire plus, veuillez confirmer votre compte.</p>
<?php
        echo $this->Html->link(__('Send a confirm email'), ['action' => 'sendConfirmEmail', $user->uuid])
?>
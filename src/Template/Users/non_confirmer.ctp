<h1>Votre compte n'est pas confirmé.</h1>
<p>Voici les restrictions auquel vous serez soumis.</p>
<ol>
    <li>Si vous pouvez uniquement accédez à l'index de toutes les vues et consulter les produits.</li>                    
</ol>
<p>Si vous souhaitez pouvoir en faire plus, veuillez confirmer votre compte.</p>
<?php
/*$this->request->is('post');
            $user = $this->Auth->identify();*/
    
echo $this->redirect(['controller' => 'Users', 'action' => 'sendConfirmEmail',$user['uuid'] ]);

echo $this->Html->link("Envoyez le courriel de confirmation", array('controller' => 'Users','action'=> 'sendConfirmEmail', $user['uuid']), array( 'class' => 'button'))



?>
<?php

use App\App;
use App\Table\User;
use App\Table\Customer;
use App\CssForm;



$customer = Customer::find($_GET['id']);
if ($customer === false){
    App::notFound();
}
$customer = User::customer($_GET['id']);
// $customers = Customer::all();



?>

<div class="row">
    <div class="col-sm-8">
    <?php
        
        $form = new CssForm($_POST);

        foreach ($customer as $post):

        ?>
            
            <h2>Entreprise : <a href="<?= $post->url; ?>"><?= $post->user; ?></a> </h2>

            <?php if (isset($_GET['edit']) == 'edit'){
                if (isset($_POST['nom'])){
                    User::updateCustomer($_POST['nom'],$_POST['prenom'],$_POST['cp'],$_POST['numero'],$_POST['mail'],$_POST['adresse'], $_GET['id']);
                
                    header('Location: ' . $post->url . '');
                }
                
            ?>

                <form action="" method="post">

            <?php 
                echo $form->input('nom', $post->nom);
                echo $form->input('prenom', $post->prenom);
                echo $form->input('cp', $post->cp );
                echo $form->input('adresse', $post->adresse );
                echo $form->input('numero', $post->numero );
                echo $form->input('mail', $post->mail );
                echo $form->submit();
                ?>
                <a href="<?= $post->url; ?>">retour</a>

            <?php

                }else {
            ?>

                <p> Nom : <?= $post->nom; ?></p>
                <p> Prenom : <?= $post->prenom; ?></p>
                <p> CP : <?= $post->cp; ?></p>
                <p> Adresse : <?= $post->adresse; ?></p>
                <p> Numero : <?= $post->numero; ?></p>
                <p> Mail : <?= $post->mail; ?></p>

                <a href="<?= $post->url;?>&edit=edit">Modifier</a>
                <a href="<?= $post->url;?>&delete=delete">Supprimer</a>

                <?php
                if (isset($_GET['delete']) == 'delete'){
                    User::deleteCustomer($post->id);
                    
                    header('Location: http://localhost/ecf2crud/crud/public/');
                }

                

                ?>

            <?php
                }
            ?>

            



        <?php 

        endforeach; 

        ?>
    </div>
</div>
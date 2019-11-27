<?php

use App\App;
use App\Table\User;
use App\Table\Customer;
use App\CssForm;

$form = new CssForm($_POST);



?>
                <form action="" method="post">

            <?php 
                echo $form->input('nom', '$post->nom');
                echo $form->input('prenom', '$post->prenom');
                echo $form->input('cp', '$post->cp' );
                echo $form->input('adresse', '$post->adresse' );
                echo $form->input('numero', '$post->numero' );
                echo $form->input('mail', '$post->mail' );
                echo $form->submit();
                ?>


    </div>
</div>
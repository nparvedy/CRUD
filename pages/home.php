<div class="row">
    <div class="col-sm-8">
    <?php

        foreach (\App\Table\User::getLast() as $post):

        ?>

            <h2><a href="<?= $post->url; ?>"><?= $post->nom_entreprise; ?></a> </h2>

            <p><?= 'L\'entreprise ' . $post->nom . ' ' . $post->prenom . ' contient les clients : ';  ?></p>
            <ul>
            <?php foreach(\App\Table\User::listCustomer($post->id) as $customer): ?>
                <li><a href="<?= $customer->url; ?>"><?= $customer->nom; ?></li>
            <?php endforeach; ?>
        </ul>


        <?php 

        endforeach; 

        ?>
    </div>

    
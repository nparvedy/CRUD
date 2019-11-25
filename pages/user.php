<?php

use App\App;
use App\Table\User;
use App\Table\Customer;

$customer = Customer::find($_GET['id']);
if ($customer === false){
    App::notFound();
}
$user = User::LastByCustomer($_GET['id']);
$customers = Customer::all();

?>

<div class="row">
    <div class="col-sm-8">
    <?php


        foreach ($customer as $post):

        ?>

        
            <h1><?= $customer->nom ?></h1>

            <h2><a href="<?= $post->url; ?>"><?= $post->nom; ?></a> </h2>

            <p><em><?= $post->customer; ?></em></p>



        <?php 

        endforeach; 

        ?>
    </div>

    <div class="col-sm-4">
        <ul>
            <?php foreach(\App\Table\Customer::all() as $customer): ?>
                <li><a href="<?= $customer->url; ?>"><?= $customer->nom; ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
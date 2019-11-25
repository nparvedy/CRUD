<?php

namespace App\Table;

use App\App;

class Customer extends Table{

    protected static $table = 'customers';

    public function getURL(){
        return 'index.php?p=customer&id=' . $this->id;
    }


}


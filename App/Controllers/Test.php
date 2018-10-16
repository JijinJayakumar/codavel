<?php
namespace App\Controllers;

use App\Config\Base_controller as base;
use App\Models\User;


class Test extends base
{
    //extends App\Config\Base_controller

    public function __construct()
    {
        parent::__construct();
    }

    public function users()
    {
        $result = User::all('*')->toArray();
        print_r($result);

    }

    public function view()
    {
        // echo "test";
        $data['name'] = "Mercury, Venus, Mars, Jupiter, Saturn, Uranus & Neptune.";

        echo $this->view->render('test.php', $data);

    }

}

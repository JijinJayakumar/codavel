<?php
namespace App\Config;

use App\Models\User;
class Base_controller 
{
    //all base logic must go here 
    public function __construct(){
       $this->loader = new \Twig_Loader_Filesystem(__DIR__ . '/../Views');
        $this->view = new \Twig_Environment($this->loader, array(
            // Uncomment the line below to cache compiled templates
            // 'cache' => __DIR__.'/../cache',
        ));

    }


}

?>



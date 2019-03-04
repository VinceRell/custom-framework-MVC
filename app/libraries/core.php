<?php 

    /*
      App Core Class
      Creates URL and loads core controller
      URL Format - /controller/methods/params
    */
    class Core {
        protected $currentController = 'Pages';
        protected $currentMethod = 'index';
        protected $params = []; 

        public function __construct() {
          $url = $this->getURL();

          //  look in controller for first value
          if(file_exists('../app/controllers/' . ucwords($url[0]. '.php'))){
            // if exists set as current controller
            $this->currentController = ucwords($url[0]);
            // unset 0 index
            unset($url[0]); 
          }

          //  require the controller 
          require_once '../app/controllers/'. $this->currentController . '.php';

          // instanciate controller class
          $this->currentController = new $this->currentController;

        }
 
        public function getURL() {
          if(isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
          }
        }
    }
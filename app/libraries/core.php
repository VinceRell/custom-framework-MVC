<?php 

    /*
      App Core Class
      Creates URL and loads core controller
      URL Format - /controller/methods/params
    */
    class Core {
        protected $currentController = 'pages';
        protected $currentMethod = 'index';
        protected $params = []; 
    }
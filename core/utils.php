<?php

/**
 * redirect to the url in parameter
 * 
 * @param string
 */

function redirect(string $url): void {

    header("Location:".$url);
  
}

/**
 * generates data rendering 
 * 
 * @param string $template
 * @param array $data
 * 
 */

function render(string $template, array $data):void {

    extract($data);

    ob_start();

     require_once "templates/".$template.".html.php";

    $contentOfThePage = ob_get_clean();

    require_once "templates/layout.html.php";

    

}

?>
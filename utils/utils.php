<?php

// Função criada para retornar uma constante com o valor base da URL do servidor local por exemplo
function getBaseURL(){

    return "http://" . $_SERVER["SERVER_NAME"] . dirname($_SERVER["REQUEST_URI"]."?" . "/");

}

define("BASE", getBaseURL());


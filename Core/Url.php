<?php
namespace Core;

class Url
{
    private $urlBase;

    public function __construct() {
        $http = $_SERVER["SERVER_PROTOCOL"] == "HTTP/1.1" ? "http" : "https";
        $urlName = $_SERVER["SERVER_NAME"];
        $port = $_SERVER["SERVER_PORT"];
        $this->urlBase = $http."://".$urlName.":".$port;
    }

    public function getBase($link="") {
        return $this->urlBase."/".$link;
    }

    #0 = primeiro parametro
    public function getParams($index=null) {
        $query = $_SERVER["REQUEST_URI"];
        $query = explode("/", $query);
        $query = array_slice($query, 1);
        if (isset($query[$index])) {
            return $query[$index];
        }
        return null;
    }

    public function redirect($link) {
        echo "<script>window.location.href='".$link."'</script>";
    }

}

<?php 

namespace app\lib;

class GetName{
    function getName($n) {
        $characters = $n;
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $charactersLength; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $randomString = trim($randomString);
        $randomString = substr($randomString,1,4);
        $randomString = strtoupper($randomString);
        return $randomString;
    }
}
?>
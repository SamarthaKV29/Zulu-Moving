<?php 
try{
    $dbopts = parse_url(getenv('DATABASE_URL'));
    echo $dbopts;
}
catch(Exception $e){
    echo "Except";
}
?>

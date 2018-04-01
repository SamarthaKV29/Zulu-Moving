<?php
function pg_connection_string_from_database_url() {
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
  }
 
try{
    $pg_conn = pg_connect(pg_connection_string_from_database_url());
    echo "Access";
    $result = pg_query($pg_conn, "SELECT * FROM testimonials;");
    while ($row = pg_fetch_assoc($result)) {
        echo "<ul>";
        echo $row["userid"];
        echo $row["review"];
        echo "</ul>";
    }
    echo $result;
    if($result)
    {
        echo "<ul>";
        foreach ($result as $row){
            echo "<li> $row </li>";
        }
        echo "</ul>";
    }
}
catch(Exception $e){
    echo "Unable to access our Database.";
}
?>

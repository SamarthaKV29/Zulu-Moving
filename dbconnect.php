<?php
function pg_connection_string_from_database_url() {
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
  }
 
try{
    $pg_conn = pg_connect(pg_connection_string_from_database_url());
    $result = pg_query($pg_conn, "SELECT * FROM testimonials;");
    echo "<div class='row'><div class='col-md-6 center'><ul>";
    while ($row = pg_fetch_assoc($result)) {
        echo "<li class='text-success'>";
        echo "<div class='panel panel-default'><div class='panel-heading'>"."User:".$row["emailid"]."</div>";
        echo "<div class='panel-body'>".$row["review"]."</div>";
        echo "</li>";
    }
    echo "</ul></div></div><hr>";
}
catch(Exception $e){
    echo "Unable to access our Database.";
}
?>

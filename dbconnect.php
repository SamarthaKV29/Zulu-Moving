<?php
function pg_connection_string_from_database_url() {
    extract(parse_url($_ENV["DATABASE_URL"]));
    return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
  }
 
function getData(){
    try{
        $pg_conn = pg_connect(pg_connection_string_from_database_url());
        $result = pg_query($pg_conn, "SELECT * FROM testimonials;");
        echo "<div class='row text-center pagination-centered m-1'><div class='text-center pagination-centered'><ul>";
        while ($row = pg_fetch_assoc($result)) {
            echo "<li class='text-info'>";
            echo "<div class='panel panel-info'><div class='panel-heading py-5'><h2>".$row["emailid"]."</hr></div>";
            echo "<div class='panel-body py-5'>".$row["review"]."</div>";
            echo "</li>";
        }
        echo "</ul></div></div><hr>";
    }
    catch(Exception $e){
        echo "Unable to access our Database.";
    }
}

function sendData(){
    echo '
    <form name="insert" action="insert.php" method="POST" >
        <li>Book ID:</li><li><input type="text" name="bookid" /></li>
        <li>Book Name:</li><li><input type="text" name="book_name" /></li>
        <li>Author:</li><li><input type="text" name="author" /></li>
        <li>Publisher:</li><li><input type="text" name="publisher" /></li>
        <li>Date of publication:</li><li><input type="text" name="dop" /></li>
        <li>Price (USD):</li><li><input type="text" name="price" /></li>
        <li><input type="submit" /></li>
    </form>
    ';
    
    try{
        $pg_conn = pg_connect(pg_connection_string_from_database_url());
        $result = pg_query($pg_conn, "SELECT * FROM testimonials;");

    }
    catch(Exception $e){
        echo "Unable to create new Testimonial, sorry!"
    }
}
?>

<?php 
try{
    $dbopts = parse_url(getenv('DATABASE_URL'));
    $app->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
                array(
                    'pdo.server' => array(
                    'driver'   => 'pgsql',
                    'user' => $dbopts["user"],
                    'password' => $dbopts["pass"],
                    'host' => $dbopts["host"],
                    'port' => $dbopts["port"],
                    'dbname' => ltrim($dbopts["path"],'/')
                    )
                )
    );

    $app->get('/db/', function() use($app) {
        $st = $app['pdo']->prepare('SELECT EMAILID FROM testimonials');
        $st->execute();
        $names = array();
        while ($row = $st->fetch(PDO::FETCH_ASSOC)) {
        $app['monolog']->addDebug('Row ' . $row['EMAIL']);
        $EMAILS[] = $row;
        }

        return $app['twig']->render('database.twig', array(
        'EMAILS' => $EMAILS
        ));
    });
}
catch(Exception $e){
    echo $e->error_get_last;
}


?>

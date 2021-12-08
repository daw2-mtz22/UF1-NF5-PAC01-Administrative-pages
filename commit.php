<?php
$db = mysqli_connect('localhost', 'root', 'root') or
die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'moviesite') or die(mysqli_error($db));
?>
<html>
 <head>
  <title>Commit</title>
 </head>
 <body>
<?php
    
    switch ($_GET['action']) {
        case 'add':
            switch ($_GET['type']) {
                case 'movie':
                    $query = 'INSERT INTO
                        movie
                            (movie_name, movie_year, movie_type, movie_leadactor,
                            movie_director)
                        VALUES
                            ("' . $_POST['movie_name'] . '",
                             ' . $_POST['movie_year'] . ',
                             ' . $_POST['movie_type'] . ',
                             ' . $_POST['movie_leadactor'] . ',
                             ' . $_POST['movie_director'] . ')';
                    break;
                 case 'people':
                    transform();
                    $query = 'INSERT INTO
                        people
                            (people_fullname,people_isactor,people_isdirector)
                        VALUES
                            ("' .$_POST['people_fullname'] . '",
                             ' . $_POST['people_isactor'] . ',
                             ' . $_POST['people_isdirector'] . ')';
                    break;
                }
        break;
    case 'edit':
        switch ($_GET['type']) {
            case 'movie':
                $query = 'UPDATE movie SET
                        movie_name = "' . $_POST['movie_name'] . '",
                        movie_year = ' . $_POST['movie_year'] . ',
                        movie_type = ' . $_POST['movie_type'] . ',
                        movie_leadactor = ' . $_POST['movie_leadactor'] . ',
                        movie_director = ' . $_POST['movie_director'] . '
                    WHERE
                        movie_id = ' . $_POST['movie_id'];
                break;
            case 'people':
                transform();
                $query = 'UPDATE people SET
                        people_fullname = "' . $_POST['people_fullname'] . '",
                        people_isactor = ' . $_POST['people_isactor'] . ',
                        people_isdirector = ' . $_POST['people_isdirector'] . '
                    WHERE
                        people_id ='  . $_POST['people_id'];
                break;
            }
        break;
    }
    
    //Quise hacer algo diferente el Switch de people.php y con esta funcion transformo sus valores
    function transform(){
        if ($_POST['people_type']=="actor" || $_POST['people_type2']=="actor"){
            $_POST['people_isactor'] = 1;
        }else{
            $_POST['people_isactor'] = 0;
        }
        
        if($_POST['people_type']=="director" || $_POST['people_type2']=="director"){
            $_POST['people_isdirector'] = 1;
        }
        else{
            $_POST['people_isdirector'] = 0;
        }
    }
    

    $result = mysqli_query($db, $query) or die(mysqli_error($db));
?>
  <p>Done!</p>
 </body>
</html>

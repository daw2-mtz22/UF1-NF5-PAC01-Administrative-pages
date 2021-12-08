<?php 
    $db = mysqli_connect('localhost', 'root', 'root') or
    die ('Unable to connect. Check your connection parameters.');
    mysqli_select_db($db,'moviesite') or die(mysqli_error($db));
    if ($_GET['action'] == 'edit') {
        //retrieve the record's information
        $query = 'SELECT
            people_id, people_fullname,people_isactor,people_isdirector
        FROM
            people
        WHERE
            people_id = ' . $_GET['id'];
        $result = mysqli_query($db, $query) or die(mysqli_error($db));
        extract(mysqli_fetch_assoc($result));
    } else {
        //set values to blank
        $people_id = '';
        $people_fullname = '';
        $people_isactor = 0;
        $people_isdirector = 0;
    }
    $action=$_GET['action'];
    
echo <<<ENDHTML
    <html>
        <head>
            <title>
                $action
            </title>
        </head>
        <body>
            <form action="commit.php?action=$action&type=people" method="post">
                <table>
                    <tr>
                        <td>
                            Full Name:
                        </td>
                        <td>
                            <input type="text" name="people_fullname" value="$people_fullname"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Type
                        </td>
                    <td>
                        <select name="people_type">
ENDHTML;
    if ($people_isactor==1){
        echo '<option value="none"></option>';
        echo '<option value="director">Director</option>';
        echo '<option value="actor" selected="selected">Actor</option>';
        $people_isactor=0;
    }
    elseif($people_isdirector==1){
        echo '<option value="none"></option>';
        echo '<option value="director" selected="selected">Director</option>';
        echo '<option value="actor">Actor</option>';
        $people_isdirector=0;
    }
    else{
        echo '<option value="none"></option>';
        echo '<option value="director">Director</option>';
        echo '<option value="actor">Actor</option>';
    }
    
echo<<<ENDHTML
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Type2
                    </td>
                    <td>
                        <select name="people_type2">
ENDHTML;
    if ($people_isactor==1){
        echo '<option value="none"></option>';
        echo '<option value="director">Director</option>';
        echo '<option value="actor" selected="selected">Actor</option>';
    }
    elseif($people_isdirector==1){
        echo '<option value="none"></option>';
        echo '<option value="director" selected="selected">Director</option>';
        echo '<option value="actor">Actor</option>';
    }
    else{
        echo '<option value="none"></option>';
        echo '<option value="director">Director</option>';
        echo '<option value="actor">Actor</option>';
    }
    
echo<<<ENDHTML
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
ENDHTML;
    
    if ($_GET['action'] == 'edit') {
        echo '<input type="hidden" value="' . $_GET['id'] . '" name="people_id"/>';
    }
echo<<<ENDHTML
                        <input type="submit" name="submit" value="$action"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
ENDHTML;

    
?>
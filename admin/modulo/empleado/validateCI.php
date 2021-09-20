<?php
/**
 * Created by PhpStorm.
 * User: TAPIA
 * Date: 22/08/2016
 * Time: 23:33
 */

session_start();

include '../../inc/conexion.php';

/*$response = array(
    'valid' => false,
    'message' => 'Post argument "user" is missing.'
);*/

if( isset($_GET['txtNum_Documento']) ) {
   // $userRepo = new UserRepository( DataStorage::instance() );
    //$user = $userRepo->loadUser( $_POST['idInv'] );
    $numDoc = $_GET['txtNum_Documento'];

    $query = "SELECT docNum FROM empleado WHERE docNum = '$numDoc'";
    $sql = $db->Execute($query);
    $row = $sql->FetchRow();

    if( $numDoc  == $row[0]) {
        // User name is registered on another account
        $response = 'false';
    } else {
        // User name is available
        $response = 'true';
    }
}
echo $response;
?>
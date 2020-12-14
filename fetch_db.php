<?php
include_once('./db.php');
$user_id = 'mhyvvx';
$password = 'H]VU77>';
$query = "SELECT * FROM dbo.UserInfo WHERE EMPUSERID = :user_id";

    $statement = $conn->prepare($query);

    $statement->execute(array(
        ':user_id'=>$user_id
    ));
    //$count = $statement->rowCount();
    $result = $statement->fetchAll();
    echo count($result);
    if(count($result)>0){
    foreach($result as $row){
        $subquery = "SELECT * FROM dbo.UserInfo WHERE EMPUSERID = :user_id AND emploginpassword = :password";

        $subStatement = $conn->prepare($subquery);
        $subStatement->execute(array(
            ':user_id'=>$row['EMPUSERID'],
            ':password'=>$password
        ));

        $output = $subStatement->fetchAll();

        foreach($output as $ans)
        {

            if($subStatement->execute()){

                echo '<br/>'.$ans['emploginpassword'];

                $name = $ans['EmpName'];

                echo '<br/>'.$name;

            }

        }
    }}
?>
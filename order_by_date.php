<?php

    include('./db.php');

    $query = "select TOP 100 JCMDate from dbo.JobCardM join dbo.JobCardD on JobCardD.JCdCodeNew=JobCardM.JCMCodeNew group by JobCardM.JCMDate order by JobCardM.JCMDate desc";

    $statement = $conn->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    $output = '<option selected value="">Select</option>';

    foreach($result as $row)
    {
        $output .= "
            <option class='jcm-date' value='".$row['JCMDate']."'>'".$row['JCMDate']."'</option>
        ";

    }

    echo $output;
?>
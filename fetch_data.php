<?php

    include('./db.php');

    $page = 1;

    $output = '';

    if($_POST['start_date'] == '' and $_POST['end_date'] == '' and $_POST['page_no'] and $_POST['rows']){

        $offset = ($_POST['page_no'] - 1) * $_POST['rows'];

        $query = "SELECT * from dbo.JobCardM join dbo.JobCardD on JobCardD.JCdCodeNew=JobCardM.JCMCodeNew order by JobCardM.JCMDate desc OFFSET $offset ROWS FETCH NEXT ".$_POST['rows']." ROWS ONLY";

        $statement = $conn->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        $i = 1;

        foreach($result as $row)
        {
            if($row['JCMShift']===""){
                $row['JCMShift'] = "NULL";
            }
            $output .= "
            <tr id=".$_POST['page_no']." class='jcm-data'>
                <th scope='row'>".$i."</th>
                <td>".$row['JCMYearNew']."</td>
                <td>".$row['JCMCodeNew']."</td>
                <td>".$row['JCMCode']."</td>
                <td>".$row['JCMDate']."</td>
                <td>".$row['JCMRemarks']."</td>
                <td>".$row['JCMSaveUser']."</td>
                <td>".$row['JCMSaveDate']."</td>
                <td>".$row['JCMUpdateUser']."</td>
                <td>".$row['JCMUpdateDate']."</td>
                <td>".$row['JCMCancel']."</td>
                <td>".$row['JcmYourReference']."</td>
                <td>".$row['JCMShiftIncharge']."</td>
                <td>".$row['JCMShift']."</td>
            </tr>
            ";

            $i++;
        }

        

    }
    
    else if($_POST['start_date'] == '' and $_POST['end_date'] == '' and $_POST['page_no']=='' and $_POST['rows']=='1000' ){

        $query = "SELECT TOP 1000 * from dbo.JobCardM join dbo.JobCardD on JobCardD.JCdCodeNew=JobCardM.JCMCodeNew order by JobCardM.JCMDate desc";

        $statement = $conn->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        $output = '';

        $i = 1;

        foreach($result as $row)
        {
            if($row['JCMShift']===""){
                $row['JCMShift'] = "NULL";
            }
            $output .= "
            <tr>
                <td scope='row'>".$i."</td>
                <td>".$row['JCMYearNew']."</td>
                <td>".$row['JCMCodeNew']."</td>
                <td>".$row['JCMCode']."</td>
                <td>".$row['JCMDate']."</td>
                <td>".$row['JCMRemarks']."</td>
                <td>".$row['JCMSaveUser']."</td>
                <td>".$row['JCMSaveDate']."</td>
                <td>".$row['JCMUpdateUser']."</td>
                <td>".$row['JCMUpdateDate']."</td>
                <td>".$row['JCMCancel']."</td>
                <td>".$row['JcmYourReference']."</td>
                <td>".$row['JCMShiftIncharge']."</td>
                <td>".$row['JCMShift']."</td>
            </tr>
            ";

            $i++;
        }

    }

    else if($_POST['start_date'] and $_POST['end_date'] == '' and $_POST['page_no'] and $_POST['rows']){

        $offset = ($_POST['page_no'] - 1) * $_POST['rows'];

        $query = "SELECT * from dbo.JobCardM join dbo.JobCardD on JobCardD.JCdCodeNew=JobCardM.JCMCodeNew where JobCardM.JCMDate = '".$_POST['start_date']."' order by JobCardM.JCMDate desc OFFSET $offset ROWS FETCH NEXT ".$_POST['rows']." ROWS ONLY";

        $statement = $conn->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        $output = '';

        $i = 1;

        foreach($result as $row)
        {
            if($row['JCMShift']===""){
                $row['JCMShift'] = "NULL";
            }
            $output .= "
            <tr>
                <td scope='row'>".$i."</td>
                <td>".$row['JCMYearNew']."</td>
                <td>".$row['JCMCodeNew']."</td>
                <td>".$row['JCMCode']."</td>
                <td>".$row['JCMDate']."</td>
                <td>".$row['JCMRemarks']."</td>
                <td>".$row['JCMSaveUser']."</td>
                <td>".$row['JCMSaveDate']."</td>
                <td>".$row['JCMUpdateUser']."</td>
                <td>".$row['JCMUpdateDate']."</td>
                <td>".$row['JCMCancel']."</td>
                <td>".$row['JcmYourReference']."</td>
                <td>".$row['JCMShiftIncharge']."</td>
                <td>".$row['JCMShift']."</td>
            </tr>
            ";

            $i++;
        }

    }

    else if($_POST['start_date'] == '' and $_POST['end_date'] and $_POST['page_no'] and $_POST['rows']){

        $offset = ($_POST['page_no'] - 1) * $_POST['rows'];

        $query = "SELECT * from dbo.JobCardM join dbo.JobCardD on JobCardD.JCdCodeNew=JobCardM.JCMCodeNew where JobCardM.JCMDate = '".$_POST['end_date']."' order by JobCardM.JCMDate desc OFFSET $offset ROWS FETCH NEXT ".$_POST['rows']." ROWS ONLY";

        $statement = $conn->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        $output = '';

        $i = 1;

        foreach($result as $row)
        {
            if($row['JCMShift']===""){
                $row['JCMShift'] = "NULL";
            }
            $output .= "
            <tr>
                <td scope='row'>".$i."</td>
                <td>".$row['JCMYearNew']."</td>
                <td>".$row['JCMCodeNew']."</td>
                <td>".$row['JCMCode']."</td>
                <td>".$row['JCMDate']."</td>
                <td>".$row['JCMRemarks']."</td>
                <td>".$row['JCMSaveUser']."</td>
                <td>".$row['JCMSaveDate']."</td>
                <td>".$row['JCMUpdateUser']."</td>
                <td>".$row['JCMUpdateDate']."</td>
                <td>".$row['JCMCancel']."</td>
                <td>".$row['JcmYourReference']."</td>
                <td>".$row['JCMShiftIncharge']."</td>
                <td>".$row['JCMShift']."</td>
            </tr>
            ";

            $i++;
        }

    }

    else if($_POST['start_date'] and $_POST['end_date'] and $_POST['page_no'] and $_POST['rows']){

        $offset = ($_POST['page_no'] - 1) * $_POST['rows'];

        $query = "SELECT * from dbo.JobCardM join dbo.JobCardD on JobCardD.JCdCodeNew=JobCardM.JCMCodeNew where JobCardM.JCMDate >= '".$_POST['start_date']."' and JobCardM.JCMDate <= '".$_POST['end_date']."' order by JobCardM.JCMDate OFFSET $offset ROWS FETCH NEXT ".$_POST['rows']." ROWS ONLY";

        $statement = $conn->prepare($query);

        $statement->execute();

        $result = $statement->fetchAll();

        $output = '';

        $i = 1;

        foreach($result as $row)
        {
            if($row['JCMShift']===""){
                $row['JCMShift'] = "NULL";
            }
            $output .= "
            <tr>
                <td scope='row'>".$i."</td>
                <td>".$row['JCMYearNew']."</td>
                <td>".$row['JCMCodeNew']."</td>
                <td>".$row['JCMCode']."</td>
                <td>".$row['JCMDate']."</td>
                <td>".$row['JCMRemarks']."</td>
                <td>".$row['JCMSaveUser']."</td>
                <td>".$row['JCMSaveDate']."</td>
                <td>".$row['JCMUpdateUser']."</td>
                <td>".$row['JCMUpdateDate']."</td>
                <td>".$row['JCMCancel']."</td>
                <td>".$row['JcmYourReference']."</td>
                <td>".$row['JCMShiftIncharge']."</td>
                <td>".$row['JCMShift']."</td>
            </tr>
            ";

            $i++;
        }

    }

    echo $output;

                /*<td>'".$row['JCMShift']."'</td>
                <td>'".$row['JCMPoNo']."'</td>
                <td>'".$row['JCMPoNoYear']."'</td>
                <td>'".$row['JCMTypeNew']."'</td>
                <td>'".$row['JcDProduct']."'</td>
                <td>'".$row['JcDQty']."'</td>
                <td>'".$row['JcDSerialNo']."'</td>
                <td>'".$row['JCDMachine']."'</td>*/

?>
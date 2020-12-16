<?php

    include('./db.php');

    $query = "select * from dbo.JobCardM join dbo.JobCardD on JobCardD.JCdCodeNew=JobCardM.JCMCodeNew order by JobCardM.JCMDate desc";

    $statement = $conn->prepare($query);

    $statement->execute();

    $row_count = count($statement->fetchAll());

    $total_pages = ceil($row_count/20);

    $output = "<ul class='pagination'>";

    if(isset($_POST['page_no'])){
        
        $page = $_POST['page_no'];
        
    }

    if($page>1){

        $previousPage = $page - 1;

        $output .= "<li class='page-item'><button type='button' class='paginate-data page-link' id='$previousPage' data-pageno='$previousPage'>&laquo</button></li>";

    }

    else{
        
        $output .= '';
        
    }

    $offset = ($page - 1) * 20;

    $limit = $offset + 20;

    if($page==$total_pages){

        $output = "
        <li class='page-item'><button type='button' class='paginate-data active-1 page-link' id='$i' data-pageno='$i'>$i</button></li>
        ";

        $output .= '';
    
    }
    else{

        for($i = $page; $i <= $page+3; $i++){
            
            $activePage = $i - $page + 1;
            
            $output .= "
                <li class='page-item'><button type='button' class='paginate-data active-$activePage page-link' id='$i' data-pageno='$i'>$i</button></li>
            ";
        }

        $nextPage = $page+1;

        $output .="
            <li class='page-item'><button type='button' class='paginate-data page-link' id='$nextPage' data-pageno='$nextPage'>&raquo</button></li>
        ";
    }

    $output .= "</ul>";

    echo $output;

?>
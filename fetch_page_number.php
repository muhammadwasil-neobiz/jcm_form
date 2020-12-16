<?php

    include('./db.php');

    $output = "<ul class='pagination'>";

    $offset = ($_POST['page_no'] - 1) * $_POST['rows'];

    if($_POST['start_date'] and $_POST['end_date']){

        $query = "select * from dbo.JobCardM join dbo.JobCardD on JobCardD.JCdCodeNew=JobCardM.JCMCodeNew where JobCardM.JCMDate >= '".$_POST['start_date']."' and JobCardM.JCMDate <= '".$_POST['end_date']."' order by JobCardM.JCMDate desc";

        $statement = $conn->prepare($query);

        $statement->execute();

        $row_count = count($statement->fetchAll());

        $total_pages = ceil($row_count/$_POST['rows']);

        if(isset($_POST['page_no'])){
            
            $page = $_POST['page_no'];
            
        }

        if($page>1){

            $previousPage = $page - 1;

            $output .= "<li class='page-item'><button type='button' class='paginate-data page-link' id='1' data-pageno='1'>First Page</button></li>
            <li class='page-item'><button type='button' class='paginate-data page-link' id='$previousPage' data-pageno='$previousPage'>&laquo</button></li>";

        }

        else{
            
            $output .= '';
            
        }

        $offset = ($page - 1) * 20;

        $limit = $offset + 20;

        if($page==$total_pages){

            $output .= "
            <li class='page-item'><button type='button' class='paginate-data active-1 page-link' id='$page' data-pageno='$page'>$page</button></li>
            ";
        
        }
        else{

            if($page+1 == $total_pages){

                for($i = $page; $i <= $total_pages; $i++){
                
                    $activePage = $i - $page + 1;
                    
                    $output .= "
                        <li class='page-item'><button type='button' class='paginate-data active-$activePage page-link' id='$i' data-pageno='$i'>$i</button></li>
                    ";
                }    

            }

            else if($page+2 == $total_pages){

                for($i = $page; $i <= $total_pages; $i++){
                
                    $activePage = $i - $page + 1;
                    
                    $output .= "
                        <li class='page-item'><button type='button' class='paginate-data active-$activePage page-link' id='$i' data-pageno='$i'>$i</button></li>
                    ";
                }    

            }

            else{

                for($i = $page; $i <= $page+3; $i++){
                
                    $activePage = $i - $page + 1;
                    
                    $output .= "
                        <li class='page-item'><button type='button' class='paginate-data active-$activePage page-link' id='$i' data-pageno='$i'>$i</button></li>
                    ";
                }

            }

            $nextPage = $page+1;

            $output .="
                <li class='page-item'><button type='button' class='paginate-data page-link' id='$nextPage' data-pageno='$nextPage'>&raquo</button></li>
                <li class='page-item'><button type='button' class='paginate-data page-link' id='$total_pages' data-pageno='$total_pages'>Last Page</button></li>";
        }

    }

    else{

        $query = "select * from dbo.JobCardM join dbo.JobCardD on JobCardD.JCdCodeNew=JobCardM.JCMCodeNew order by JobCardM.JCMDate desc";

        $statement = $conn->prepare($query);

        $statement->execute();

        $row_count = count($statement->fetchAll());

        $total_pages = ceil($row_count/$_POST['rows']);

        if(isset($_POST['page_no'])){
            
            $page = $_POST['page_no'];
            
        }

        if($page>1){

            $previousPage = $page - 1;

            $output .= "<li class='page-item'><button type='button' class='paginate-data page-link' id='1' data-pageno='1'>First Page</button></li>
            <li class='page-item'><button type='button' class='paginate-data page-link' id='$previousPage' data-pageno='$previousPage'>&laquo</button></li>";

        }

        else{
            
            $output .= '';
            
        }

        $offset = ($page - 1) * 20;

        $limit = $offset + 20;

        if($page==$total_pages){

            $output .= "
            <li class='page-item'><button type='button' class='paginate-data active-1 page-link' id='$total_pages' data-pageno='$total_pages'>$total_pages</button></li>
            ";

            $output .= '';
        
        }
        else{

            if($page+1 == $total_pages){

                for($i = $page; $i <= $total_pages; $i++){
                
                    $activePage = $i - $page + 1;
                    
                    $output .= "
                        <li class='page-item'><button type='button' class='paginate-data active-$activePage page-link' id='$i' data-pageno='$i'>$i</button></li>
                    ";
                }    

            }

            else if($page+2 == $total_pages){

                for($i = $page; $i <= $total_pages; $i++){
                
                    $activePage = $i - $page + 1;
                    
                    $output .= "
                        <li class='page-item'><button type='button' class='paginate-data active-$activePage page-link' id='$i' data-pageno='$i'>$i</button></li>
                    ";
                }    

            }

            else{

                for($i = $page; $i <= $page+3; $i++){
                
                    $activePage = $i - $page + 1;
                    
                    $output .= "
                        <li class='page-item'><button type='button' class='paginate-data active-$activePage page-link' id='$i' data-pageno='$i'>$i</button></li>
                    ";
                }

            }

            $nextPage = $page+1;

            $output .="
                <li class='page-item'><button type='button' class='paginate-data page-link' id='$nextPage' data-pageno='$nextPage'>&raquo</button></li>
                <li class='page-item'><button type='button' class='paginate-data page-link' id='$total_pages' data-pageno='$total_pages'>Last Page</button></li>";
        }

    }

    $output .= "</ul>";

    echo $output;

?>
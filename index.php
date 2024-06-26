<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'functions.php';

$recordxPagOptions=getConfig("recordxPagOptions", [15,20,25,30]);
$recordxPageDefault=getConfig('recordxPage', 10);
$recordxPage=(int)getParam('recordxPage',$recordxPageDefault );
$search=getParam('search', '' );
$search=strip_tags(trim($search));
$orderByColumns = getConfig('orderByColumns', []);
$orderBy = getParam('orderBy', 'name');
$orderBy=in_array($orderBy,$orderByColumns )? $orderBy : null;


require_once 'parts/top.php';
require_once 'parts/nav.php';


?>
    


<!-- Begin page content -->
<main class="flex-shrink-0">
  <div class="container">
    <h1>user managment</h1>
    <?php 
    $action=getParam('action');
    
    switch($action)

      {


        default:

            $orderByColumns = getConfig('orderByColumns', []);
            $orderBy = getParam('orderBy', 'id');
            
            $orderBy = in_array($orderBy, $orderByColumns) ? $orderBy : null;

            $params = [
                'orderBy' => $orderBy,
                'recordxPage' => $recordxPage,
                
                'search' => $search
            ];
            require 'parts/userList.php';
            $users = getUsers($params);
            
            require 'parts/userList.php';
            break;
    }
    ?>

</div>
</main>

<?php
require_once 'parts/footer.php';
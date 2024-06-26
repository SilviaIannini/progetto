  <?php
   $currentUrl=$_SERVER['PHP_SELF'];
   $indexPage='index.php';
   $action=$_GET['action']??'';
   $indexActive=!$action?'active':'';
   $newActive= $action ==='insert'? 'active':'';
  ?>
   <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><i class="fa-solid fa-user"></i></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="<?=$indexPage?>">user</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=$indexPage?>?action=insert">New user</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
          </li>
        </ul>
        <form class="d-flex"   method="GET" role="search" id="searchForm">
        <input type="hidden" name="orderBy" value="<?= $orderBy ?>">
        
          <select name="recordxPage" id="recordxPage" onchange="document.forms.searchForm.submit()">
           
<option value="">SELECT</option>
<?php 
foreach($recordxPagOptions as $value){
  $value=(int)$value;
  $selected=$value===$recordxPage? 'selected': '';
  echo "<option $selected value='$value'>$value</option> \n";
}
?>
          </select>
          <input class="form-control me-2" type="search" value="<?= $search ?>" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>
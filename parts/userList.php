<?php 
$param="search=$search&recordxPage=$recordxPage";
?>
<table class="table table-dark table-striped">
    <caption>USER</caption>
    <thead>
        <tr>
            <th class="<?= $orderBy === 'id'?>"> <a href="orderBy=username<?= $orderBy ?>"> ID</a></th>
            <th class="<?= $orderBy === 'username'?>" ><a href="orderBy=username<?= $orderBy ?>"> NAME </a></th>
            <th class="<?= $orderBy === 'fiscalcode'?>"><a href="orderBy=fiscalcode<?= $orderBy ?>">FISCALCODE </a></th>
            <th class="<?= $orderBy === 'email'?> "> <a href="orderBy=email<?= $orderBy?>">EMAIL </a></th>
            <th class="<?= $orderBy === 'age'?>"> <a href=" orderBy=age<?= $orderBy ?>"> AGE</a></th>
        </tr>
    </thead>
    <tbody>
     <?php 

     if($users){
     foreach($users as $user){ ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['fiscalcode'] ?></td>
            <td><a href="mailto:<?= $user['email'] ?>"> <?= $user['email'] ?></a></td>
            <td><?= $user['age'] ?></td>




     </tr>
     <?php 
     }} else { ?>
       <tr>
                <td class="text-center" colspan="5">
                    <div class="alert alert-danger"> NO RECORDS FOUND</div>
                </td>
            </tr>
        <?php
        }


     ;?>
     
     
     
 
    </tbody>
</table>
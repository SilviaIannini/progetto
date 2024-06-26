<?php 
require_once 'connection.php';


function getConfig($params, $default = null){

    $config=require 'config.php';
   
    return  $config[$params]?? $default;
}
function getParam($params,$default=''){
    return $_REQUEST[$params]?? $default;
}
//funzione per generare nome e cognome random
function getRandName(){
    $names=[
        'Carlo', 'Lorenzo','Giulia', 'Silvia'
    ];
    $lastnames=['Picarazzi','Giuliani','Motta','Iannini'
];
$rand1=mt_rand(0,count($names)-1);
$rand2=mt_rand(0,count($lastnames)-1);
return $names[$rand1].' '.$lastnames[$rand2];
};
//echo getRandName();
function getRandEmail($name){
    $domains=['google.com','yahoo.com','hotmail.com','libero.it'];
    $rand1=mt_rand(0,count($domains)-1);
    return str_replace(' ','.', $name ).mt_rand(10,99).'@'.$domains[$rand1];
};
//echo getRandEmail(getRandName());
function getRandFiscalCode(){
    $i=16;
    $res='';
    while($i> 0){
        $res.=chr(mt_rand(65,90));
        $i--;

    } return $res;
};
function getRandAge(){
    return mt_rand(16,80);
}
//echo getRandFiscalCode();

function insertRandUser($totale,mysqli $conn){
    while($totale>0){
    $username =getRandName();
    $email=getRandEmail($username);
    $age=getRandAge();
    $fiscalcode=getRandFiscalCode();
    $sql='INSERT INTO users(username,email,fiscalcode,age) VALUES';
    $sql.="('$username', '$email','$fiscalcode','$age')";
    echo $totale.' '.$sql. '<br>';
    $res=$conn->query($sql);
    if(!$res){
        echo $conn-> error. '<br>';
    }else{

        $totale--;
    }
};


};

function getUsers(array $params = [])
{

   
     // @var $conn mysqli
     

    $conn = $GLOBALS['mysqli'];

    $record = [];

    $limit = $params['recordxPage'] ?? 10;
    $orderBy = $params['orderBy'] ?? 'id ';
   
    $search = $params['search'] ?? '';

    $sql  = 'SELECT * FROM users';
   
    if ($search) {
       
        $sql .= ' WHERE';
       if (is_numeric($search)){
        
          
           
            $sql .= " (id = $search OR age = $search)";
        } else {
           $sql .= " (fiscalcode like = " %$search% " OR email like = "%$search% " OR username like = " %$search%"
            )";
        }
   }

    $sql .= " ORDER BY $orderBy LIMIT 0,$limit ";
   echo $sql;
    $res = $conn->query($sql);

    if ($res) {

        while ($row = $res->fetch_assoc()) {
            $record[] = $row;
        }
    }

    return $record;
}
function dd(mixed $data = null)
{
    var_dump($data);
    die;
}
<?php 

function inserirUsuario($conn,$nomeusu,$emailusu,$foneusu,
$cpfusu,$cepusu,$numusu,$compleusu,$tipousu,$senhausu,$pinusu){

$salto = ['cost' => 8];

    $senhacrip = password_hash($senhausu,PASSWORD_BCRYPT,$salto);

    $query= "INSERT INTO `tbusuario` (`idusu`, `nomeusu`, `emailusu`, `tipousu`,
     `cpfusu`, `cepusu`, `numusu`, `compleusu`, `foneusu`,`senhausu`,`pinusu`) VALUES (NULL,
     '{$nomeusu} ', '{$emailusu}', '{$tipousu}', '{$cpfusu}', 
     '{$cepusu}', '{$numusu}', '{$compleusu}', '{$foneusu}','{$senhacrip}','{$pinusu}')";

    $dados = mysqli_query ($conn,$query);
    return $dados;

}

function visuUsuarioNome ($conn,$nomeusu){
   $query ="select * from tbusuario where nomeusu like '%{$nomeusu}%'";
   $resultado = mysqli_query ($conn,$query);
   
   return $resultado;

}

function visuUsuarioEmail($conn,$emailusu){
    $query ="select * from tbusuario where emailusu like '%{$emailusu}%'";
    $resultado = mysqli_query ($conn,$query);
    
    return $resultado;
}

function visuUsuarioCodigo($conn,$codigousu){
    $query ="select * from tbusuario where idusu = $codigousu";
    $resultado = mysqli_query ($conn,$query);
    $resultado = mysqli_fetch_array($resultado);
    return $resultado;
}   

function alterarUsuario($conn,$codigousu,$nomeusu,$emailusu,$foneusu,
$cpfusu,$cepusu,$numusu,$compleusu,$tipousu,$senhacrip,$pinusu){
$query="update tbusuario set 
nomeusu ='{$nomeusu}',
emailusu ='{$emailusu}',
tipousu ='{$tipousu}',
cpfusu ='{$cpfusu}', 
cepusu ='{$cepusu}', 
numusu ='{$numusu}', 
compleusu ='{$compleusu}', 
foneusu ='{$foneusu}',
senhausu='{$senhacrip}',
pinusu='{$pinusu}'where idusu = '{$codigousu}'";

$resultado = mysqli_query ($conn,$query);
return $resultado;
}

function deletarUsuario($conn,$codigousu){

    $query ="delete from tbusuario where idusu='{$codigousu}'";
    $resultado = mysqli_query($conn,$query);
    return $resultado;

}

?>  
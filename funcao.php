<?php


    if(empty($_POST['cpf'])){
            echo "Digite os números do Cpf a ser analisado";
    } elseif (!empty($_POST['cpf'])){    
    $cpf = $_POST['cpf']; 
    function validar($cpf){ 
    //Extraindo somento os numeros e excluindo os pontos e barras   
    $cpf = preg_replace('/[^0-9]/is', '', $cpf);

    //Verificar se foi informado todos os digitos corretamente
    if(strlen($cpf) != 11){
        return false;
    }


    //Verificando se foi informada uma sequencia de digitos repetidos
    if(preg_match('/(\d) \1{10}/', $cpf)){
        return false;
    }

    //Realizando o calculo
    for($i = 9; $i < 11; $i++){
        for($j = 0, $c = 0; $c < $i; $c++){
            $j += $cpf{$c} * (($i +1) - $c);
        }
        $j = (((10 * $j) %11) %10);
        if($cpf{$c} != $j){
            return false;
        }
    }
    return true;
   }

   if( validar($cpf) == true){
        echo "Cpf valido";
   } else {
       echo "Cpf invalido";
   }

}

?>

   <form action="" method="POST">
        <input type="number" name="cpf">
        <input type="submit" Value="Validar Documento">
   </form>

 
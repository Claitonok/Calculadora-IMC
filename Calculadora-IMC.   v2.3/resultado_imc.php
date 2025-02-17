<?php

$peso =  strip_tags($_POST["peso"]);
$altura = strip_tags($_POST["altura"]);
$Feminino = strip_tags($_POST["Feminino"]);
$Masculino = strip_tags($_POST["Masculino"]);

$valor_imc = calculaIMC($peso, $altura);

function calculaIMC($peso, $altura)
{
    $imc = $peso / ($altura * $altura);
    return $imc;
}

//desafio do tio: Criar um método de classificação, 
//baseado neste link: https://arquivos.sbn.org.br/equacoes/eq5.htm 
function classificaIMC($imc)
{
    $classificacao = "";
    if ($imc <= 16) {
        $classificacao = "Magreza grau III";
    } elseif ($imc >= 16 && $imc <= 16.9) {
        $classificacao = "Magreza grau II";
    } elseif ($imc >= 16.9 && $imc <= 18.4) {
        $classificacao = "Magreza grau I";
    } elseif ($imc >= 18.4 && $imc <= 24.9) {
        $classificacao = "Adequado";
    } elseif ($imc >= 24.9 && $imc <= 29.9) {
        $classificacao = "Pré-obeso";
    } elseif ($imc >= 29.9 && $imc <= 34.9) {
        $classificacao = "Obesidade grau I";
    } elseif ($imc >= 34.9 && $imc <= 39.9) {
        $classificacao = "Obesidade grau II";
    } elseif ($imc >= 39.9 && $imc <= 40) {
        $classificacao = "Obesidade grau III";
    }

    return $classificacao;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="ICON" type="ICON" sizes="16x16" href="./img/Calculator_31111.ico">
    <link rel="stylesheet" href="./css/resultado.css">
    <title>Resultado do IMC</title>
</head>
<body>


<form action="/" method="post">

<img src="./img/imagemIMC.jpeg" width="360" height="250">

<h2>Calculadora IMC - Resultados</h2>

<div class="cabeca">
        <hr>
            <p><b>Peso informado: </b><?= $peso ?> kg</p>
            <p><b>Altura informada: </b><?= number_format($altura, 2, ',')?> m</p>
            <p><b>IMC: </b><?= number_format($valor_imc, 2, ',')?></p>
            <p><b>Classificação: </b> <?= classificaIMC($valor_imc)?></p>
        <hr>
</div>

<?php if($Feminino == 'on' | $Masculino == 'on'): ?>
    <div class="checkbox">
       <p><b> Feminino: </b><?php echo $Feminino?></p>
       <p><b> Masculino: </b><?php echo $Masculino?></p>
    </div>
    <?php else: ?>
<h3>Não foi informado o sexo</h3>
<?php endif;?>

 <div class="button">
     <button type="submit" class="btn btn-success">INICIO</button>
 </div>

 <div class="formula">
    <!-- MANEIRA DE BAIXAR UM ARQUIVO NO COMPUTADOR -->
    <a href="./img/Formula do IMC.jpeg" download="formula">Baixe a formula do IMC</a>
 </div>

</form>


</body>
</html>

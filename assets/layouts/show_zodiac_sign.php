<?php
$xml = simplexml_load_file('signos.xml');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data_nascimento = $_POST['data_nascimento'];

    $dia = (int) date("d", strtotime($data_nascimento));
    $mes = (int) date("m", strtotime($data_nascimento));

    $signoEncontrado = null;


    foreach ($xml->signo as $signo) {
        list($diaInicio, $mesInicio) = explode("/", $signo->dataInicio);
        list($diaFim, $mesFim) = explode("/", $signo->dataFim);

        if (($mes == $mesInicio && $dia >= $diaInicio) || ($mes == $mesFim && $dia <= $diaFim)) {
            $signoEncontrado = $signo; 
            break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signos</title>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1534796636912-3b95b3ab5986?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8YyVDMyVBOXUlMjBlc3RyZWxhZG98ZW58MHx8MHx8fDA%3D'); 
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white; 
        }

        .signo {
            font-size: 36px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            margin-bottom: 20px;
            text-align: center;
        }

        .btn-voltar {
            padding: 10px 20px;
            font-size: 20px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin-top: 20px;
            position: relative;
            left: 40%;
            top: 90%;
        }

        .btn-voltar:hover {
            background-color: rgba(255, 255, 255, 0.5);
            color: black;
        }

        .simbolo {
            margin-right: 10px;
            font-size: 36px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <?php if (isset($signoEncontrado)): ?>
        <div class='signo'>
            <strong><?php echo $signoEncontrado->signoNome; ?></strong><br>
            <?php echo $signoEncontrado->dataInicio; ?> a <?php echo $signoEncontrado->dataFim; ?><br>
            <?php echo $signoEncontrado->descricao; ?>
        </div>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <div class='signo'>
            <strong>Signo não encontrado!</strong><br>
            Verifique a data de nascimento informada.
        </div>
    <?php endif; ?>

    <a href="index.php" class="btn-voltar">Voltar ao Início</a>
</div>

</body>
</html>

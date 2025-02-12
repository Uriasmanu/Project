<?php
    // Incluindo o header.php
    include('header.php');
?>

<div class="container mt-5">
    <h2>Seu Signo</h2>

    <?php
    // Recebendo a data de nascimento do formulário
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data_nascimento = $_POST['data_nascimento'];

        // Exibindo a data recebida
        echo "<p>Data de nascimento: " . $data_nascimento . "</p>";

        // Processamento para descobrir o signo (com base na data)
        $dia = (int) date("d", strtotime($data_nascimento));
        $mes = (int) date("m", strtotime($data_nascimento));

        // Array de signos e suas datas
        $signos = [
            ["nome" => "Áries", "inicio" => "21/03", "fim" => "20/04"],
            ["nome" => "Touro", "inicio" => "21/04", "fim" => "20/05"],
            ["nome" => "Gêmeos", "inicio" => "21/05", "fim" => "20/06"],
            ["nome" => "Câncer", "inicio" => "21/06", "fim" => "22/07"],
            ["nome" => "Leão", "inicio" => "23/07", "fim" => "22/08"],
            ["nome" => "Virgem", "inicio" => "23/08", "fim" => "22/09"],
            ["nome" => "Libra", "inicio" => "23/09", "fim" => "22/10"],
            ["nome" => "Escorpião", "inicio" => "23/10", "fim" => "21/11"],
            ["nome" => "Sagitário", "inicio" => "22/11", "fim" => "21/12"],
            ["nome" => "Capricórnio", "inicio" => "22/12", "fim" => "20/01"],
            ["nome" => "Aquário", "inicio" => "21/01", "fim" => "18/02"],
            ["nome" => "Peixes", "inicio" => "19/02", "fim" => "20/03"],
        ];

        // Loop para determinar o signo com base na data de nascimento
        foreach ($signos as $signo) {
            list($diaInicio, $mesInicio) = explode("/", $signo["inicio"]);
            list($diaFim, $mesFim) = explode("/", $signo["fim"]);

            if (($mes == $mesInicio && $dia >= $diaInicio) || ($mes == $mesFim && $dia <= $diaFim)) {
                echo "<p class='alert alert-info'>Seu signo é <strong>{$signo["nome"]}</strong>!</p>";
                break;
            }
        }
    }
    ?>

    <a href="index.php" class="btn btn-secondary">Voltar</a>
</div>

</body>
</html>

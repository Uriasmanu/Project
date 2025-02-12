<?php include('header.php'); ?>

<div class="container mt-5">
    <h1 class="text-center">Descubra Seu Signo!</h1>
    <p class="text-center">Insira sua data de nascimento para descobrir qual é o seu signo do zodíaco.</p>

    <!-- Formulário -->
    <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="w-50 mx-auto bg-light p-4 rounded shadow">
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Descobrir Signo</button>
    </form>
</div>

</body>
</html>

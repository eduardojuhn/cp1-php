<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CP php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="text-bg-light">
    <div class="container text-center">
        <div class="col mt-5">
            <h3>Calculadora de Salário Líquido com dedução de INSS, Dependentes e IRRF</h3>
        </div>

        <div class="row-4">
            <div class="col mt-5">
            <form method="GET">
                    <div class="mb-4">
                        <label for="salario" class="form-control-label pb-3">Salário</label>
                        <input type="number" class="form-control" id="salario" name="salario" placeholder="Digite o seu salário">
                    </div>
                    <div class="mb-4">
                        <label for="dependentes" class="form-control-label pb-3">Número de Dependentes</label>
                        <input type="number" class="form-control" id="dependentes" name="dependentes" placeholder="Digite o número de dependentes">
                    </div>
                    <button type="submit" class="btn btn-dark mb-4">Calcular</button>
                </form>

                <?php
                include "eduardo-calculosalario.php";

                if(isset($_GET["salario"]) && isset($_GET["dependentes"])) {
                echo calcularINSS();
                }

                ?>
         </div>
            </div>
</div>

    

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
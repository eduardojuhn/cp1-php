<?php
    function calcularINSS(){
        $salario = $_GET['salario'];
        $inss = 0;
        $aliquota = 0;

        $primeiraFaixa = 97.65;
        $segundaFaixa = 114.23;
        $terceiraFaixa = 154.27;

        if($salario <= 1302.00){
            $aliquota = $salario * 0.075;
            $salarioSemInss = $salario - $aliquota;
        } else if ($salario <= 2571.29) {
            $aliquota = $primeiraFaixa + (($salario - 1302.00) * 0.09);
            $salarioSemInss = $salario - $aliquota;
        } else if ($salario <= 3856.94) {
            $aliquota = $primeiraFaixa + $segundaFaixa + (($salario - 2571.29) * 0.12);
            $salarioSemInss = $salario - $aliquota;
        } else if ($salario <= 7507.49) {
            $aliquota = $primeiraFaixa + $segundaFaixa + $terceiraFaixa + (($salario - 3856.94) * 0.14);
            $salarioSemInss = $salario - $aliquota;
        } else {
            $salarioSemInss = $salario - 877.24;
        }

        return calcularIRRF($salarioSemInss, $aliquota);
    }

    function calcularIRRF($salarioSemInss, $aliquota){
        $dependentes = $_GET['dependentes'];
        $irrf = 0;
        $valorLiquido = 0;

        $valorIR1 = $salarioSemInss;
        $valorIR2 = $valorIR1 - ($dependentes * 189.59);

        switch(true){
            case($valorIR1 <= 1903.98);
                $irrf = 0;
                break;
            case($valorIR2 <= 2826.65);
                $irrf = ($valorIR2 * 0.075) - 142.80;
                break;
            case($valorIR2 <= 3751.05);
                $irrf = ($valorIR2 * 0.15) - 354.80;
                break;
            case($valorIR2 <= 4664.68);
                $irrf = ($valorIR2 * 0.225) - 636.13;
                break;
            default:
                $irrf = ($valorIR2 * 0.275) - 869.36;
        }

        $valorLiquido = $salarioSemInss - $irrf;

        return "<br> Valor de IRRF é: " . round($irrf, 2) .
  "<br> Valor do INSS é: " . round($aliquota, 2) . 
  "<br> O salario liquido é: " . round($valorLiquido, 2) ;
    }

?>
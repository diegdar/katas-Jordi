<?php 
declare(strict_types=1);

function juego_numeros_vivos(int $num):int
{
    $count = 0;
    $resultNums = [];
    while($num !== 1){
        $count++;
        if ($num === 0) {
        throw new InvalidArgumentException( "El numero termina en 0 y no en 1");
        }elseif(strpos((string)$num, '5') !== false){            
            $num = (int)str_replace('5','0', (string)$num);
        }elseif($num % 2 === 0){
            $num /= 2;
        }else{
            $num += 3;
        }

        if (in_array($num, $resultNums)) {
            throw new InvalidArgumentException( "El bucle tiende a ser infinito");
        }
        $resultNums[] = $num;
    }

    return $count;
}

// echo juego_numeros_vivos(3);


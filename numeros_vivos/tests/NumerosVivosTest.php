<?php 
declare(strict_types=1);

require __DIR__ . '/../../numeros_vivos/index.php';

use PHPUnit\Framework\TestCase;


class NumerosVivosTest extends TestCase {
    
    public function testEvenNumberIsDividedByTwo() {
        $this->assertEquals(1, juego_numeros_vivos(2));
    }

    public function testNumberWithFiveThrowsExceptionOnZero() {
        $this->expectException(InvalidArgumentException::class);juego_numeros_vivos(15);// 15 -> 10 -> 5 -> 0   (lanzará la excepción)
    }

    public function testMixedRulesThrowsExceptionOnZero() {
        $this->expectException(InvalidArgumentException::class);
        juego_numeros_vivos(14); // 14 -> 7 -> 10 -> 5 -> 0 (lanzará la excepción)
    }

    public function testAlreadyOneReturnsZeroSteps() {
        $this->assertEquals(0, juego_numeros_vivos(1));
    }

    public function testInfiniteLoopThrowsException(){
        $this->expectException(InvalidArgumentException::class);
        juego_numeros_vivos(3);// 3->6->3... (lanzará la excepción)
    }
}

<?php 
declare(strict_types=1);

require __DIR__ . '/../Caminos_del_Explorador/Explorer.php';

use PHPUnit\Framework\TestCase;


class caminosDelExploradorTest extends TestCase {

    protected Explorer $explorer;

    public function setUp(): void
    {
        parent::setUp();
        $this->explorer = new Explorer();
    }  

    public function testCaninstantiateExplorer()
    {
        $this->assertInstanceOf(Explorer::class, new Explorer);
    }

    public function testExplorerCanMove_1StepToNorth()
    {
        $this->expectExceptionMessage("Perdido en la Aventura");
        $this->explorer->caminosDelExplorador(movimientos: ['N']);
    }

    public function testExplorerCanReturnToTheSamePointHeStarted()
    {
        $this->expectExceptionMessage("Exploración Completa");
        $this->explorer->caminosDelExplorador(movimientos: ['N', 'E', 'S', 'O']);
    }
    public function testExplorerCanMoveMoreThan_10Steps()
    {
        $values = ['N', 'E', 'S', 'O'];
        $twelveMovements = array_map(callback: function() use       ($values): string {
            return $values[array_rand(array: $values)];
            }, 
            array: range(start: 1, end: 12)//range: Esta función genera un array con números del 1 al 12. Aunque estos números no se usan en el cuerpo de la función anónima, simplemente actúan como un placeholder para que array_map ejecute la función 12 veces.

        );
        
        $this->expectExceptionMessage("Demasiado lejos");
        $this->explorer->caminosDelExplorador(movimientos: $twelveMovements);
    }

    public function testCanShowAnExceptionWhithNumberValues()
    {        
        $this->expectException(InvalidArgumentException::class);
        $this->explorer->caminosDelExplorador(movimientos: [3, "N"]);
    }

    public function testCanshowAnExceptionWhitInvalidValues()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->explorer->caminosDelExplorador(movimientos: ["N", "T", "O"]);
    }


}


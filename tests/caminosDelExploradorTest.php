<?php
declare(strict_types=1);

require __DIR__ . '/../Caminos_del_Explorador/Explorer.php';

use PHPUnit\Framework\TestCase;

class CaminosDelExploradorTest extends TestCase {

    protected Explorer $explorer;

    public function setUp(): void
    {
        parent::setUp();
        $this->explorer = new Explorer();
    }  

    public function test_can_instantiate_explorer()
    {
        $this->assertInstanceOf(Explorer::class, new Explorer());
    }

    public function test_explorer_can_move_1_step_to_north()
    {
        $this->assertEquals("Perdido en la Aventura", $this->explorer->caminosDelExplorador(movements: ['N']));
    }

    public function test_explorer_can_return_to_the_same_point_he_started()
    {
        $this->assertEquals("Exploración Completa",
        $this->explorer->caminosDelExplorador(movements: ['N', 'E', 'S', 'O']));
    }
    
    public function test_explorer_can_move_more_than_10_steps()
    {
        $values = ['N', 'E', 'S', 'O'];
        $twelveMovements = array_map(function() use ($values): string {
            return $values[array_rand($values)];
            }, 
            range(1, 12)
        );
        
        $this->assertEquals("Demasiado lejos", 
        $this->explorer->caminosDelExplorador(movements: $twelveMovements));
    }

    public function test_can_show_an_exception_with_number_values()
    {        
        $this->expectException(InvalidArgumentException::class);
        $this->explorer->caminosDelExplorador(movements: [3, "N"]);
    }

    public function test_can_show_an_exception_with_invalid_values()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->explorer->caminosDelExplorador(movements: ["N", "T", "O"]);
    }

    public function test_can_allow_lower_case_in_input_values()
    {
        $this->assertEquals("Exploración Completa",
        $this->explorer->caminosDelExplorador(movements: ['n', 'E', 's', 'O']));
    }
}

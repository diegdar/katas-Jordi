<?php 
declare(strict_types=1);

class Explorer{

    const START_POSITION = ['x'=> 0, 'y'=> 0];
    const MOVEMENTS = ['N', 'S', 'E', 'O'];
    private int $x = 0;
    private int $y = 0;
    private int $movementNumber = 0;


    public function caminosDelExplorador(array $movements): string
    {
        $upperMovements = array_map(strtoupper(...), $movements);
        foreach ($upperMovements as $movement) {
            if(!in_array($movement, self::MOVEMENTS)){
                throw new InvalidArgumentException("Los valores introducidos deben ser: N, S, E, o 0");
            }
            $this->makeAMovement(movement: $movement);
            $this->movementNumber++;
        }

        return $this->getActualExplorerPosition();    
    }

    private function makeAMovement(string $movement)
    {                
        $upperMovement = strtoupper(string: $movement);
        match (true) {
             $upperMovement === 'N'=> $this->x += 1,
             $upperMovement === 'S'=> $this->x += -1,
             $upperMovement === 'E'=> $this->y += 1,
             $upperMovement === 'O'=> $this->y += -1,
        };
    }

    private function getActualExplorerPosition(): string
    {
        if ($this->movementNumber > 10) {
            return "Demasiado lejos";
        } elseif (
            $this->x === self::START_POSITION['x'] 
            && $this->y === self::START_POSITION['y']
        ){
            return "Exploración Completa";
        } else {
            return "Perdido en la Aventura";
        }
    }
}

// $explorer = new Explorer();
// $input = ['N', 'E', 'S', 'O'];
// echo $explorer->caminosDelExplorador($input);

# Fuente:
[we jordi-Mentor][https://www.programador-web.com/2024/10/03/kata-caminos-del-explorador/]

# Objetivo: 
Imagina que eres un explorador que viaja por una cuadrícula. Tu objetivo es trazar el camino correcto siguiendo ciertas reglas específicas. El propósito de esta kata es evaluar la lógica condicional y el control de flujo del programador.

Dado un array de movimientos (N, S, E, O para Norte, Sur, Este, Oeste), se debe determinar si el explorador termina en el mismo punto en que empezó.
Si el explorador termina en el mismo punto, devolver "Exploración Completa".
Si el explorador termina en una posición diferente, devolver "Perdido en la Aventura".
Si los movimientos superan los 10 pasos, sin importar la posición final, devolver "Demasiado lejos".

# Reglas para el movimiento:

Partes desde el punto (0, 0).
N incrementa la coordenada y en 1.
S decrementa la coordenada y en 1.
E incrementa la coordenada x en 1.
O decrementa la coordenada x en 1.


# Requisitos adicionales:

## Crea una función llamada caminosDelExplorador:
(movimientos) que reciba un array de caracteres (movimientos).
Devuelve la descripción correspondiente según las reglas mencionadas.
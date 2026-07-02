/**
 * Suma dos números
 * @param {number} a - Primer número
 * @param {number} b - Segundo número
 * @returns {number} La suma de a y b
 */
function sumar(a, b) {
    return a + b;
}

/**
 * Resta el segundo número al primero
 * @param {number} a - Número base (minuendo)
 * @param {number} b - Número a restar (sustraendo)
 * @returns {number} La diferencia entre a y b
 */
function restar(a, b) {
    return a - b;
}

/**
 * Multiplica dos números
 * @param {number} a - Primer factor
 * @param {number} b - Segundo factor
 * @returns {number} El producto de a y b
 */
function multiplicar(a, b) {
    return a * b;
}

/**
 * Divide el primer número entre el segundo
 * @param {number} a - Dividendo
 * @param {number} b - Divisor
 * @returns {number|string} El cociente de la división o un mensaje de error si b es 0
 */
function dividir(a, b) {
    // Verifica si el divisor es cero para evitar errores matemáticos
    if (b === 0) {
        return "Error: División por cero";
    }
    return a / b;
}

/**
 * Realiza las cuatro operaciones matemáticas básicas (suma, resta, multiplicación, división)
 * @param {number} a - Primer número
 * @param {number} b - Segundo número
 * @returns {Object} Un objeto que contiene los resultados de las cuatro operaciones
 */
function calcularTodo(a, b) {
    // Retorna un objeto con los resultados de las cuatro operaciones
    return {
        suma: sumar(a, b),
        resta: restar(a, b),
        multiplicacion: multiplicar(a, b),
        division: dividir(a, b)
    };
}

// Ejecuta la función principal y muestra el resultado en la consola
console.log(calcularTodo(10, 5));
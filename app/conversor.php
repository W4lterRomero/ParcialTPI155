<?php
$temperaturea = '';
$conertir = '';
$error = '';
$resultado = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $temperature = $_POST['temperature'] ?? '';
    $conertir = $_POST['conertir'] ?? '';

    // Validar que la temperatura sea un número decimal
    if (!is_numeric($temperature)) {
        $error = "Por favor, ingrese un número decimal válido para la temperatura.";
    } elseif ($conertir !== 'c2f' && $conertir !== 'f2c') {
        $error = "Seleccione un tipo de conversión válido.";
    } else {
        if ($conertir === 'c2f') {
            // Celsius a Fahrenheit
            $resultado = ($temperature * 9/5) + 32;
            $resultado = "{$temperature} °C = {$resultado} °F";
        } else {
            // Fahrenheit a Celsius
            $resultado = ($temperature - 32) * 5/9;
            $resultado = "{$temperature} °F = {$resultado} °C";
        }
    }
}
?>

<form method="post">
    <label for="temperature">Temperatura:</label>
    <input type="text" name="temperature" id="temperature" >
    <br>
    <label for="conertir">Conversión:</label>
    <select name="conertir" id="conertir">
        <option value="c2f" <?php if ($conertir === 'c2f') echo 'selected'; ?>>Celsius a Fahrenheit</option>
        <option value="f2c" <?php if ($conertir === 'f2c') echo 'selected'; ?>>Fahrenheit a Celsius</option>
    </select>
    <br>
    <button type="submit">Convertir</button>
</form>

<?php if ($error): ?>
    <p style="color:red;"><?php echo $error; ?></p>
<?php elseif ($resultado): ?>
    <p style="color:green;"><?php echo $resultado; ?></p>
<?php endif; ?>

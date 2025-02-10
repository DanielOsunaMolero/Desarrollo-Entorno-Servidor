<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <select name="tipo" id="tipo">
            <option value="Piso">Piso</option>
            <option value="Adosado">Adosado</option>
            <option value="Chalet">Chalet</option>
            <option value="Casa">Casa</option>
        </select>
        Desplegable con opciones 

        <br></br>
        <label for="zona">Zona:</label>
        <select name="zona" id="zona">
            <option value="Centro">Centro</option>
            <option value="Zaidín">Zaidín</option>
            <option value="Chana">Chana</option>
            <option value="Albaicín">Albaicín</option>
            <option value="Sacromonte">Sacromonte</option>
            <option value="Realejo">Realejo</option>
        </select>
        Desplegable con opciones 
        <br></br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" id="direccion" required>
        un label normal con su correspondiente imput

        <br>
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" required>
        el step es para poner un predeterminado
        <br>
        <label>Extras:</label>
        <label>Piscina <input type="checkbox" name="extras[]" value="Piscina"></label>
        <label>Jardin <input type="checkbox" name="extras[]" value="Jardín"></label>
        <label>Garaje <input type="checkbox" name="extras[]" value="Garaje"></label>
        <br>
        un check box para escoger

        <label for="observaciones">Observaciones:</label>
        <textarea name="observaciones" id="observaciones"></textarea>
        <br>
        textarea para escribir

        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre"><br><br>
        label normal

        <button>Enviar</button>
</body>
</html>
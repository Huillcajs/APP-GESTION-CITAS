<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Iniciar sesion</h2>
    @if(session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif
    <form action="/login" method="POST">
    @csrf
        <label for="">Usuario</label>
        <input type="text" name="usuario" id="usuario" required><br>
        <label for="">Contraseña</label>
        <input type="password" name="password" id="password" required><br>
        <button type="enviar">Iniciar sesion</button>
    </form>
</body>
</html>
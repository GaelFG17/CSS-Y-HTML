<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/styles.css">
    <title>GameMagic</title>
</head>
<body>
    <header>
        <h2 class="logo">Logo</h2>
        <nav class="navigation">
            <a href="Home.html">Home</a>
            <a href="#">Contacto</a>
            <button class="btnLogin-popup">Login</button>
        </nav>
    </header>

    <div class="wrapper">
        <span class="icon-close">
            <ion-icon name="close-outline"></ion-icon>
        </span>
        <div class="form-box">
            <h2>Login</h2>
            <form action="index.html">
                <div class="input-box">
                    <span class="icon"><ion-icon name="mail-outline"></ion-icon></span>
                    <input type="email" id="username" name="username" required>
                    <label >Email</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="lock-closed-outline"></ion-icon></span>
                    <input type="password" id="password" name="password" required>
                    <label >Contraseña</label>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
        </div>
    </div>

    <?php
    if(isset($_POST['username'])){
        $user = $_POST['username'];
        $passw = $_POST['password']; 
        include('conexion/conectar.php');
        $sql = "SELECT * FROM personas
                 WHERE Correo = '$user' AND
                 Contrasenia = MD5('$passw')";

        $ejecSql = mysqli_query($cn, $sql);
        $regUsuario = mysqli_fetch_assoc($ejecSql);
        if(mysqli_affected_rows($cn)==1){
            session_start();

            //
            $_SESSION['usuario'] = $regUsuario['Usuario'];
            $_SESSION['correo'] = $regUsuario['Correo'];
            $_SESSION['foto'] = $regUsuario['Foto'];
            $_SESSION['rol'] = $regUsuario['Cargo'];
            header("location:principal.php");
        }else{
            echo "NO";
        }
    }
    ?>




    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$nombreBaseDeDatos = 'cobat';

// Crear conexión
$conn = mysqli_connect($host, $usuario, $contrasena, $nombreBaseDeDatos);

// Verificar conexión
if (!$conn) {
    echo json_encode('fallo db');

}


//Obtenemos el valor del key
$key=$_GET['key']; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //Cuando el request sea POST 
    switch($key){
        case 1:
            validar_login();
            break;
        case 10:
            insert_new_user();

            break;
        case 11:
            insert_documentos();
            break;
        default:
            echo json_encode('La key no se identifica');
            break;
    }

}else{
    switch($key){
        case 2:
            redireccionar_vista();
            break;
    }
}

    
function validar_login(){
    global $conn;
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Crear consulta preparada para verificar el usuario
    $query = "SELECT * FROM usuario WHERE correo = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($resultado) > 0){
        $lista = mysqli_fetch_assoc($resultado);
        $passwordHash=trim($lista['password']);
        if (sha1($password) == $passwordHash) {
            session_start();
            $_SESSION['usuario_id'] = $lista['usuario_id'];
            $_SESSION['nombre'] = $lista['nombre'];
            $_SESSION['apellido_paterno'] = $lista['apellido_paterno'];
            $_SESSION['apellido_materno'] = $lista['apellido_materno'];
            $_SESSION['correo'] = $lista['correo'];
            $_SESSION['id_tipo_usuario'] = $lista['id_tipo_usuario'];
            echo json_encode(array("success" => true, "message" => "Iniciaste Sesion"));
        } else {
            echo json_encode(array("success" => false, "message" => "Contraseña incorrecta"));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Usuario Incorrecto"));
    }
}

// ASPIRANTE
function insert_new_user(){
    global $conn;
    $in_nombre=$_POST['in_nombre_completo'];
    $in_apellido_paterno=$_POST['in_apellido_paterno'];
    $in_apellido_materno=$_POST['in_apellido_materno'];
    $in_password=$_POST['in_password'];
    $in_correo=$_POST['in_correo'];
    if(empty($in_nombre)||empty($in_apellido_paterno)||empty($in_apellido_materno)||empty($in_password)||empty($in_correo)){
        echo json_encode(array("success" => false, "message" => "Todos son necesarios"));
        exit();
    }
    $hash=sha1($in_password);
    $query="INSERT INTO usuario(nombre, apellido_paterno,apellido_materno,password,correo,id_tipo_usuario) VALUES ('$in_nombre','$in_apellido_paterno','$in_apellido_materno','$hash','$in_correo',1)";
    $resultado=mysqli_query($conn,$query);
    if($resultado){
        echo json_encode(array("success" => true, "message" => "Te haz registrado exitosamente"));
        exit();
    }else{
        echo json_encode(array("success" => false, "message" => "Contacta soporte"));
        exit();
    }
}
function insert_documentos(){
    if(isset($_FILES['archivoActa'], $_FILES['archivoCurp'], $_FILES['archivoCompro'], $_FILES['archivoBoleta'], $_FILES['archivoCerti'])) {
        session_start();
        global $conn;
        $usuario_id=$_SESSION['usuario_id'];
        $query="SELECT aspirante_id FROM aspirante where usuario_id=$usuario_id";
        $consulta=mysqli_query($conn,$query);
        if(mysqli_num_rows($consulta) > 0) {
            // El usuario ya ha subido sus archivos anteriormente
            echo json_encode(array("success" => false, "message" => "Ya has subido tus archivos una vez"));
            exit();
        }
        $username=$_SESSION['correo'];
        // archivoActa
        $archivoActa = $_FILES['archivoActa'];
        $extension = pathinfo($archivoActa['name'], PATHINFO_EXTENSION);//extrae el formato .pdf es decir $extension=.pdf
        $nombre_acta = uniqid() . '.' . $extension;//tenemos el nombre del archivo como se guardara
        // archivoCurp
        $archivoCurp = $_FILES['archivoCurp'];
        $extension = pathinfo($archivoCurp['name'], PATHINFO_EXTENSION);//extrae el formato .pdf es decir $extension=.pdf
        $nombre_curp = uniqid() . '.' . $extension;//tenemos el nombre del archivo como se guardara
        // archivoCompro
        $archivoCompro = $_FILES['archivoCompro'];
        $extension = pathinfo($archivoCompro['name'], PATHINFO_EXTENSION);//extrae el formato .pdf es decir $extension=.pdf
        $nombre_compro = uniqid() . '.' . $extension;//tenemos el nombre del archivo como se guardara
        // archivoBoleta
        $archivoBoleta = $_FILES['archivoBoleta'];
        $extension = pathinfo($archivoBoleta['name'], PATHINFO_EXTENSION);//extrae el formato .pdf es decir $extension=.pdf
        $nombre_boleta = uniqid() . '.' . $extension;//tenemos el nombre del archivo como se guardara
        // archivoCerti
        $archivoCerti = $_FILES['archivoCerti'];
        $extension = pathinfo($archivoCerti['name'], PATHINFO_EXTENSION);//extrae el formato .pdf es decir $extension=.pdf
        $nombre_certi = uniqid() . '.' . $extension;//tenemos el nombre del archivo como se guardara

        $carpetaDocumentos = "build/documentos/$username/";
        // Crear la carpeta si no existe
        if (!file_exists($carpetaDocumentos)) {
            mkdir($carpetaDocumentos, 0777, true);
        }
        // Mover los archivos a la carpeta
        move_uploaded_file($archivoActa['tmp_name'], $carpetaDocumentos . $nombre_acta);
        move_uploaded_file($archivoCurp['tmp_name'], $carpetaDocumentos . $nombre_curp);
        move_uploaded_file($archivoCompro['tmp_name'], $carpetaDocumentos . $nombre_compro);
        move_uploaded_file($archivoBoleta['tmp_name'], $carpetaDocumentos . $nombre_boleta);
        move_uploaded_file($archivoCerti['tmp_name'], $carpetaDocumentos . $nombre_certi);

        $telefono=$_POST['telefono'];
        $query="INSERT INTO aspirante(usuario_id, acta_nacimiento,curp,comprobante_domicilio,boleta_secundaria, certificado_secundaria, numero_telefonico) values($usuario_id,'$nombre_acta','$nombre_curp','$nombre_compro','$nombre_boleta','$nombre_certi',$telefono)";
        $consulta=mysqli_query($conn,$query);
        if($consulta){
            echo json_encode(array("success" => true, "message" => "Se subieron correctamente los archivos"));
            exit();
        }else{
            echo json_encode(array("success" => false, "message" => "Contacta Soporte"));
            exit();
        }
    }else{
        echo json_encode(array("success" => false, "message" => "Todos los campos son necesarios"));
        exit();
    }
}


function redireccionar_vista(){
    session_start();
    switch($_SESSION['id_tipo_usuario']){
        case 1:
            header("Location: http://localhost/vista_aspirante.php");
        break;
        case 2:
            header("Location: http://localhost/vista_alumno.php");
        break;
        case 3:
            header("Location: http://localhost/vista_trabajador.php");
        break;
    }
}
?>
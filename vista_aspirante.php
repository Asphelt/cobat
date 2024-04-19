<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Soy aspiarnte</h1>
    <div>
        <form onsubmit="modal_load(event)" style="display:flex;flex-direction:column;">
            <label for="acta">Acta (PDF)</label>
            <input id="acta" type="file" accept=".pdf">

            <label for="curp">Curp (PDF)</label>
            <input id="curp" type="file" accept=".pdf">

            <label for="compro_dom">Comprobante de domicilio (PDF)</label>
            <input id="compro_dom" type="file" accept=".pdf">

            <label for="boleta_secu">Boleta de secundaria (PDF)</label>
            <input id="boleta_secu" type="file" accept=".pdf">

            <label for="certificado">Certificado (PDF)</label>
            <input id="certi_secu" type="file" accept=".pdf">

            <label for="telefono">Teléfono</label>
            <input id="telefono" type="tel">
            <button>Enviar</button>
        </form>
    </div>

    
    </div>  

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="build/js/documento.js"></script>
</body>
</html>
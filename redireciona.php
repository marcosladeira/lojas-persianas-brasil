
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.6.0.min.js"></script>
    <title>Redirecionando...</title>
</head>
<body onload='confirma(<?php echo('"' . $_GET['r'] . '", "' . $_GET['rt'] . '"'); ?>)'>
<script>
    function confirma(mensagem, destino){
        if (confirm(mensagem)) {
            window.location.replace(destino);
        }else{
            window.location.replace(destino);
        }
    }
    
</script>
</body>
</html>

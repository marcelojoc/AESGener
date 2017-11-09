<h2>Subir ficheros en CodeIgniter</h2>
<form action="<?=base_url("prueba/test/subir")?>" method="post" enctype="multipart/form-data">
                        <!--El name del campo tiene que ser si o si "userfile"-->
    Subir un fichero: <input type="file" name="userfile" value="fichero"/>
    <input type="submit" value="Enviar"/>
</form>
<?php
if(isset($error)){
    echo "<strong style='color:red;'>".$error."</strong>";
}
 
if(isset($img)){
    echo "<strong style='color:green;'>".$img["orig_name"]." subido satisfactoriamente </strong>";
}
?>
<?php

require_once 'functions.php';


if( isset($_POST['text']) ){
    if( !empty($_POST['text']) && !empty($_POST['method']) && !empty($_POST['key']) ){
        
        $plainText = $_POST['text'];
        $keyCipher = intval($_POST['key']);
        $method = $_POST['method'];
        $arrayText = str_split($plainText);

        $cipheredText = casearCipherAschii($method, $arrayText, $keyCipher);
		
		
    } else {
        echo '<p style="color: orangered">Please Fill all The Fields.</p>';
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Casear Cipher Aschii.</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form method="POST" action="casear_cipher_aschii.php">
            <label for="text">Enter your text:</label>
            <input type="text" id="text" name="text" autocomplete="off">
            
            <label for="method">Please choose method:</label>
            <select name="method">
                <option value="Encrypt">Encrypt</option>
                <option value="Decrypt">Decrypt</option>
            </select>

            <label for="key">please choose a key</label>
            <input type="number" name="key" min="1" max="26">
            <input type="submit" value="submit">
        </form>

        <div >
            <h1>Based on your method the result is...</h1>
            <p><?php 
					if( isset( $cipheredText ) ){
						echo $cipheredText;
					} 
				?></p>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="wrapper-register">
        <h1>S'inscrire</h1>
        <div class="form">

            <form action  = "index.php?ctrl=security&action=register" method ="POST">
                <label for="pseudo">Pseudo :</label>
                <input type="text" name="pseudo" id="pseudo"><br>

                <label for="email">Email :</label>
                <input type="email" name="email" id="email"><br>

                <label for="pass1">Mot de passe :</label>
                <input type="password" name="pass1" id="pass1"><br>

                <label for="pass2">Confirmation du mot de passe :</label>
                <input type="password" name="pass2" id="pass2"><br>
                
                <div class="submit">
                <input type="submit" name="submit" id="submit" value="S'enregistrer"><br>
            </div>
            </form>
            </div>
            <p>*Le mot de passe doit contenir au moins une majuscule, une miniscule, 8 caractères, un chiffre et un symbole </p>
    </div>
   
</body>
</html>
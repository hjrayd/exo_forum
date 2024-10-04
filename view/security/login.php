<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>Se connecter</h1>
    <div class="form">
        
    <form action="index.php?ctrl=security&action=login" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email"><br>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" id="password">

        <div class="submit">
        <input type="submit" name="submit" id="submit" value="Se connecter">
    </div>
    </form>
    </div>

</body>
</html>
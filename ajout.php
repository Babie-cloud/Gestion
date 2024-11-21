<?php
include "connection.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Victime - Application de Gestion des Accidents Routiers</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            text-align: center;
            background-color: #f1f1f1;
            color: #333;
        }
        h1 {
            color: #333;
        }
        form {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin-top: 10px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Ajouter une Victime</h1>
    <form method ="POST" action ="">
    <form id="VictimeForm">
    
     <form>
        <label for="nom">Nom de la victime :</label>
        <input type="text" id="nom" name="nom" required>
        
        <label for="prenom">Prénom de la victime :</label>
        <input type="text" id="prenom" name="prenom" required>
        
        <label for="age">Âge de la victime :</label>
        <input type="number" id="age" name="age" required>
        
        <label for="sexe">Sexe de la victime :</label>
        <select id="sexe" name="sexe">
            <option value="homme">Homme</option>
            <option value="femme">Femme</option>
        </select>
    
        
        <button type="submit"name="Ajouter">Ajouter Victime</button>
      </form> 
    </form>
 
</body>
<?php
 if(isset($_POST["Ajouter"])){
    $recupnom=$_POST["nom"];
    $recupprenom=$_POST["prenom"];
    $recupage=$_POST["age"];
    $recupsexe=$_POST["sexe"];
   
   
    $insertdata="insert into victime(nom,prenom,age,sexe)
    values('$recupnom','$recupprenom',$recupage,'$recupsexe')";
    $bdd->exec($insertdata);
 }


?>
</html>
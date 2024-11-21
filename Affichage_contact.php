
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <style>

    body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: rgb(175, 187, 186) ;
        }
        h {
            text-align: center;
        }
        form {
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            max-width: 300px;
            margin: auto;
        }
        input, button {
            padding: 10px;
            margin: 5px 0;
            font-size: 16px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #e2e2e2;
        }

<?php
    include "menu.php"
?>;

</style>
</head>
<body>
    
</body>
</html>

<?php
$bdd = new PDO('mysql:host=localhost;dbname=blanchisserie;charset=utf8','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
include "header.php";

// Function to sanitize user inputs
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
  }

// Initialize message variables
$success_message = '';
$error_message = '';

// Handle services deletion
if(isset($_POST["supprimer"])){
    $id = sanitize_input($_POST["id"]);
    if (filter_var($id, FILTER_VALIDATE_INT)) {
        $deletecontact = "DELETE FROM contact WHERE id = :id";
        $stmt = $bdd->prepare($deletecontact);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if($stmt->execute()){
            $success_message = "Le contact a été supprimé avec succès.";
        } else {
            $error_message = "Erreur lors de la suppression du contact.";
        }
    } else {
        $error_message = "ID du contact invalide.";
    }
}
?>

<h1><strong>Liste des contacts</strong></h1>

<?php
if ($success_message) {
    echo "<div class='message success'>$success_message</div>";
}
if ($error_message) {
    echo "<div class='message error'>$error_message</div>";
}
?>

<div class="contact-list">
    <h2 class="list-title">Liste des contacts</h2>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>email</th>
                <th>Date</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM contact ORDER BY Nom, Prenom, email, Date";
            $result = $bdd->query($query);
            if ($result->rowCount() > 0) {
                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['Nom']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Prenom']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Date']) . "</td>";
                    echo "<td>
                            <form method='POST' action='' onsubmit='return confirm(\"Êtes-vous sûr de vouloir supprimer cet contact ?\");'>
                                <input type='hidden' name='id' value='".htmlspecialchars($row['id'])."'>
                                <input type='submit' class='btn btn-danger' name='supprimer' value='Supprimer'>
                            </form>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Aucun contact trouvé.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
// Définition des variables
$nom = $_POST["nom"];
$adresse = $_POST["adresse"];
$telephone = $_POST["telephone"];
$email = $_POST["email"];

// Connexion à la base de données
$bdd = new PDO("mysql:host=localhost;dbname=carnet_adresses", "root", "");

// Insertion des données dans la base de données
$sql = "INSERT INTO contacts (nom, adresse, telephone, email) VALUES (:nom, :adresse, :telephone, :email)";
$stmt = $bdd->prepare($sql);
$stmt->execute([
    "nom" => $nom,
    "adresse" => $adresse,
    "telephone" => $telephone,
    "email" => $email,
]);

// Redirection vers la page d'accueil
header("Location: index.php");
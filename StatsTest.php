<?php
include('db.php'); // Inclure la connexion PDO à la base de données

// Variables pour les filtres
$lobbyFilter = isset($_POST['lobbyFilter']) ? $_POST['lobbyFilter'] : '';
$dateFilter = isset($_POST['dateFilter']) ? $_POST['dateFilter'] : '';
$playerFilter = isset($_POST['playerFilter']) ? $_POST['playerFilter'] : '';

// Récupérer les rôles pour le filtre
$roles = ['Shériff', 'Maire', 'Ingénieur', 'Medic', 'Ninja', 'EvilGuesser', 'Morphling', 'Jester', 'Vulture'];

// Requête pour les statistiques des joueurs
$statsQuery = "
    SELECT j.Jou_Nom,
           COUNT(DISTINCT CASE WHEN r.Rol_Equ_ID = 1 THEN p.Par_ID END) AS Crewmate_Games, 
           COUNT(DISTINCT CASE WHEN r.Rol_Equ_ID = 2 THEN p.Par_ID END) AS Impostor_Games,
           COUNT(DISTINCT CASE WHEN r.Rol_Nom = 'Jester' THEN p.Par_ID END) AS Jester_Games,
           COUNT(DISTINCT CASE WHEN r.Rol_Nom = 'Vulture' THEN p.Par_ID END) AS Vulture_Games,
           SUM(CASE WHEN c.Com_IS_T1 = 1 THEN 1 ELSE 0 END) AS T1_Count,
           SUM(CASE WHEN c.Com_IS_Bad_Vot = 1 THEN 1 ELSE 0 END) AS Bad_Vote_Count,
           SUM(c.Com_Task_Nb) AS Total_Tasks,  -- Somme des tâches effectuées
           SUM(CASE WHEN c.Com_Buz = 1 THEN 1 ELSE 0 END) AS Buzz_Count,
           SUM(CASE WHEN c.Com_Rep > 0 THEN 1 ELSE 0 END) AS Reported_Count,
           SUM(c.Com_Kil_Nb) AS Total_Kills,
           SUM(CASE WHEN c.Com_IS_Alive_End = 1 THEN 1 ELSE 0 END) AS Alive_End_Count,
           SUM(CASE WHEN c.Com_Eat_Cad_Nb > 0 THEN 1 ELSE 0 END) AS Eat_Cad_Count,
           COUNT(DISTINCT CASE WHEN r.Rol_Equ_ID = 1 AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Crewmate_Wins,
           COUNT(DISTINCT CASE WHEN r.Rol_Equ_ID = 2 AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Impostor_Wins,
           COUNT(DISTINCT CASE WHEN r.Rol_Nom = 'Jester' AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Jester_Wins,
           COUNT(DISTINCT CASE WHEN r.Rol_Nom = 'Vulture' AND p.Par_Win_Equ_ID = r.Rol_Equ_ID THEN p.Par_ID END) AS Vulture_Wins,
           COUNT(DISTINCT p.Par_ID) AS Total_Games,
           SUM(p.Par_Task_Max) AS Total_Max_Tasks -- Utilisation de la colonne Par_Task_Max de la table partie
    FROM composition c
    JOIN joueur j ON c.Com_Jou_ID = j.Jou_ID
    JOIN partie p ON c.Com_Par_ID = p.Par_ID
    JOIN role r ON c.Com_Rol_ID = r.Rol_ID
    WHERE 1
";

// Appliquer les filtres
if ($lobbyFilter != '') {
    $statsQuery .= " AND p.Par_Lob_ID = ?";
}
if ($dateFilter != '') {
    $statsQuery .= " AND p.Par_Dat = ?";
}
if ($playerFilter != '') {
    $statsQuery .= " AND j.Jou_ID = ?";
}

// Préparer et exécuter la requête
$params = [];
if ($lobbyFilter != '') {
    $params[] = $lobbyFilter;
}
if ($dateFilter != '') {
    $params[] = $dateFilter;
}
if ($playerFilter != '') {
    $params[] = $playerFilter;
}

$statsStmt = $pdo->prepare($statsQuery);
$statsStmt->execute($params);
$statsResult = $statsStmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques des Joueurs</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Formulaire de filtres -->
<form method="POST" class="bg-white p-6 rounded-lg shadow-md max-w-4xl mx-auto my-8">
    <h2 class="text-xl font-semibold text-center mb-6">Filtres</h2>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <!-- Lobby Filter -->
        <div>
            <label for="lobbyFilter" class="block text-sm font-medium text-gray-700">Lobby :</label>
            <select name="lobbyFilter" id="lobbyFilter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
                <option value="">Tous</option>
                <?php
                $lobbiesQuery = "SELECT * FROM lobby";
                $lobbiesResult = $pdo->query($lobbiesQuery);
                while ($row = $lobbiesResult->fetch()) {
                    echo "<option value='" . $row['Lob_ID'] . "' " . ($lobbyFilter == $row['Lob_ID'] ? "selected" : "") . ">" . $row['Lob_Nam'] . "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Date Filter -->
        <div>
            <label for="dateFilter" class="block text-sm font-medium text-gray-700">Date :</label>
            <select name="dateFilter" id="dateFilter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
                <option value="">Toutes</option>
                <?php
                $datesQuery = "SELECT DISTINCT Par_Dat FROM partie ORDER BY Par_Dat";
                $datesResult = $pdo->query($datesQuery);
                while ($row = $datesResult->fetch()) {
                    echo "<option value='" . $row['Par_Dat'] . "' " . ($dateFilter == $row['Par_Dat'] ? "selected" : "") . ">" . $row['Par_Dat'] . "</option>";
                }
                ?>
            </select>
        </div>

        <!-- Player Filter -->
        <div>
            <label for="playerFilter" class="block text-sm font-medium text-gray-700">Joueur :</label>
            <select name="playerFilter" id="playerFilter" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm text-sm">
                <option value="">Tous</option>
                <?php
                $playersQuery = "SELECT * FROM joueur";
                $playersResult = $pdo->query($playersQuery);
                while ($row = $playersResult->fetch()) {
                    echo "<option value='" . $row['Jou_ID'] . "' " . ($playerFilter == $row['Jou_ID'] ? "selected" : "") . ">" . $row['Jou_Nom'] . "</option>";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="text-center mt-4">
        <input type="submit" value="Valider" class="bg-blue-500 text-white py-2 px-6 rounded-lg shadow-sm cursor-pointer hover:bg-blue-600">
    </div>
</form>

<!-- Affichage des Stats -->
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-semibold mb-4">Stats des Joueurs</h2>

    <!-- Exemple de tableau avec les stats -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h3 class="text-xl font-semibold mb-4">Classement des Joueurs par Nombre de Parties Jouées</h3>
        <table class="min-w-full table-auto text-sm">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-4 py-2">Nom</th>
                <th class="px-4 py-2">Total</th>
            </tr>
            </thead>
            <tbody>
            <?php
            usort($statsResult, function($a, $b) {
                return $b['Total_Games'] <=> $a['Total_Games'];
            });

            foreach ($statsResult as $row) {
                echo "<tr class='border-t'>
                            <td class='px-4 py-2'>" . $row['Jou_Nom'] . "</td>
                            <td class='px-4 py-2'>" . $row['Total_Games'] . "</td>
                          </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>

    <!-- Exemple de graphique pour les victoires Crewmate -->
    <div class="bg-white p-6 rounded-lg shadow-md mb-6">
        <h3 class="text-xl font-semibold mb-4">Victoire Crewmate (Graphique)</h3>
        <canvas id="crewmateWinChart"></canvas>
    </div>

</div>

<!-- Chart.js Script -->
<script>
    const crewmateWinCtx = document.getElementById('crewmateWinChart').getContext('2d');
    const crewmateWinChart = new Chart(crewmateWinCtx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($statsResult, 'Jou_Nom')); ?>,
            datasets: [{
                label: 'Victoire Crewmate',
                data: <?php echo json_encode(array_column($statsResult, 'Crewmate_Wins')); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>

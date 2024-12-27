<?php 
require_once "./db/database.php";
require_once "./class/class_reservation.php";
$addReservation = new Reservation();
$result = $addReservation->getReservationById();

if (isset($_GET['action']) && isset($_GET['id'])) {
  $id = $_GET['id'];
  if ($_GET['action'] === 'delete') {
    $rows = $addReservation->deleteReservation($id);
    if ($rows) {
      header("Location: getReservation.php");
      exit;
    }
  } elseif ($_GET['action'] === 'modify' && isset($_POST['submit'])) {
    $newDate = $_POST['new_date'];
    $newTime = $_POST['new_time'];
    $updated = $addReservation->modifyReservation($id, $newDate, $newTime);
    if ($updated) {
      header("Location: getReservation.php");
      exit;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Reservations</title>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="bg-[#006666] text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-lg font-bold">ENERGYM</div>
            <div>
                <a href="index.php" class="px-3 py-2 rounded hover:bg-[#004d4d]">Home</a>
                <a href="about.php" class="px-3 py-2 rounded hover:bg-[#004d4d]">About</a>
                <a href="reservation.php" class="px-3 py-2 rounded hover:bg-[#004d4d]">Reservation</a>
                <a href="register.php" class="px-3 py-2 rounded hover:bg-[#004d4d]">Registration</a>
                <a href="login.php" class="px-3 py-2 rounded hover:bg-[#004d4d]">Login</a>
            </div>
        </div>
    </nav>
    <div class="overflow-x-auto mb-[300px] mt-[100px]">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
            <!-- Table Header -->
            <thead class="bg-blue-500 text-white">
                <tr>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Activité</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Time</th>
                    <th class="px-6 py-3 text-left font-semibold text-sm">Date</th>
                    <th class="px-6 py-3 text-center font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <!-- Table Body -->
            <tbody class="divide-y divide-gray-200">
                <?php foreach($result as $row): ?>
                    <tr class="hover:bg-blue-100">
                        <td class="px-6 py-4 text-gray-700"><?php echo $row['Nom_activite']; ?></td>
                        <td class="px-6 py-4 text-gray-700"><?php echo $row['time_activity']; ?></td>
                        <td class="px-6 py-4 text-gray-700"><?php echo $row['date_activity']; ?></td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <button class="text-blue-500 hover:text-blue-700 transition duration-200 border px-2 py-1 rounded">
                                <a href="#" onclick="showModifyForm(<?php echo $row['id']; ?>)">Modify</a>
                            </button>
                            <button class="text-red-500 hover:text-red-700 transition duration-200 border px-2 py-1 rounded">
                                <a href="getReservation.php?action=delete&id=<?php echo $row['id']; ?>">Cancel</a>
                            </button>
                        </td>
                    </tr>
                    <tr id="modifyForm_<?php echo $row['id']; ?>" style="display: none;">
                        <td colspan="4" class="px-6 py-4">
                            <form action="getReservation.php?action=modify&id=<?php echo $row['id']; ?>" method="POST" class="flex items-center space-x-2">
                                <input type="date" name="new_date" value="<?php echo $row['date_activity']; ?>" class="border rounded px-2 py-1">
                                <input type="time" name="new_time" value="<?php echo $row['time_activity']; ?>" class="border rounded px-2 py-1">
                                <button type="submit" name="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Save</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function showModifyForm(id) {
            var form = document.getElementById('modifyForm_' + id);
            form.style.display = form.style.display === 'none' ? 'table-row' : 'none';
        }
    </script>
</body>
</html>
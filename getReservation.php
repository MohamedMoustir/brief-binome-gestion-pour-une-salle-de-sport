
<?php 

// require_once "navbar.php";
require_once "./db/database.php";
require_once "./class/class_reservation.php";
$addReservation = new Reservation();
$result = $addReservation->getReservationById();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $rows =$addReservation->deleteReservation($id);
  if ($rows) {
   header("Location: getReservation.php?id=" . $id);
  exit; 
  }
 
}

  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>


<body>
        <!-- Navigations Bar -->
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
        <?php  foreach($result as $row): ?>
          <tr class="hover:bg-blue-100">
            <td class="px-6 py-4 text-gray-700"><?php echo $row['Nom_activite']; ?></td>
            <td class="px-6 py-4 text-gray-700"><?php echo $row['time_activity']; ?></td>
            <td class="px-6 py-4 text-gray-700"><?php echo $row['date_activity']; ?></td>
            <td class="px-6 py-4 text-center space-x-2">
              <button type="submit" name="Annuler" class="text-red-500 hover:text-red-700 transition duration-200 border">
                <a href="getReservation.php?id=<?= $row['id']?>">Annuler</a>
              </button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>


   
   
   
      
    </div>

  </div>

  
  <script src="../script\main.js"></script>

</body>

</html>
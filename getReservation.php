
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
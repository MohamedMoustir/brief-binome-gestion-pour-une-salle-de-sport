<?php

require_once "./db/database.php";
require_once "./class/class_activites.php";

if (isset($_GET['id_activite'])) {
    $id_activite = $_GET['id_activite'];
    $activite = new activites();
    $row = $activite->getActivites($id_activite);
}

if (isset($_POST['submit'])) {
    $Nom_activite = $_POST['Nom_activite'];
    $Description = $_POST['description'];
    $Capacite = $_POST['capacite'];
    $date_debut = $_POST['date_debut'];
    $date_fin = $_POST['date_fin'];
    $Disponibilite = $_POST['disponibilite'];
    $upload_img = $_FILES['avatar'];
    $activite = new activites(); 
    $rows = $activite->updateActivites($Nom_activite, $Description, $Capacite, $date_debut, $date_fin, $Disponibilite, $id_activite,$upload_img);

    if ($rows) {
        header("Location: update_activites.php?id_activite=" . $id_activite);
        exit();
        
    } else {
        echo "Failed to update the activity. Please try again.";
    }
}
require_once "dashboard.php";

?>




<div class="bg-white border border-4 rounded-lg shadow relative m-10 ml-[380px]" id="ajoute_card">

<div class="flex items-start justify-between p-5 border-b rounded-t">
    <h3 class="text-xl font-semibold">
        Add Activity
    </h3>
    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-toggle="product-modal">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
        </svg>
    </button>
</div>

<div class="p-6 space-y-6">
    <form method="POST" action="">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <label for="product-name" class="text-sm font-medium text-gray-900 block mb-2">Activity Name</label>
                <input type="text" value="<?php echo $row['Nom_activite'];?>" name="Nom_activite" id="product-name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="Yoga, Zumba, etc." >
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="date_debut" class="text-sm font-medium text-gray-900 block mb-2">Start Date</label>
                <input type="date" value="<?php echo $row['date_debut'];?>" name="date_debut" id="date_debut" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" >
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="date_fin" class="text-sm font-medium text-gray-900 block mb-2">End Date</label>
                <input type="date" value="<?php echo $row['date_fin'];?>" name="date_fin" id="date_fin" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" >
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="capacite" class="text-sm font-medium text-gray-900 block mb-2">Capacity</label>
                <input type="number"value="<?php echo $row['Capacite'];?>"  name="capacite" id="capacite" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" placeholder="e.g. 20" >
            </div>
            <div class="col-span-6 sm:col-span-3">
                <label for="activity-image" class="text-sm font-medium text-gray-900 block mb-2">Activity Image</label>
                <input type="file" value="<?php echo $row['image_path'];?>" name="avatar" id="activity-image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5" accept="image/*" >
            </div>
            <div class="col-span-full">
                <label for="description" class="text-sm font-medium text-gray-900 block mb-2 ">Activity Description</label>
                <input id="description" value="<?php echo $row['Description_activite'];?>" name="description" rows="6" class=" bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-4" placeholder="Enter a description of the activity"></input>
            </div>
            <!-- Disponibilité -->
            <div class="col-span-6 sm:col-span-3">
                <label for="disponibilite" class="text-sm font-medium text-gray-900 block mb-2">Availability</label>
                <select name="disponibilite" value="<?php echo $row['Disponibilite'];?>" id="disponibilite" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-cyan-600 focus:border-cyan-600 block w-full p-2.5">
                    <option value="1">Available</option>
                    <option value="2">Not Available</option>
                </select>
            </div>
        </div>
        <div class="p-6 border-t border-gray-200 rounded-b">
            
    <button name='submit'  class="text-white bg-cyan-600 hover:bg-cyan-700 focus:ring-4 focus:ring-cyan-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="submit">Update Activity</button>

</div>
    </form>
</div> 
</body>
</html>
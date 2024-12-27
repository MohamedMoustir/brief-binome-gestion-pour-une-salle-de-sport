<?php
require_once "./db/database.php";
require_once "./class/class_sports.php";
$selectUsers = new users();
$result = $selectUsers->selectUsers();

if(isset($_GET['id_users'])) {
  $id=$_GET['id_users'];
  $deleteUser = $selectUsers->deleteUser($id);
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
<?php
  require_once "dashboard.php";
?>

<section class="py-8 ml-[340px]">
        <div class="w-full max-w-7xl mx-auto px-6 md:px-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 lg:gap-0">
                <div class="block">
                    <h2 class="font-manrope font-bold text-2xl leading-9 text-gray-900 mb-3">Toutes les member</h2>
                    <p class="font-normal text-sm leading-6 text-gray-500">Remember to avoid sharing sensitive personal information online</p>
                </div>
                <div class="flex flex-col-reverse sm:flex-row sm:items-center gap-3.5">
                    <button class="flex items-center py-2.5 pr-7 pl-5 max-sm:w-max rounded-full bg-indigo-600 gap-2 font-semibold text-base text-white transition-all duration-500 hover:bg-indigo-700">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.5553 2.5H3.44439C2.46249 2.5 1.6665 3.29599 1.6665 4.27788C1.6665 4.73582 1.84321 5.1761 2.15979 5.50698L6.83672 10.3951C6.96997 10.5343 7.03659 10.604 7.09715 10.6748C7.57182 11.2299 7.85102 11.9256 7.89183 12.6548C7.89703 12.7479 7.89703 12.8443 7.89703 13.037V15.419C7.89703 16.8534 9.30152 17.8668 10.6627 17.4146C11.5225 17.129 12.1026 16.3249 12.1026 15.419V13.4451C12.1026 12.8505 12.1026 12.5531 12.152 12.2695C12.2321 11.8095 12.4079 11.3715 12.668 10.9838C12.8284 10.7447 13.034 10.5299 13.4451 10.1002L17.8399 5.50698C18.1565 5.1761 18.3332 4.73582 18.3332 4.27788C18.3332 3.29599 17.5372 2.5 16.5553 2.5Z" stroke="white" stroke-width="1.6" stroke-linecap="round"/>
                            </svg>                            
                            Filter                            
                    </button>
                </div>
              
            </div>
        </div>
    </section>
<div class="font-sans overflow-x-auto ml-[340px]">
      <table class="min-w-full bg-white">
        <thead class="bg-gray-100 whitespace-nowrap">
          <tr>
            <th class="p-4 text-left text-xs font-semibold text-gray-800">
              ID
            </th>
            <th class="p-4 text-left text-xs font-semibold text-gray-800">
              Username
            </th>
            <th class="p-4 text-left text-xs font-semibold text-gray-800">
              Email
            </th>
            <th class="p-4 text-left text-xs font-semibold text-gray-800">
            Role     
          </th>
            <th class="p-4 text-left text-xs font-semibold text-gray-800">
              Actions
            </th>
          </tr>
        </thead>

        <?php foreach ($result as $row): 
          if ($row['Role']== 1) {
           $type = "admin";

          }else{
            $type = "user";
          }
          ?>

        <tbody class="whitespace-nowrap">
          <tr class="hover:bg-gray-50">
            <td class="p-4 text-[15px] text-gray-800">
            <?php echo $row['id_users']; ?>
            </td>
            <td class="p-4 text-[15px] text-gray-800">
            <?php echo $row['username']; ?>
            </td>
            <td class="p-4 text-[15px] text-gray-800">
            <?php echo $row['email']; ?>
            </td>
            <td class="p-4 text-[15px] text-gray-800">
            <?php echo $type; ?>
            </td>
            <td class="p-4">
            
              <button class="mr-4" title="Delete">
                <a href="all_users.php?id_users=<?php echo $row['id_users'];?>">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 fill-red-500 hover:fill-red-700" viewBox="0 0 24 24">
                  <path
                    d="M19 7a1 1 0 0 0-1 1v11.191A1.92 1.92 0 0 1 15.99 21H8.01A1.92 1.92 0 0 1 6 19.191V8a1 1 0 0 0-2 0v11.191A3.918 3.918 0 0 0 8.01 23h7.98A3.918 3.918 0 0 0 20 19.191V8a1 1 0 0 0-1-1Zm1-3h-4V2a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v2H4a1 1 0 0 0 0 2h16a1 1 0 0 0 0-2ZM10 4V3h4v1Z"
                    data-original="#000000" />
                  <path d="M11 17v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Zm4 0v-7a1 1 0 0 0-2 0v7a1 1 0 0 0 2 0Z"
                    data-original="#000000" />
                </svg>
              </a>
              </button>
            </td>
          </tr>
          <?php endforeach; ?>
          
        </tbody>
      </table>
    </div>
</body>
</html>
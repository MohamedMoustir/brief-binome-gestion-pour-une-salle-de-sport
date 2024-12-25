<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendrier de Réservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-lg w-full max-w-3xl p-6">
        <!-- Prix -->
        <div class="text-center text-xl font-bold mb-6">
            Prix - <span class="text-green-500">$18</span>
        </div>

        <!-- Calendrier -->
        <div class="border rounded-lg p-4">
            <div class="flex justify-between items-center mb-4">
                <button class="text-gray-600 hover:text-gray-800">
                    &lt;
                </button>
                <div class="text-center">
                    <span class="text-lg font-medium">Décembre</span>
                    <span class="text-lg font-medium">2024</span>
                </div>
                <button class="text-gray-600 hover:text-gray-800">
                    &gt;
                </button>
            </div>
            <table class="w-full table-fixed text-center">
                <thead>
                    <tr>
                        <th class="py-2">Dim</th>
                        <th>Lun</th>
                        <th>Mar</th>
                        <th>Mer</th>
                        <th>Jeu</th>
                        <th>Ven</th>
                        <th>Sam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="py-2 text-gray-400">1</td>
                        <td class="text-gray-400">2</td>
                        <td class="text-gray-400">3</td>
                        <td class="text-gray-400">4</td>
                        <td class="text-gray-400">5</td>
                        <td class="text-gray-400">6</td>
                        <td class="text-gray-400">7</td>
                    </tr>
                    <tr>
                        <td class="py-2">8</td>
                        <td>9</td>
                        <td>10</td>
                        <td>11</td>
                        <td>12</td>
                        <td>13</td>
                        <td>14</td>
                    </tr>
                    <tr>
                        <td class="py-2">15</td>
                        <td>16</td>
                        <td>17</td>
                        <td>18</td>
                        <td>19</td>
                        <td>20</td>
                        <td>21</td>
                    </tr>
                    <tr>
                        <td class="py-2">22</td>
                        <td>23</td>
                        <td>24</td>
                        <td class="bg-black text-white rounded-full">25</td>
                        <td>26</td>
                        <td>27</td>
                        <td>28</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Heures Disponibles -->
        <div class="mt-6">
            <div class="grid grid-cols-4 gap-2">
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">10:00</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">10:30</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">11:00</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">11:30</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">12:00</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">12:30</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">13:00</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">13:30</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">14:00</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">14:30</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">15:00</button>
                <button class="bg-green-100 text-green-600 px-4 py-2 rounded-lg">15:30</button>
            </div>
        </div>

        <!-- Total et Bouton Réserver -->
        <div class="mt-6 text-center">
            <div class="text-gray-600">Taxe (2%) : $0.36</div>
            <div class="text-lg font-bold">Total : $18.36</div>
            <button class="bg-black text-white py-2 px-6 mt-4 rounded-lg hover:bg-gray-800">
                Réserver
            </button>
        </div>
    </div>

</body>
</html>

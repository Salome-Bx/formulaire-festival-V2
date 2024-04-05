<ul role="list" class="divide-y divide-gray-100 w-10/12 m-auto bg-blue-300 rounded my-2 px-4">
    <li class="flex justify-between gap-x-6 py-5">
        <div class="flex min-w-0 gap-x-4">
            <img class="h-12 w-12 flex-none rounded-full bg-gray-50" src="" alt="">
            <div class="min-w-0 flex-auto">
                <p class="text-sm font-semibold leading-6 text-gray-900">Nom du festival</p>
                <p class="mt-1 truncate text-xs leading-5 text-gray-500"><?= $allresa['Number_Reservation'] ?> <?= $allresa['Quantity_Sledge'] ?> <?= $allresa['Quantity_Headphone'] ?> <?= $allresa['Children'] ?> <?= $allresa['Id_Date'] ?></p>
            </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-900">Prix : €</p>
            <p class="mt-1 text-xs leading-5 text-gray-500"></p>
        </div>
    </li>
</ul>
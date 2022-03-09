<div class="w-full">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="h-28">
        <tr>
            <th scope="col" class="px-6 py-3 text-left border-r text-md font-medium text-gray-500 uppercase tracking-wider w-1">Dag planning</th>
            @for ($i = 0; $i < 10; $i++)
                <th scope="col" class="px-6 py-3 text-left border-r text-md font-medium text-gray-500 uppercase tracking-wider w-10">Dag planning</th>
            @endfor
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($patients as $patient)
                <tr class="h-28">
                    <td class="px-6 py-4 whitespace-nowrap text-md font-medium text-gray-900 border-r max-w-lg">{{ $patient->name }}</td>
                    <td>Taken enzo</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

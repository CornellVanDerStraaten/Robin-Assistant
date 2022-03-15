<div class="w-full">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="h-28">
        <tr>
            <th scope="col" class="px-6 py-3 text-left border-r text-md font-medium text-gray-500 uppercase tracking-wider w-1">Dag planning</th>
            @foreach($timeslots as $timeslot)
                <th scope="col" class="px-6 py-3 text-center border-r text-md font-medium text-gray-500 uppercase tracking-wider w-10">{{ $timeslot }}</th>
            @endforeach
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($patients as $patient)
                <tr class="h-28">
                    <td class="px-6 py-4 border-b whitespace-nowrap text-md font-medium text-gray-900 border-r max-w-lg">{{ $patient->name }}</td>
                    @foreach($timeslots as $key => $timeslot)
                        <td class="border-r border-b relative p-2">
                            @foreach($patient->activitiesPatients as $patientActivity)
                                @if($key == $patientActivity->timeslot)
                                    <div class="p-6
                                     @if($key == 1 || $key == 2) bg-green-100 border-green-300 @endif
                                     @if($key == 3 || $key == 4) bg-red-100 border-red-300 @endif
                                     @if($key == 5) bg-purple-100 border-purple-300 @endif
                                     border-t-2 h-full">
                                        {{ $patientActivity->activity->title }}
                                    </div>
                                @endif
                            @endforeach
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

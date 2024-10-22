<x-app-layout>
    <style>
        body {
            background-color: #f9fafb;
        }

        h2 {
            margin-bottom: 20px;
        }

        .button-create {
            margin: 10px;
            display: inline-block;
            padding: 10px 20px;
            font-weight: bold;
            color: white;
            background-color: #ef4444;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .button-create:hover {
            background-color: #16a34a; /* Green hover */
        }

        .table-container {
            width: 90%;
            margin: auto;
            /* margin-top: 10px; */
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: #f3f4f6;
        }

        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            color: #374151; /* Dark gray */
            font-weight: bold;
        }

        tbody tr:hover {
            background-color: #f1f5f9; /* Light gray on hover */
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 4px;
            padding: 5px 10px;
            transition: background-color 0.3s;
        }

        .btn-info {
            background-color: #3b82f6; /* Blue */
            color: white;
        }

        .btn-info:hover {
            background-color: #2563eb; /* Darker blue */
        }

        .btn-danger {
            background-color: #ef4444; /* Red */
            color: white;
        }

        .btn-danger:hover {
            background-color: #dc2626; /* Darker red */
        }

        .btn-group {
            display: flex;
            justify-content: center; /* Center the buttons */
            gap: 5px; /* Space between buttons */
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Total points: {{ $result->total_points }} points
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="table-container shadow-md sm:rounded-lg">
            <table class="text-sm text-gray-500">
                <thead class="text-xs text-gray-700 uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">Question Text</th>
                        <th scope="col" class="px-6 py-3">Points</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($result->questions as $question)
                    <tr>
                        <td>{{ $question->question_text }}</td>
                        <td>{{ $question->pivot->points }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

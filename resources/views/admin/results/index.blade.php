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
            color: #fff;
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

        .badge {
            background-color: #3b82f6;
            color: #000;
            padding: 2px;
            border-radius: 4px;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Results') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="table-container shadow-md sm:rounded-lg">
            <table class="text-sm text-gray-500">
                <thead class="text-xs text-gray-700 uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">NO</th>
                        <th scope="col" class="px-6 py-3">User</th>
                        <th scope="col" class="px-6 py-3">Points</th>
                        <th scope="col" class="px-6 py-3">Question</th>
                        <th scope="col" class="px-6 py-3"><span class="sr-only">ACTION</span></th>
                    </tr>
                </thead>
                <tbody>
                @forelse($results as $result)
                            <tr data-entry-id="{{ $result->id }}">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $result->user->name }}</td>
                                <td>{{ $result->total_points}}</td>
                                <td>
                                    @foreach($result->questions as $key => $question)
                                        <span class="badge badge-info">{{ $question->question_text }}</span>
                                    @endforeach
                                </td>
                                <td>
                                <div class="btn-group">
                                        <a href="{{ route('admin.results.show', $result->id) }}" class="btn btn-info">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M4.998 7.78C6.729 6.345 9.198 5 12 5c2.802 0 5.27 1.345 7.002 2.78a12.713 12.713 0 0 1 2.096 2.183c.253.344.465.682.618.997.14.286.284.658.284 1.04s-.145.754-.284 1.04a6.6 6.6 0 0 1-.618.997 12.712 12.712 0 0 1-2.096 2.183C17.271 17.655 14.802 19 12 19c-2.802 0-5.27-1.345-7.002-2.78a12.712 12.712 0 0 1-2.096-2.183 6.6 6.6 0 0 1-.618-.997C2.144 12.754 2 12.382 2 12s.145-.754.284-1.04c.153-.315.365-.653.618-.997A12.714 12.714 0 0 1 4.998 7.78ZM12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd"/>
                                        </svg>
                                        </a>
                                    <form onclick="return confirm('Are you sure?')" class="d-inline" action="{{ route('admin.results.destroy', $result->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                                <path d="M3 6h18v2H3zm3 2v12c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V8H6zm2 2h8v10H8zM7 2h10l1 1H6l1-1z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">{{ __('Data Empty') }}</td>
                            </tr>
                            @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

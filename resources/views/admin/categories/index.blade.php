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
            {{ __('Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="table-container shadow-md sm:rounded-lg">
            <div class="">
                <a href="{{ route('admin.categories.create') }}" class="button-create">
                    + Buat Data
                </a>
            </div>
            <table class="text-sm text-gray-500">
                <thead class="text-xs text-gray-700 uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-3">NO</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3"><span class="sr-only">ACTION</span></th>
                    </tr>
                </thead>
                <tbody>
                @if($categories->isEmpty())
                    <tr>
                        <td colspan="4">Tidak ada kategori yang ditemukan.</td>
                    </tr>
                @else
                    @foreach($categories as $category)
                        <tr data-entry-id="{{ $category->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-info">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                        </svg>
                                    </a>
                                    <form onclick="return confirm('Are you sure?')" class="d-inline" action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
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
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <style>
        .alert {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        .card {
            max-width: 600px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .card-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>

    @if($errors->any())
        <div class="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-slot name="title">Admin</x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            <a href="{{ route('admin.categories.index') }}">&larr;</a>
            {!! __('Edit &raquo; Kategori') !!}
        </h2>
    </x-slot>

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">{{ __('name') }}</label>
                    <input type="text" class="form-control" id="name" placeholder="{{ __('name') }}" name="name" value="{{ old('name', $category->name) }}" />
                </div>
                <button type="submit" class="btn">{{ __('Save') }}</button>
            </form>
        </div>
    </div>
</x-app-layout>

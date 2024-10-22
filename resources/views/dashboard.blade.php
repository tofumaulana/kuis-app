<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Test') }}
        </h2>
    </x-slot>

    <style>
        body {
            background-color: #f4f7fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            width: 90%;
            margin: auto;
            margin-top: 30px;
        }

        .card {
            width: 90%;
            margin: auto;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            padding: 10px;
            margin-top: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .alert {
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-check {
            padding: 8px;
            /* margin-bottom: 15px; */
        }

        .btn-primary {
            margin: 20px;
            width: 10rem;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .text-danger {
            margin-top: 5px;
            font-size: 0.9rem;
            color: #e3342f;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .btn-primary {
                width: 100%;
            }
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Soal</div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('client.test.store') }}">
                            @csrf
                            @foreach($categories as $category)
                                <div class="card mb-3">
                                    <div class="card-header">{{ $category->name }}</div>
                
                                    <div class="card-body">
                                        @foreach($category->categoryQuestions as $question)
                                            <div class="card @if(!$loop->last) mb-3 @endif">
                                                <div class="card-header">{{ $question->question_text }}</div>
                        
                                                <div class="card-body">
                                                    <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                                    @foreach($question->questionOptions as $option)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}" @if(old("questions.$question->id") == $option->id) checked @endif>
                                                            <label class="form-check-label" for="option-{{ $option->id }}">
                                                                {{ $option->option_text }}
                                                            </label>
                                                        </div>
                                                    @endforeach

                                                    @if($errors->has("questions.$question->id"))
                                                        <span class="text-danger" role="alert">
                                                            <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        Selesai
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

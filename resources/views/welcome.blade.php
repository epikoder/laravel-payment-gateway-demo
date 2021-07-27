@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="flex">
        <div class="bg-gray-100 opacity-95 mx-auto bg-white shadow-md p-8 m-12 rounded-lg">
            <h1 class="text-center text-xl p-2">
                {{ __('Purchase Book (Test)') }}
            </h1>
            @if ($status ?? '')
                <div class="bg-{{ $status === 'success' ? 'blue' : 'red' }}-500 p-4 rounded m-2 text-white text-sm">
                    {{ $message ?? 'No response' }}
                </div>
            @endif
            <form action="{{ route('purchase') }}" method="POST" class="p-8 border border-2 rounded">
                @csrf
                <div class="p-1">
                    <input type="text" name="name" class="border p-1" placeholder="your name (optional)">
                    <br>
                    <span class="text-xs">
                        {{ __('*If email exist previous name will be used') }}
                    </span>
                </div>

                <div class="p-1">
                    <input type="text" name="email" class="border p-1" placeholder="johndoe@mail.com" required>
                </div>

                <div class="p-1">
                    <input type="password" name="password" class="border p-1" placeholder="*******" required>
                </div>
                <div class="p-1">
                    <label for="book">Select book</label>
                    <select name="book_slug" class="px-5" required>
                        @if ($books)
                            @foreach ($books as $item)
                                <option value="{{ $item->slug }}">
                                    {{ $item->title }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="p-1">
                    <label for="book">Select Provider</label>
                    <select name="provider" class="px-5" required>
                        @if ($providers)
                            @foreach ($providers as $identifier => $value)
                                <option value="{{ $identifier }}">
                                    {{ $value['name'] }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div>
                    <input type="checkbox" name="clear" checked>
                    <span class="p-1 text-sm">
                        {{ __('Clear my account on completion') }}
                    </span>
                </div>
                <p class="text-xs">
                    {{ __('Your information are used only for persistent ') }}
                </p>
                <p class="text-xs">
                    {{ __('test and nothing else outside this domain') }}
                </p>
                <div class="my-2 flex justify-between">
                    <button type="submit" class="rounded-md bg-blue-500 p-1 text-white">
                        {{ __('Submit') }}
                    </button>
                    <button disabled class="rounded-md bg-gray-500 p-1 cursor-not-allowed text-white">
                        {{ __('Reset account') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('head_styles')

    <style lang="scss">
        body {
            background-image: url('./assets/payment-gateway.png');
            object-fit: cover;
        }

    </style>
@endpush

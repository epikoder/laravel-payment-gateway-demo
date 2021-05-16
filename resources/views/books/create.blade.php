@extends('layouts.app')

@section('content')
<div class="flex">
    <div class="mx-auto p-8 bg-white shadow-md rounded-md m-12">
        <h1>
            {{__('Create a Book')}}
        </h1>
        <form action="{{route('books.create')}}" method="POST">
            @csrf
            <div>
                <div class="p-1">
                    <input type="text" name="title" class="border-2 p-1" placeholder="Title">
                </div>
                <div class="p-1">
                    <input type="text" name="author" class="border-2 p-1" placeholder="Author name">
                </div>
                <div class="p-1">
                    <input type="number" name="amount" class="border-2 p-1" placeholder="₦10000">
                </div>
                <div>
                    <textarea name="desc" cols="30" rows="10" class="border-2 p-1" placeholder="Book Description"></textarea>
                </div>
            </div>
            <button type="submit" class="rounded-md bg-blue-400 p-1">
                {{__('Submit')}}
            </button>
        </form>
    </div>
</div>
@endsection
@push('head_styles')
<style lang="scss">
body {
    background-color: rgb(244, 243, 243);
}
</style>
@endpush

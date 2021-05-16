@extends('layouts.app')

@section('content')
<div class="flex">
    <div class="mx-auto p-8 border-2 m-12 rounded-md bg-white shadow-md">
        @if ($book)
            <div>
                <div>
                    <span>
                        {{__('Title :')}}
                    </span>
                    <span>
                        {{$book->title}}
                    </span>
                </div>
                <div>
                    <span>
                        {{__('Author :')}}
                    </span>
                    <span>
                        {{$book->author}}
                    </span>
                </div><div>
                    <span>
                        {{__('Description :')}}
                    </span>
                    <span>
                        {{$book->desc}}
                    </span>
                </div>
                <div>
                    <span>
                        {{__('Amount :')}}
                    </span>
                    <span>
                        {{'$' . $book->amount}}
                    </span>
                </div>
            </div>
        @endif
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

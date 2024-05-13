
@extends('pages.layout')

@section('main')
    <div class="bg-white rounded-2xl p-5 mb-5 mt-5">
        <ul class="nav flex flex-row">
            <li class="pr-5 {{ Route::is('content1') ? 'text-red-300' : '' }}">
                <a wire:navigate href="{{ route('content1') }}">Content 1</a>
            </li>

            <li class="pr-5 {{ (Route::is('content2') || Route::is('content2.step1') || Route::is('content2.step2')) ? 'text-red-300' : '' }}">
                <a wire:navigate href="{{ route('content2') }}">Content 2</a>
            </li>
        </ul>
    </div>

    <div class="bg-white rounded-2xl p-5">
        @yield('content')
    </div>
@endsection





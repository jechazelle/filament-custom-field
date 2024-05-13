@extends('pages.domain.layout')

@section('content')
    @parent

    <div class="flex">
        <div class="flex w2/5">
            Content 2
            <ul class="list flex flex-col px-2">
                <li>
                    <a wire:navigate href="{{ route('content2.step1') }}" class="{{ Route::is('content2.step1') ? 'text-red-400' : '' }}">Step1</a>
                </li>

                <li>
                    <a wire:navigate href="{{ route('content2.step2') }}" class="{{ Route::is('content2.step2') ? 'text-red-400' : '' }}">Step2</a>
                </li>
            </ul>
        </div>

        <div class="flex w-3/5">
            @yield('content2')
        </div>
    </div>
@endsection

@extends('layout.layout')

@section('content')
    <livewire:navbar /> {{-- Livewire navbar Component --}}
    
    <div class="container mx-auto mt-5">
        <div class="grid grid-rows-1">
            <div class="grid grid-cols-7">
                <div class="col-start-2 col-span-5">
                    <livewire:comments /> {{-- Livewire Comments Component --}}
                </div>
            </div>
        </div>
    </div>
@endsection
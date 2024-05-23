@extends('layout.app')
@section('content')
    <main>
        <section id="admin-dashboard" class="flex flex-col space-y-5">
            @include('layout.navbar')

            <div class="mx-auto w-full max-w-screen-2xl px-2.5 md:px-20">
                <progress class="progress w-full"></progress>
                <div class="mockup-window border bg-base-300">
                    <div class="flex p-5 bg-base-200">
                        CRUD USER
                    </div>
                </div>
            </div>

            @include('layout.footer')
        </section>
    </main>
@endsection

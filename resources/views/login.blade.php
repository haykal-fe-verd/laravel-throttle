@extends('layout.app')
@section('content')
    <main>
        <section id="login">
            <div class="min-h-screen flex flex-col gap-3 items-center justify-center">
                @if (session('error') || session('blocked'))
                    <div role="alert" class="alert alert-error max-w-96">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>
                            {{ session('error') ?? session('blocked') }}
                        </span>
                    </div>
                @endif
                <div class="card w-96 bg-base-100 shadow-xl border border-primary">
                    <form action="{{ route('login.process') }}" method="POST" class="card-body">
                        @csrf
                        @method('POST')
                        <h2 class="card-title text-primary">Login</h2>
                        <div class="flex flex-col gap-3">
                            <label class="form-control">
                                <div class="label">
                                    <span class="label-text">Password</span>
                                </div>
                                <input type="text" id="username" name="username"
                                    class="input input-bordered  input-primary" placeholder="Email/Username"
                                    value="{{ old('username') }}" autofocus />
                                @if ($errors->has('username'))
                                    <div class="label">
                                        <span class="text-red-500 text-xs">{{ $errors->first('username') }}</span>
                                    </div>
                                @endif

                            </label>
                            <label class="form-control">
                                <div class="label">
                                    <span class="label-text">Password</span>
                                </div>
                                <input type="password" id="password" name="password"
                                    class="input input-bordered input-primary" placeholder="••••••••" />
                                @if ($errors->has('password'))
                                    <div class="label">
                                        <span class="text-red-500 text-xs">{{ $errors->first('password') }}</span>
                                    </div>
                                @endif
                            </label>
                        </div>
                        <div class="card-actions mt-5 justify-end">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
@endsection

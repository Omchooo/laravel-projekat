@extends('layouts.main')

@section('content')
    <div class="main-pad layout">

        <div class="main f-b-900">
            <div class="content flex-col layout">
                <div class="form-view-head layout">
                    <span class="form-view-title">Registracija</span>
                </div>
                <div class="form-view-con al-center layout">
                    <form method="POST" action="{{ route('register') }}" class="al-center flex-col layout">
                        @csrf

                        <div class="form-inputs layout">
                            <div class="input-name">Ime</div>
                            <input class="form-input" id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-inputs layout">
                            <div class="input-name">Email</div>
                            <input class="form-input" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-inputs layout">
                            <div class="input-name">Lozinka</div>
                            <input class="form-input" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-inputs layout">
                            <div class="input-name">Ponovi lozinku</div>
                            <input class="form-input" id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <button class="btns layout" type="submit">Registriraj</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

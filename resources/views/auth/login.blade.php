@extends('layouts.main')

@section('content')

<div class="main-pad layout">

    <div class="main f-b-900">
        <div  class="content flex-col layout">
            <div class="form-view-head layout">
                <span class="form-view-title">Login</span>
            </div>
            <div class="form-view-con al-center layout">
                <form method="POST" action="{{ route('login') }}" class="al-center flex-col layout">
                    @csrf

                    <div class="form-inputs layout">
                        <div class="input-name">Email</div>
                        <input class="form-input" id="email" type="email" name="email" required autocomplete="email" autofocus value={{ old('email') }} >
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Lozinka</div>
                        <input class="form-input" id="password" type="password" name="password" required>
                    @error('password')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btns layout" type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

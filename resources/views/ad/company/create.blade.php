@extends('layouts.main')

@section('content')

<div class="main-pad layout">

    <a href="{{ url('/') }}" class="back-btn layout">
        <svg height="20px" viewBox="0 0 24 24">
            <path d="M8.415 4.586a2 2 0 1 1 2.828 2.828L8.657 10H21a2 2 0 0 1 0 4H8.657l2.586 2.586a2 2 0 1 1-2.828 2.828L1 12l7.415-7.414z"></path>
        </svg>
    </a>

    <div class="main f-b-900">
        <div  class="content flex-col layout">
            <div class="form-view-head layout">
                <span class="form-view-title">Napravite novi nalog za klijenta</span>
            </div>
            <div class="form-view-con al-center layout">
                <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" class="al-center flex-col layout">
                     @csrf

                    <div class="form-inputs layout">
                        <div class="input-name">Naziv klijenta</div>
                        <input class="form-input" type="text" name="name" id="name" value={{ old('name') }}>
                        @error('name')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Email</div>
                        <input class="form-input" type="text" name="email" id="email" value={{ old('email') }}>
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Lozinka</div>
                        <input class="form-input" type="password" name="password" id="password">
                        @error('password')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Ponovite lozinku</div>
                        <input class="form-input" type="password" name="password_confirmation" id="password-confirm">
                        @error('password-confirm')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>


                    <button class="btns layout" type="submit">Kreiraj</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

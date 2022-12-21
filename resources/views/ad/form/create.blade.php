<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('temp.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">


    <title>Projekat</title>
</head>

<div class="main-pad layout">

    <div class="main f-b-900">
        <div  class="content flex-col layout">
            <div class="form-view-head layout">
                <span class="form-view-title">{{ $ad->title }}</span>
                <ul class="w-100">
                    <li class="m-w-700">Država: {{ $ad->country }}</li>
                    <li class="m-w-700">Broj radnih mjesta: {{ $ad->no_places }}</li>
                    <li class="m-w-700">Opis posla: {{ $ad->desc }}</li>
                </ul>
            </div>
            <div class="form-view-con al-center layout">
                <form action="{{ route('forms.store', $ad) }}" method="post" enctype="multipart/form-data" class="al-center flex-col layout">
                     @csrf

                     <span>
                        @if ($message = session('message'))
                            <div><strong>{{ $message }}</strong></div>
                        @endif
                    </span>

                    <div class="form-inputs layout">
                        <div class="input-name">Ime*</div>
                        <input class="form-input" type="text" name="name" id="name" value={{ old('name') }}>
                        @error('name')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Prezime*</div>
                        <input class="form-input" type="text" name="surname" id="surname" value={{ old('surname') }}>
                        @error('surname')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-inputs layout">
                        <div class="input-name">Email*</div>
                        <input class="form-input" type="text" name="email" id="email" value={{ old('email') }}>
                        @error('email')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Telefon*</div>
                        <input class="form-input" type="text" name="phone" id="phone" value={{ old('phone') }}>
                        @error('phone')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Adresa</div>
                        <input class="form-input" type="text" name="address" id="address" value={{ old('address') }}>
                        @error('address')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Ukratko o vama</div>
                        <textarea class="form-input" maxlength="255" type="text" name="bio" bio="bio" id="bio">{{ old('bio') }}</textarea>
                        @error('bio')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Biografija* <span class="docs">.txt, .pdf, .xdoc</span></div>
                        <input class="form-upload" type="file" name="file" id="file">
                         @error('file')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <button class="btns layout" type="submit">Prijavi se na oglas</button>
                </form>
            </div>
        </div>
    </div>
</div>

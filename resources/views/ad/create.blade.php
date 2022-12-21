@extends('layouts.main')

@section('content')

<div class="main-pad layout">

    <a href="{{ url('/') }}" class="back-btn layout">
        <svg height="20px" viewBox="0 0 24 24">
            <path
                d="M8.415 4.586a2 2 0 1 1 2.828 2.828L8.657 10H21a2 2 0 0 1 0 4H8.657l2.586 2.586a2 2 0 1 1-2.828 2.828L1 12l7.415-7.414z">
            </path>
        </svg>
    </a>

    <div class="main f-b-900">
        <div class="content flex-col layout">
            <div class="form-view-head layout">
                <span class="form-view-title">Objavite novi oglas</span>
            </div>
            <div class="form-view-con al-center layout">
                <form action="{{ route('ads.store') }}" method="post" enctype="multipart/form-data"
                    class="al-center flex-col layout">
                    @csrf

                    <div class="form-inputs layout">
                        <div class="input-name">Naziv oglasa</div>
                        <input class="form-input" type="text" name="title" id="title" value={{ old('title') }}>
                        @error('title')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Država</div>
                        <input class="form-input" type="text" name="country" id="country" value={{ old('country') }}>
                        @error('country')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs layout">
                        <div class="input-name">Broj radnih mjesta</div>
                        <input class="form-input" type="number" name="no_places" id="no_places" value={{ old('no_places') }}>
                        @error('no_places')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-inputs min-h-125 layout">
                        <div class="input-name">Opis posla</div>
                        <textarea class="form-textarea" type="text" name="desc" id="desc">{{ old('desc') }}</textarea>
                        @error('desc')
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    {{-- <div> //otkomentarisati u slucaju da u AdRequest rule dodajemo url (isto za ostale)
                    <input type="hidden" name="url" id="url">
                    </div> --}}

                    <button class="btns layout" type="submit">Objavi oglas</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

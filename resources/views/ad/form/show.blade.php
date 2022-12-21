@extends('layouts.main')

@section('content')

<div class="main-pad layout">

    <a href="{{ $ad->permalink() }}" class="back-btn layout">
        <svg height="20px" viewBox="0 0 24 24">
            <path d="M8.415 4.586a2 2 0 1 1 2.828 2.828L8.657 10H21a2 2 0 0 1 0 4H8.657l2.586 2.586a2 2 0 1 1-2.828 2.828L1 12l7.415-7.414z"></path>
        </svg>
    </a>

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
            <div class="form-view-con layout">
                <div class="view-form-list layout"><span class="list-l">Ime</span>{{ $form->name }}</div>
                <div class="view-form-list layout"><span class="list-l">Prezime</span>{{ $form->surname }}</div>
                <div class="view-form-list layout"><span class="list-l">Email</span>{{ $form->email }}</div>
                <div class="view-form-list layout"><span class="list-l">Telefon</span>{{ $form->phone }}</div>
                <div class="view-form-list layout"><span class="list-l">Adresa</span>{{ $form->address ? $form->address : "Nema podataka"}}</div>
                <div class="view-form-list layout"><span class="list-l">Ukratko</span><span class="list-r">{{ $form->bio ? $form->bio : "Nema podataka"}}</span></div>
                <div class="view-form-list layout"><span class="list-l">Form Id</span>{{ $form->id }}</div>
                @if ($form->file)
                    <div class="view-form-textarea layout"><a href="{{ route('download', $form->id) }}" class="btns layout">Preuzmite fajl</a></div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

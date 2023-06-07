@extends('layouts.main')

@section('content')
    <div class="main-pad layout">


        <div class="main">
            <div class="main-btns layout">
                <div class="left-btns layout">
                    @if (!Auth::user()->isAdmin())
                        <a href="{{ route('ads.create') }}" class="btns bg-y layout"> Novi oglas </a>
                    @endif
                </div>
                <span>Ukupno oglasa: {{ $adInt }}</span>
                <span>@if ($message = session('message'))
                    <div>{{ $message }}</div>
                @endif</span>
                <div class="main-btn layout">
                    <a href="{{ request()->fullUrlWithQuery(['trash' => false]) }}"
                        class="btn @if (!request()->query('trash')) show @endif layout">aktivni</a>
                    <a href="{{ request()->fullUrlWithQuery(['trash' => true]) }}"
                        class="btn @if (request()->query('trash')) show @endif layout">zatvoreni</a>
                </div>
                @php
                    $showTrashButtons = request()->query('trash') ? true : false;
                @endphp
            </div>
        </div>
        <div class="content m-bottom-120 layout">
            @foreach ($ads as $ad)
            <div class="box">
                <div class="box-head">
                    <a href="{{ $ad->permalink() }}" class="box-link">
                        <div class="box-title in-layout"><span class="title">{{ $ad->title }}</span></div>
                    </a>
                    {{-- <a href="{{ $ad->permalink() }}" class="box-link">
                        <div class="box-num">{{ $ad->id }}</div>
                    </a> --}}
                </div>
                <div class="box-con">
                    <a href="{{ $ad->permalink() }}" class="box-link">
                        <div class="box-content layout">
                            <span class="item">Država: {{ $ad->country }}</span>
                            <span class="item">Objavio: {{ $ad->user->name }}</span>
                            <span class="item">Broj prijava: {{ $ad->forms()->count() }}</span>
                            <span class="item">Stanje: <span style="color: {{ $ad->deleted_at ? "red" : "green" }}">{{ $ad->deleted_at ? "zatvoren" : "aktivan"}}</span></span>
                        </div>
                    </a>
                    <div class="box-btns layout">
                        @if ($showTrashButtons)
                        <form style="display: inline-block" action="{{ route('ads.restore', $ad->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-restore layout">Obnovi</button>
                        </form>
                        <form style="display: inline-block" action="{{ route('ads.force-delete', $ad->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-destroy layout">Izbriši</button>
                        </form>
                        @else
                        <form style="display: inline-block" action="{{ route('ads.destroy', $ad->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn-end layout">Ugasi</button type="submit">
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

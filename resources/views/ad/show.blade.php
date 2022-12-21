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

        <div class="main">
            <div class="main-btns layout">
                <span class="overall">Ukupno formi: {{ $forms->count() }}</span>
                <div class="copy-layout layout">
                    <a href="{{ route('forms.create', $ad->url) }}" class="copy-link layout">
                        <input readonly type="text" id="copyTxt" class="copy" value="{{ route('forms.create', $ad->url) }}"></a>
                    <button id="copyBtn" class="copy-btn" data-clipboard-target="#copyTxt">
                        <svg width="30px" height="auto" viewBox="0 0 115 122">
                            <path class="st0"
                                d="M89.62,13.96v7.73h12.19h0.01v0.02c3.85,0.01,7.34,1.57,9.86,4.1c2.5,2.51,4.06,5.98,4.07,9.82h0.02v0.02 v73.27v0.01h-0.02c-0.01,3.84-1.57,7.33-4.1,9.86c-2.51,2.5-5.98,4.06-9.82,4.07v0.02h-0.02h-61.7H40.1v-0.02 c-3.84-0.01-7.34-1.57-9.86-4.1c-2.5-2.51-4.06-5.98-4.07-9.82h-0.02v-0.02V92.51H13.96h-0.01v-0.02c-3.84-0.01-7.34-1.57-9.86-4.1 c-2.5-2.51-4.06-5.98-4.07-9.82H0v-0.02V13.96v-0.01h0.02c0.01-3.85,1.58-7.34,4.1-9.86c2.51-2.5,5.98-4.06,9.82-4.07V0h0.02h61.7 h0.01v0.02c3.85,0.01,7.34,1.57,9.86,4.1c2.5,2.51,4.06,5.98,4.07,9.82h0.02V13.96L89.62,13.96z M79.04,21.69v-7.73v-0.02h0.02 c0-0.91-0.39-1.75-1.01-2.37c-0.61-0.61-1.46-1-2.37-1v0.02h-0.01h-61.7h-0.02v-0.02c-0.91,0-1.75,0.39-2.37,1.01 c-0.61,0.61-1,1.46-1,2.37h0.02v0.01v64.59v0.02h-0.02c0,0.91,0.39,1.75,1.01,2.37c0.61,0.61,1.46,1,2.37,1v-0.02h0.01h12.19V35.65 v-0.01h0.02c0.01-3.85,1.58-7.34,4.1-9.86c2.51-2.5,5.98-4.06,9.82-4.07v-0.02h0.02H79.04L79.04,21.69z M105.18,108.92V35.65v-0.02 h0.02c0-0.91-0.39-1.75-1.01-2.37c-0.61-0.61-1.46-1-2.37-1v0.02h-0.01h-61.7h-0.02v-0.02c-0.91,0-1.75,0.39-2.37,1.01 c-0.61,0.61-1,1.46-1,2.37h0.02v0.01v73.27v0.02h-0.02c0,0.91,0.39,1.75,1.01,2.37c0.61,0.61,1.46,1,2.37,1v-0.02h0.01h61.7h0.02 v0.02c0.91,0,1.75-0.39,2.37-1.01c0.61-0.61,1-1.46,1-2.37h-0.02V108.92L105.18,108.92z" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="content m-bottom-120 layout">
            <div class="box-form layout">
                <div class="box-form-head layout">
                    <span class="form-layout">Id</span>
                    <span class="form-layout">Ime</span>
                    <span class="form-layout">Prezime</span>
                    <span class="form-layout">Email</span>
                </div>
                @foreach ($forms as $form)
                    <div class="box-form-list layout">
                        <span class="form-layout">{{ $form->id }}</span>
                        <span class="form-layout">{{ $form->name }}</span>
                        <span class="form-layout">{{ $form->surname }}</span>
                        <span class="form-layout">{{ $form->email }}</span>
                        <a href="{{ $form->permalink() }}" class="btns layout">Više</a>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/clipboard@2.0.10/dist/clipboard.min.js"></script>
    <script>
        let clipBoard1 = new ClipboardJS('#copyBtn')
    </script>
@endsection

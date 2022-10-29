@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                {{ __('Verifikasi email Anda') }}
            </div>

                <div class="card-body text-center">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Link verifikasi baru telah dikirim') }}
                        </div>
                    @endif
                    <img src="/assets lp/img/logo.png"  alt="" width="200px"><br><br>
                    {{ __('Link verifikasi telah dikirimka ke email Anda. Segera cek email dan klik tombol Verifikasi Email Sekarang agar bisa melanjutkan proses pendaftaran Inovindo Academy.') }} <br>
                    {{ __('Jika Anda belum menerima email verifikasi') }}, <br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Klik disini untuk mengirimkan link verifikasi baru') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

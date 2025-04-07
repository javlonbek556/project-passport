@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Passport ma'lumotlari</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Passport raqami: <span>{{ $post->passport_number }}</span></h5>
                <p class="card-text">Berilgan sana: <span>{{ $post->issue_date }}</span></p>
                <p class="card-text">Amal qilish muddati: <span>{{ $post->expiry_date }}</span></p>
                <a href="{{ route('passport.edit', $post->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Tahrirlash
                </a>
            </div>
        </div>
    </div>
@endsection

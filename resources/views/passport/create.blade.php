@extends('layouts.app')

@section('content')

    <title>Passport ma'lumotlarini kiriting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('passport.index') }}">Passport Tizimi</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('passport.index') }}"><i class="fas fa-home"></i> Bosh sahifa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Chiqish</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Passport ma'lumotlarini kiriting</h1>
        <form>
            <div class="mb-3">
                <label for="passport_number" class="form-label">Passport raqami</label>
                <input type="text" class="form-control" id="passport_number" name="passport_number" required>
            </div>
            <div class="mb-3">
                <label for="issue_date" class="form-label">Berilgan sana</label>
                <input type="date" class="form-control" id="issue_date" name="issue_date" required>
            </div>
            <div class="mb-3">
                <label for="expiry_date" class="form-label">Amal qilish muddati</label>
                <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Saqlash</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

@endsection

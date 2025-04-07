<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Ro'yxatdan o'tish</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group mb-3">
                    <label>Ism</label>
                    <input type="text" name="name" value="{{ old('name') }}" required class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Email manzilingiz</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label>Parol</label>
                    <input type="password" name="password" required class="form-control">
                </div>

                <div class="form-group mb-4">
                    <label>Parolni tasdiqlang</label>
                    <input type="password" name="password_confirmation" required class="form-control">
                </div>

                <button type="submit" class="btn btn-success w-100">Ro'yxatdan o'tish</button>
            </form>
        </div>
    </div>
</div>

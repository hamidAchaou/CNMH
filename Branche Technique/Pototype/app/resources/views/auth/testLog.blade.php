<form method="post" action="{{ route('login') }}">
    @csrf

    <div class="input-group mb-3">
        <input type="name" name="name" value="service social" placeholder="name"
            class="form-control @error('name') is-invalid @enderror">
        <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
        </div>
        @error('error')
            <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="input-group mb-3">
        <input type="password" name="password" value="social" placeholder="Password"
            class="form-control @error('password') is-invalid @enderror">
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('password')
            <span class="error invalid-feedback">{{ $message }}</span>
        @enderror

    </div>

    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">Se souvenir de moi




                </label>
            </div>
        </div>

        <div class="col-4">
            <button type="submit" class="btn btn-primary ">Connexion</button>
        </div>

    </div>
</form>
<x-guest-layout>
    <section id="account">
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <img src="img/image1.png" width="100%">
                </div>
                <div class="col-2">
                    <div class="form-container">
                        <div class="form-btn">
                            <span onclick="register()">Register</span>
                            <span onclick="login()">Login</span>
                            <hr id="indicator">
                        </div>
                        <x-jet-validation-errors class="mb-4" />
                        <form id="login-form" method="POST" action="{{route('login')}}">
                            @csrf
                            <input class="credential" type="email" placeholder="Email" name="email" :value="old('email')" required="true" autofocus="true">
                            <input class="credential" type="password" placeholder="Password" name="password" autocomplete="current-password" required="true">
                            <label for="remember">
                                <input id="remember" type="checkbox" name="remember" value="forever">
                                Remeber me
                            </label>
                            <button type="submit" class="btn">Login</button>
                            <a href="{{route('password.request')}}">Forgot Password?</a>
                        </form>
                        <form id="register-form" method="POST" action="{{route('register')}}">
                            @csrf
                            <input class="credential" type="text" placeholder="Username" name="username" :value="old('username')" required="true" autofocus="true" autocomplete="username">
                            <input class="credential" type="email" placeholder="Email" name="email" :value="old('email')" required="true" autocomplete="true">
                            <input class="credential" type="password" placeholder="Password" name="password" required="true">
                            <input class="credential" type="password" placeholder="Password" name="password_confirmation" required="true">
                            <button type="submit" class="btn">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
@(template/layout)@
@content
<main class="form-signin w-100 m-auto">
    <form>
        <i class="bi-emoji-kiss" style="font-size: 6rem; color: cornflowerblue;"></i>
        <h1 class="h3 mb-3 fw-normal">Вход</h1>

        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="Придумайте логин">
            <label for="floatingInput">Логин</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Придумайте пароль">
            <label for="floatingPassword">Пароль</label>
        </div>

        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
                Запомнить меня
            </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
    </form>
</main>
@endcontent
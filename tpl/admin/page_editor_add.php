<form action="<?= GetCurUrl() ?>" method="post" class="uk-form" role="form">
    <input type="hidden" name="is_add_page" value="1">

    <!-- Управление -->
    <div class="uk-width-1-1" style="background-color: #f5f5f5" data-uk-sticky="{top:42}">
        <div class="uk-button-group uk-text-center">
            <button type="submit" class="uk-button uk-button-primary">Добавить</button>
        </div>
    </div>


    <!-- Основная страница  -->
    <div class="uk-container uk-container-center">

        <!-- Сообщение  -->
        <?php if ($msg): ?>
            <div class="uk-alert uk-margin-top uk-text-center"><?= $msg ?></div>
        <?php endif; ?>


        <!-- Заголовок -->
        <div class="uk-width-1-1 uk-text-center uk-margin-large-top">
            <h1>Добавление страницы</h1>
            <p class="uk-text-center">В названии страницы допускаются только маленькие латинские буквы и цифры.</p>
        </div>


        <!-- Панель формы -->
        <div class="uk-width-1-1 uk-panel uk-panel-box">

            <div class="uk-form-row">
                <label for="inputName" class="uk-form">Название страницы</label>
                <div class="uk-panel-space uk-text-center">
                    <input type="text" class="uk-form uk-form-large uk-width-1-1" id="inputName" autocomplete="on"
                           name="name"
                           value="<?= Post("name") ?>" placeholder="Только маленькие латинские буквы и цифры">
                </div>
            </div>
        </div>
    </div>

</form>

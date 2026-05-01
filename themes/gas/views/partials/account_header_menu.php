<?php defined('GASCORE') || die() ?>

<div class="d-lg-none">
    <select name="account_header_menu" class="custom-select mb-4">
        <option value="<?= url('account') ?>" <?= \Altum\Router::$controller_key == 'account' ? 'selected="selected"' : null ?>><?= l('account.menu') ?></option>
        <option value="<?= url('account-logs') ?>" <?= \Altum\Router::$controller_key == 'account-logs' ? 'selected="selected"' : null ?>><?= l('account_logs.menu') ?></option>

        <?php if(settings()->main->api_is_enabled): ?>
            <option value="<?= url('account-api') ?>" <?= \Altum\Router::$controller_key == 'account-api' ? 'selected="selected"' : null ?>><?= l('account_api.menu') ?></option>
        <?php endif ?>

        <option value="<?= url('account-delete') ?>" <?= \Altum\Router::$controller_key == 'account-delete' ? 'selected="selected"' : null ?>><?= l('account_delete.menu') ?></option>
    </select>
</div>

<?php ob_start() ?>
<script>
    document.querySelector('select[name="account_header_menu"]').addEventListener('change', event => {
        window.location = document.querySelector('select[name="account_header_menu"]').value;
    })
</script>
<?php \Altum\Event::add_content(ob_get_clean(), 'javascript') ?>

<ul class="account-header-navbar d-none d-lg-flex">
    <li class="nav-item">
        <a class="nav-link <?= \Altum\Router::$controller_key == 'account' ? 'active' : null ?>" href="<?= url('account') ?>">
            <i class="fas fa-fw fa-sm fa-wrench mr-1"></i> <?= l('account.menu') ?>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link <?= \Altum\Router::$controller_key == 'account-logs' ? 'active' : null ?>" href="<?= url('account-logs') ?>">
            <i class="fas fa-fw fa-sm fa-scroll mr-1"></i> <?= l('account_logs.menu') ?>
        </a>
    </li>

    <?php if(settings()->main->api_is_enabled): ?>
        <li class="nav-item">
            <a class="nav-link <?= \Altum\Router::$controller_key == 'account-api' ? 'active' : null ?>" href="<?= url('account-api') ?>">
                <i class="fas fa-fw fa-sm fa-code mr-1"></i> <?= l('account_api.menu') ?>
            </a>
        </li>
    <?php endif ?>

    <li class="nav-item">
        <a class="nav-link <?= \Altum\Router::$controller_key == 'account-delete' ? 'active' : null ?>" href="<?= url('account-delete') ?>">
            <i class="fas fa-fw fa-sm fa-times mr-1"></i> <?= l('account_delete.menu') ?>
        </a>
    </li>
</ul>

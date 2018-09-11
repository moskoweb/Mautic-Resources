<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label">URL do Mautic:</label>
            <div class="input-icon">
                <span class="input-icon-addon">
                    <i class="fe fe-link"></i>
                </span>
                <input type="text" class="form-control" name="settings[mautic][url]" value="{{ $settings->mautic->url ?? '' }}" placeholder="https://mautic.dominio.com">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label">Usuário:</label>
            <div class="input-icon">
                <span class="input-icon-addon">
                    <i class="fe fe-user"></i>
                </span>
                <input type="text" class="form-control" name="settings[mautic][user]" value="{{ $settings->mautic->user ?? '' }}">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="form-label">Senha:</label>
            <div class="input-icon">
                <span class="input-icon-addon">
                    <i class="fe fe-lock"></i>
                </span>
                <input type="password" class="form-control" name="settings[mautic][pass]" value="{{ $settings->mautic->pass ?? '' }}">
            </div>
        </div>
    </div>
</div>

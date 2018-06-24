<div class="user" style="border: 1px solid #212121;border-radius: 5px">
    <div class="user-main-informations" style="text-align: center;width: 100%;display: flex;justify-content: space-between;flex-direction: row;">
        <span>
            <a href="<?php echo $_SERVER['DOCUMENT_ROOT'].'/user/profil/image/'.$this->params['account']->pseudo.'.png'; ?>"><img src="<?php echo $_SERVER['DOCUMENT_ROOT'].'/user/profil/image/'.$this->params['account']->pseudo.'.png'; ?>"></a>
        </span>
        <h2 style="margin-right: 25%"><?php echo $this->params['account']->pseudo; ?></h2>
    </div>
    <div class="user-other-informations">
        <div>
            <h4>Themes</h4>
            <div>
                <h5>Themes liked</h5>
            </div>
            <div>
                Themes created
            </div>
        </div>
    </div>
</div>
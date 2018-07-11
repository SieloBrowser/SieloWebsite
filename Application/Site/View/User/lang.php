<?php
    $html = '<ul>
                <li>
                    <a href="#">'.$this->params['lang']->getKey('CHOOSE_LANGUAGE').'</a>
                </li>
                <li class="opener">
                    <a href="#">'.$this->params['lang']->getKey('HEADER_SITEOPT').'</a>    
                    <ul>
                        <li><a href="/Sielo/">'.$this->params['lang']->getKey('HEADER_SITEOPT_HOME').'</a></li>
                    </ul>
                </li>
            </ul>';
    $this->htmlDocument->body->generateSpecificHtmlVar('headerNav', $html);
?>
<section id="banner">
    <div class="content">
        <header>
            <h2><?php echo $this->params['lang']->getKey('CHOOSE_LANGUAGE') ?></h2>
        </header>
        <form action="/Sielo/account/lang" method="post">
            <select name="lang" style="margin-bottom: 10px;margin-top: 10px;text-align: center">
                <?php
                    $langList = explode(', ', $this->params['lang']->getKey('LANG_LIST'));
                    $langListValue = explode(', ', $this->params['lang']->getKey('LANG_LIST_SORTED_VALUE'));
                    foreach ($langList as $key => $value)
                    {
                        echo '<option value="'.$langListValue[$key].'">'.$value.'</option>';
                    }
                ?>
            </select>
            <input style="width: 100%" type="submit" value="<?php echo $this->params['lang']->getKey('FORM_SUBMIT_BUTTON'); ?>">
        </form>
    </div>
</section>
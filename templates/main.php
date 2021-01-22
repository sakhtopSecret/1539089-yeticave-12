<?php
require_once('helpers.php');
require_once('index.php');
function lot_price($x)
{
    $x = ceil($x);
    if ($x >= 1000) {
        $x = number_format($x, 0, '.', ' ');
    }

    return $x . ' ' . '₽';
}
?>
<main class="container">
    <section class="promo">
        <h2 class="promo__title">Нужен стафф для катки?</h2>
        <p class="promo__text">На нашем интернет-аукционе ты найдёшь самое эксклюзивное сноубордическое и горнолыжное снаряжение.</p>
        <ul class="promo__list">

            <li class="promo__item promo__item--boards">
                <?php
                foreach ($categories as $val) : ?>
                    <a class="promo__link" href="pages/all-lots.html"><?= htmlspecialchars($val); ?></a>
                <?php endforeach; ?>
            </li>
        </ul>
    </section>
    <section class="lots">
        <div class="lots__header">
            <h2>Открытые лоты</h2>
        </div>
        <ul class="lots__list">
        
        
        <?php
        foreach ($staff as $key => $val) : ?>
        <!-- Хотел сделать всё в одном теге, но обнаруживает нежданынй endforeach, оставил так -->
        <?php 
        $date = (time_to_dead($val['time']));
        if ($date[0] > 1) :  ?>
        
            <li class="lots__item lot">
                
                    <div class="lot__image">
                        <img src="<?= htmlspecialchars($val['image']); ?>" width="350" height="260" alt="">
                    </div>
                    <div class="lot__info">
                        <span class="lot__category"><?= htmlspecialchars($val['category']); ?></span>
                        <h3 class="lot__title"><a class="text-link" href="pages/lot.html"><?= htmlspecialchars($val['name']); ?></a></h3>
                        <div class="lot__stat
                        
                        e">
                            <div class="lot__rate">
                                <span class="lot__amount">Стартовая цена</span>
                                <span class="lot__cost"><?= htmlspecialchars(lot_price($val['price'])); ?></span>
                            </div>
                            <div class="lot__timer timer 
                            <?php
                            // Добавляем класс, в зависимости от возвращаемого значения
                             if ($date[0] < 1) : ?>timer--finishing<?php endif ?>">
                                <?php
                               htmlspecialchars(print $date[0] . ':' . $date[1]);
                                ?>
                            </div>
                        </div>
                    </div>
                
            </li>
        <?php endif; ?>
        <?php endforeach; ?>
        </ul>
    </section>
</main>
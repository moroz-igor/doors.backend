<?php
    if($titles[0]['status']): ?>
<?php
    echo '
    <div class="_actions ">
        <div class="_close-actions">
            <div>
                <div class="cl-btn-7" id="close-actions"></div>
                </div>
        </div>
        <div class="_actions-content">
        <h2>'; ?>
            <?php echo $titles[0]['title_1']; ?>
            <?php echo '
        </h2>
            <!--<a href="#">-->
                <h3>'; ?>
                    <?php echo $titles[0]['title_2']; ?>
                    <?php echo '
                <!--</h3>-->
            </a>
        </div>'; ?>
        <?php echo'
        <div class="_actions-marquee">
            <span>'; ?>
            <?php echo $titles[0]['ticker']; ?>
        <?php echo '
            </span>
        </div>
    </div>'; ?>
<?php endif; ?>

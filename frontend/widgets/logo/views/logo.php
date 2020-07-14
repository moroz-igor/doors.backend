<div class="_footer-logo">
    <?php foreach ($titles as $logo): ?>
    <h2><?php echo $logo['main']; ?> </h2>
            <a class="logotype1" href="/">
            <div>
                <b>
                <?php echo $logo['title_1']; ?>
                </b>
                <?php echo $logo['title_2']; ?>
            </div>
            <br/>
            <span>
                <?php echo $logo['title_3']; ?>
            </span><br/><br/>
            <span>
                <?php echo $logo['title_4']; ?>
            </span>
        </a>
    <?php endforeach; ?>
</div>

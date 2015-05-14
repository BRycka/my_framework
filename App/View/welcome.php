<div class="content">
    <?php
        echo 'Welcome to My framework';
        if ($urlParam) {
            echo ', ' . $urlParam;
        }
    ?>
    <div class="author">Framework created by <?php echo $name . ' ' . $lastName; ?></div>
</div>

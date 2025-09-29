<section>
    <h2>PHP Configuration</h2>
    <p><a href="/" class="button">← Back to Home</a></p>
    
    <div class="phpinfo">
        <?php
        // Display PHP info in a contained way
        ob_start();
        phpinfo(INFO_GENERAL | INFO_CONFIGURATION | INFO_MODULES);
        $phpinfo = ob_get_clean();
        
        // Extract just the body content
        $phpinfo = preg_replace('#^.*<body>(.*)</body>.*$#s', '$1', $phpinfo);
        $phpinfo = str_replace('<table', '<table class="phpinfo-table"', $phpinfo);
        echo $phpinfo;
        ?>
    </div>
</section>
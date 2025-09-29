<section class="hero">
    <h2>🚀 PHP Application Running!</h2>
    <p>This example demonstrates server-side PHP rendering on Convox with:</p>
    <ul>
        <li>✅ PHP <?php echo phpversion(); ?> with Apache</li>
        <li>✅ Dynamic content generation</li>
        <li>✅ Environment variable access</li>
        <li>✅ API endpoints</li>
        <li>✅ Database-ready (PDO/MySQLi installed)</li>
    </ul>
</section>

<section class="info">
    <h2>Server Information</h2>
    <div class="info-grid">
        <div class="info-item">
            <strong>Server Time:</strong>
            <span><?php echo date('Y-m-d H:i:s'); ?></span>
        </div>
        <div class="info-item">
            <strong>PHP Version:</strong>
            <span><?php echo phpversion(); ?></span>
        </div>
        <div class="info-item">
            <strong>Server Software:</strong>
            <span><?php echo $_SERVER['SERVER_SOFTWARE']; ?></span>
        </div>
        <div class="info-item">
            <strong>Memory Usage:</strong>
            <span><?php echo round(memory_get_usage() / 1024 / 1024, 2); ?> MB</span>
        </div>
    </div>
</section>

<section class="examples">
    <h2>Example Features</h2>
    <nav class="nav-buttons">
        <a href="/info" class="button">PHP Info</a>
        <a href="/api/status" class="button">API Status</a>
        <a href="/api/time" class="button">API Time</a>
    </nav>
</section>

<section class="commands">
    <h2>Quick Commands</h2>
    
    <h3>Convox Cloud</h3>
    <code>convox cloud logs -a php -i your-machine</code>
    <p>View application logs</p>
    
    <code>convox cloud run web "php -v" -a php -i your-machine</code>
    <p>Check PHP version</p>
    
    <h3>Convox Rack</h3>
    <code>convox logs -a php</code>
    <p>View application logs</p>
    
    <code>convox run web "php -v" -a php</code>
    <p>Check PHP version</p>
</section>
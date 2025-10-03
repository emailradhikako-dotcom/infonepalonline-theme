</div>
<footer id="site-footer" class="site-footer">
    <!-- Footer Widgets -->
    <div class="footer-widgets">
        <div class="container">
            <div class="footer-content">
                <!-- About, Quick Links, Categories, Recent Posts ... -->
                <!-- Content as above -->
            </div>
        </div>
    </div>
    <!-- Newsletter, Footer Bottom, Scroll to Top, Loading Overlay, Footer Scripts ... -->
    <!-- Content as above -->
    <?php wp_footer(); ?>
    <script>
    function updateLiveTime() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');
        const timeElement = document.getElementById('live-time');
        if (timeElement) {
            timeElement.textContent = `${hours}:${minutes}:${seconds}`;
        }
    }
    updateLiveTime();
    setInterval(updateLiveTime, 1000);
    </script>
</body>
</html>
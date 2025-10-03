</div>
<footer id="site-footer" class="site-footer">
<!-- ... footer content ... -->
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
<div class="setting-container">
    <h2>Settings</h2>
    <div class="setting-item">
        <span class="setting-name">Dark Mode</span>
        <label class="toggle-btn">
            <input type="checkbox">
            <span class="toggle-slider disabled"></span>
        </label>
    </div>
    <div class="setting-item">
        <span class="setting-name">Notifications</span>
        <label class="toggle-btn">
            <input type="checkbox">
            <span class="toggle-slider disabled"></span>
        </label>
    </div>
    <div class="setting-item">
        <span class="setting-name">Email Updates</span>
        <label class="toggle-btn">
            <input type="checkbox">
            <span class="toggle-slider disabled"></span>
        </label>
    </div>
    <!-- <button class="logout-btn">Logout</button> -->
    <button class="logout-btn" onclick="logout()">Logout</button>

</div>

<script>
    function logout() {
        window.location.href = "/logout";
    }
</script>
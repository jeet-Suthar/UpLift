<nav class="navbar">
  <div class="navbar-left">
    <img src="uploads/assets/site_images/UpLiftLogo1.jpg" alt="Logo" class="navbar-logo">
    <h1 class="navbar-title">UpLift</h1>
  </div>
  <div class="navbar-right">

    <div class="navbar-icons">
      <div class="navbar-search-bar-container">
        <input type="text" class="navbar-search-bar" placeholder="Search">
        <i class="fas fa-search" style="margin-right: 10px; scale: 1.2;"></i>
      </div>
      <i class="fas fa-plus-circle" style=" margin-right: 10px; scale: 1.2"></i>
      <i class="fas fa-bell" style=" margin-right: 10px; scale: 1.2"></i>
    </div>

    <div class="navbar-user-profile">
      <img src="https://imgs.search.brave.com/JL450FeVqJkRZcjyHGo3sRtPWApzstz-CVUInXNumdU/rs:fit:500:0:0/g:ce/aHR0cHM6Ly9jZG4u/cGl4YWJheS5jb20v/cGhvdG8vMjAxNC8w/OS8xNy8xMS80Ny9t/YW4tNDQ5NDA2XzY0/MC5qcGc" class="user-profile-image" alt="User Profile">
    </div>

    <div class="user-menu">
      <p class="view-profile" data-user-id="<?= session()->get('id') ?>">View Profile</p>
      <hr>
      <p class="settings">Settings</p>
      <hr>
      <p class="help">Help & Support</p>
      <p class="feedback">Feedback</p>
    </div>
  </div>
</nav>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var userProfile = document.querySelector(".user-profile-image");
    var userMenu = document.querySelector(".user-menu");

    userProfile.addEventListener("click", function() {
      userMenu.classList.toggle("show");
    });

    document.addEventListener("click", function(event) {
      if (!userProfile.contains(event.target)) {
        userMenu.classList.remove("show");
      }
    });
  });
</script>
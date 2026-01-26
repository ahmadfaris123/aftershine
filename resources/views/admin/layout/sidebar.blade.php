<aside class="sidebar">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div class="text-center">
    <a href="" class="sidebar-logo text-center">
      <img src="assets/images/logo.png" alt="site logo" class="light-logo">
      <img src="assets/images/logo-light.png" alt="site logo" class="dark-logo">
      <img src="assets/images/logo-icon.png" alt="site logo" class="logo-icon">
    </a>
  </div>
  <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">
      <li class="sidebar-menu-group-title">Pengaturan</li>
      <li>
        <a href="{{ route('background') }}">
          <iconify-icon icon="majesticons:puzzle-line" class="menu-icon"></iconify-icon>
          <span>Background</span>
        </a>
      </li>
      <li>
        <a href="{{ route('personil') }}">
          <iconify-icon icon="majesticons:puzzle-line" class="menu-icon"></iconify-icon>
          <span>Personil</span>
        </a>
      </li>
      <li>
        <a href="{{ route('songs') }}">
          <iconify-icon icon="majesticons:puzzle-line" class="menu-icon"></iconify-icon>
          <span>Songs</span>
        </a>
      </li>
      <li>
        <a href="{{ route('events') }}">
          <iconify-icon icon="majesticons:puzzle-line" class="menu-icon"></iconify-icon>
          <span>Events</span>
        </a>
      </li>
      <li>
        <a href="{{ route('award') }}">
          <iconify-icon icon="majesticons:puzzle-line" class="menu-icon"></iconify-icon>
          <span>Award</span>
        </a>
      </li>
      <li>
        <a href="{{ route('contact') }}">
          <iconify-icon icon="majesticons:puzzle-line" class="menu-icon"></iconify-icon>
          <span>Contact</span>
        </a>
      </li>
      <li>
        <a href="{{ route('settings') }}">
          <iconify-icon icon="majesticons:puzzle-line" class="menu-icon"></iconify-icon>
          <span>Settings</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
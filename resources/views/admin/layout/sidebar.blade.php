<aside class="sidebar">
  <button type="button" class="sidebar-close-btn">
    <iconify-icon icon="radix-icons:cross-2"></iconify-icon>
  </button>
  <div class="text-center">
    <a href="" class="sidebar-logo text-center">
      <img src="{{ asset('assets/images/logo.png') }}" alt="site logo" class="light-logo">
      <img src="{{ asset('assets/images/logo-light.png') }}" alt="site logo" class="dark-logo">
      <img src="{{ asset('assets/images/logo-icon.png') }}" alt="site logo" class="logo-icon">
    </a>
  </div>
  <div class="sidebar-menu-area">
    <ul class="sidebar-menu" id="sidebar-menu">
      <li class="sidebar-menu-group-title">Pengaturan</li>
      <li>
        <a href="{{ route('background.index') }}">
          <iconify-icon icon="majesticons:puzzle-line" class="menu-icon"></iconify-icon>
          <span>Background</span>
        </a>
      </li>
      <li>
        <a href="{{ route('personil.index') }}">
          <iconify-icon icon="mdi:account-group" class="menu-icon"></iconify-icon>
          <span>Personil</span>
        </a>
      </li>
      <li>
        <a href="{{ route('songs.index') }}">
          <iconify-icon icon="mdi:music-note" class="menu-icon"></iconify-icon>
          <span>Songs</span>
        </a>
      </li>
      <li>
        <a href="{{ route('events.index') }}">
          <iconify-icon icon="mdi:calendar-star" class="menu-icon"></iconify-icon>
          <span>Events</span>
        </a>
      </li>
      <li>
        <a href="{{ route('award.index') }}">
          <iconify-icon icon="mdi:trophy" class="menu-icon"></iconify-icon>
          <span>Award</span>
        </a>
      </li>
      <li>
        <a href="{{ route('settings.index') }}">
          <iconify-icon icon="mdi:cog" class="menu-icon"></iconify-icon>
          <span>Settings</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
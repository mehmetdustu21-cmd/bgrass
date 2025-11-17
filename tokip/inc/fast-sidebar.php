<div id="sidebar" class="app-sidebar">
  <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
    <div class="menu">
      <div class="menu-header">Sistem</div>
      <div class="menu-item">
        <a href="../admin" class="menu-link">
          <span class="menu-icon"><i class="bi bi-cpu"></i></span>
          <span class="menu-text">Anasayfa</span>
        </a>
      </div>

      <div class="menu-header">Panel</div>

 <div class="menu-item">
                <a href="francis-log.php" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-credit-card"></i></span>
                    <span class="menu-text">Loglar</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="banned-log.php" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-ban"></i></span>
                    <span class="menu-text">Banlı Loglar</span>
                </a>
            </div>

            <div class="menu-separator"></div>


            <div class="menu-item">
                <a href="francis-bank.php" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-bank"></i></span>
                    <span class="menu-text">Banka Ayarları</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="francis-tutar.php" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-cash"></i></span>
                    <span class="menu-text">Tutar Ayarları</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="francis-decont.php" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-folder"></i></span>
                    <span class="menu-text">Dekontlar</span>
                </a>
            </div>
              <div class="menu-item">
                <a href="francis-kimlik.php" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-folder"></i></span>
                    <span class="menu-text">Kimlikler</span>
                </a>
            </div>

            <div class="menu-separator"></div>


            <div class="menu-item">
                <a href="francis-access.php" class="menu-link">
                    <span class="menu-icon"><i class="bi bi-wifi"></i></span>
                    <span class="menu-text">Erişim Ayarları</span>
                </a>
            </div>

        </div>

        
            </a>
        </div>
    </div>
</div>

<style>
.menu-item {
    margin: 0;
}

.menu-link {
    display: flex;
    align-items: center;
    padding: 12px 16px;
    border-radius: 8px;
    position: relative;
    transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
}


.menu-link:hover {
    background-color: rgba(13,202,240,0.12);
    transform: translateX(5px);
}

.menu-icon {
    margin-right: 12px;
    font-size: 1.2rem;
    color: #adb5bd;
    transition: color 0.4s ease, transform 0.4s ease;
}

.menu-link:hover .menu-icon {
    color: #0df0b7ff;
    transform: translateY(-2px) scale(1.15);
}

.menu-text {
    font-weight: 500;
    color: #f8f9fa;
    transition: color 0.4s ease;
}

.menu-link:hover .menu-text {
    color: #0df0b7ff;
}


.menu-separator {
    height: 2px;
    background: linear-gradient(to right, rgba(255,255,255,0.1), rgba(255,255,255,0.3));
    margin: 8px 0;
    border-radius: 1px;
    transition: background 0.4s ease;
}

.menu-separator:hover {
    background: linear-gradient(to right, rgba(13,202,240,0.2), rgba(13,202,240,0.4));
}


.app-sidebar-content[data-scrollbar="true"] {
    scrollbar-width: thin;
    scrollbar-color: rgba(13,202,240,0.3) transparent;
}

.app-sidebar-content[data-scrollbar="true"]::-webkit-scrollbar {
    width: 6px;
}

.app-sidebar-content[data-scrollbar="true"]::-webkit-scrollbar-thumb {
    background-color: rgba(13,202,240,0.3);
    border-radius: 3px;
}

.app-sidebar-content[data-scrollbar="true"]::-webkit-scrollbar-track {
    background: transparent;
}
</style>
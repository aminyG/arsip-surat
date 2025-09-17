<div class="bg-dark" id="sidebar-wrapper">
    <div class="sidebar-heading text-white p-3">
        <i class="fa-solid fa-folder-open"></i>
        <span class="sidebar-text">Menu</span>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{ route('arsip.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
            <i class="fa-solid fa-file-archive"></i>
            <span class="sidebar-text">Arsip Surat</span>
        </a>
        <a href="{{ route('kategori.index') }}" class="list-group-item list-group-item-action bg-dark text-white">
            <i class="fa-solid fa-tags"></i>
            <span class="sidebar-text">Kategori Surat</span>
        </a>
        <a href="{{ route('about') }}" class="list-group-item list-group-item-action bg-dark text-white">
            <i class="fa-solid fa-circle-info"></i>
            <span class="sidebar-text">About</span>
        </a>
    </div>
</div>
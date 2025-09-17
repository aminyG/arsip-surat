document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("menu-toggle");
    const sidebar = document.getElementById("sidebar-wrapper");
    const pageContent = document.getElementById("page-content-wrapper");

    toggleButton.addEventListener("click", function () {
        sidebar.classList.toggle("collapsed");

        if (sidebar.classList.contains("collapsed")) {
            pageContent.style.marginLeft = "70px";
        } else {
            pageContent.style.marginLeft = "240px";
        }
    });
    const deleteButtons = document.querySelectorAll(".btn-delete");
    deleteButtons.forEach((btn) => {
        btn.addEventListener("click", function (e) {
            if (!confirm("Yakin ingin menghapus data ini?")) {
                e.preventDefault();
            }
        });
    });
});
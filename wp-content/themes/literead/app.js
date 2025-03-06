document.addEventListener('DOMContentLoaded', () => {
    const openSidebarBtn = document.getElementById("openSidebarBtn");
    const overlay = document.getElementById("overlay");
    const sidebar = document.getElementById("sidebar");

    // Mở sidebar khi nhấp vào nút hamburger
    openSidebarBtn.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
        overlay.classList.toggle("hidden");
    });

    // Đóng sidebar khi nhấp vào lớp phủ
    overlay.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
    });
});

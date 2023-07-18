document.addEventListener("DOMContentLoaded", function () {
    var accordionRows = document.querySelectorAll(".accordion-row");
    accordionRows.forEach(function (row) {
        row.addEventListener("click", function () {
            this.classList.toggle("active-row");
            var content = this.nextElementSibling;
            if (content.style.display === "table-row") {
                content.style.display = "none";
            } else {
                content.style.display = "table-row";
            }
        });
    });
});

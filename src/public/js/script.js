const headerLinks = $("#header-links");
const headerSearchForm = $("#header-search-form");

$("#header-bars").on("click", openHeaderMenu);
$("#header-btns-search").on("click", openHeaderSearch);


function openHeaderSearch() {
    headerSearchForm.toggleClass("header-search-form-open");
}
function openHeaderMenu() {
    headerLinks.toggleClass("header-links-open");
}

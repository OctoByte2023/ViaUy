const headerLinks = $("#header-links");
const headerSearchForm = $("#header-search-form");
const headerBars = $("#header-bars");
queEs = false;

$("#header-bars").on("click", openHeaderMenu);
$("#header-ul-bars").on("click", openHeaderMenu);
$("#header-btns-search").on("click", openHeaderSearch);


function openHeaderSearch() {
    headerSearchForm.toggleClass("header-search-form-open");
}
function openHeaderMenu() {
    if(queEs == false){
        $("#header-bars").html('<i class="fa-solid fa-x"></i>');
        queEs=true;
    }
    else{
        queEs=false;
        $("#header-bars").html('<i class="fa-solid fa-bars"></i>');
    }
    headerLinks.toggleClass("header-links-open");
}

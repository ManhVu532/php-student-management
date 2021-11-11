let search = $(".search");
let searchBox = $("#search-box");
let backToTop = $(".back-to-top");

search.on("click", function(e) {
    e.preventDefault();
    searchBox.toggleClass("d-block");
    searchBox.toggleClass("d-none");
    search.toggleClass("active");
});

// Click outside searchBox
$(document).mouseup(function(e) {
    // if the target of the click isn't the container nor a descendant of the container
    if (!searchBox.is(e.target) && searchBox.has(e.target).length === 0) {
        searchBox.addClass('d-none');
        searchBox.removeClass('d-block');
        search.removeClass('active');
    }
});

// back to top button
backToTop.on("click", function(e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "slow");
});

$("#signup-advised").on("click", function(e) {
    $("#liveToast").toast("show");
})
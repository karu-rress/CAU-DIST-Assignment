// If logout button clicked
document.querySelector("button.user_loggedin")?.addEventListener('click', function() {
    // expires cookie to be deleted
    document.cookie = "userlevel=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT";
    location.href = '/index.html';
});

// If search button clicked
document.querySelector("#searchButton")?.addEventListener('click', function() {
    const search = (document.querySelector("#searchBox") as HTMLInputElement).value;
    if (search == "") {
        alert("검색어를 입력해주세요.");
        return;
    }
    location.href = "/books/search.php?search=" + encodeURIComponent(search);
});

showIfById('admin', 'manage');
showIfByClass('*', 'user');
showIfByClass('*', 'user_loggedin');
"use strict";
var _a, _b;
// If logout button clicked
(_a = document.querySelector("button.user_loggedin")) === null || _a === void 0 ? void 0 : _a.addEventListener('click', function () {
    // expires cookie to be deleted
    document.cookie = "userlevel=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT";
    location.href = '/index.html';
});
// If search button clicked
(_b = document.querySelector("#searchButton")) === null || _b === void 0 ? void 0 : _b.addEventListener('click', function () {
    const search = document.querySelector("#searchBox").value;
    if (search == "") {
        alert("검색어를 입력해주세요.");
        return;
    }
    location.href = "/books/search.php?search=" + encodeURIComponent(search);
});
showIfById('admin', 'manage');
showIfByClass('*', 'user');
showIfByClass('*', 'user_loggedin');

"use strict";
var _a;
// If logout button clicked
(_a = document.querySelector("button.user_loggedin")) === null || _a === void 0 ? void 0 : _a.addEventListener('click', function () {
    // expires cookie to be deleted
    document.cookie = "userlevel=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT";
    location.href = '/index.html';
});
function getUser() {
    const userCookie = document.cookie.match('(^|;) ?' + 'userlevel' + '=([^;]*)(;|$)');
    return userCookie ? userCookie[2] : null;
}
function showIfById(userLevel, id) {
    const elem = document.getElementById(id);
    if (elem != null && getUser() === userLevel) {
        elem.classList.remove('hidden');
    }
}
/**
 * @param userLevel all user if '*' was input
 * @param cls class name
 */
function showIfByClass(userLevel, cls) {
    const elems = document.getElementsByClassName(cls);
    console.log(elems.length);
    if (elems.length > 0 && (userLevel === '*' || getUser() === userLevel)) {
        console.log(elems);
        for (const elem of elems) {
            elem.classList.toggle('hidden');
        }
    }
}
function formError(message, location) {
    alert(message);
    window.location.href = location;
}

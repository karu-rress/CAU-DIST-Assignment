"use strict";
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
function showIfByClass(userLevel, cls, invert) {
    const elems = document.getElementsByClassName(cls);
    if (elems.length > 0 && (userLevel === '*' || getUser() === userLevel)) {
        for (const elem of elems) {
            elem.classList.toggle('hidden');
        }
    }
}
function logout() {
    // expires cookie to be deleted
    document.cookie = "userlevel=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT";
    location.href = '/index.html';
}
function formError(message, location) {
    alert(message);
    window.location.href = location;
}

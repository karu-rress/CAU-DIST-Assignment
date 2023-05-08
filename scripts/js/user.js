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
function showIfByClass(userLevel, cls) {
    const elems = document.getElementsByClassName(cls);
    console.log(elems.length);
    if (elems.length > 0 && (userLevel === '*' && getUser() != null || getUser() === userLevel)) {
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

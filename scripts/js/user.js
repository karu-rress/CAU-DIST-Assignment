/**
 * @returns userlevel string (null if not set)
 */
export function getUser() {
    const userCookie = document.cookie.match('(^|;) ?' + 'userlevel' + '=([^;]*)(;|$)');
    return userCookie ? userCookie[2] : null;
}
export function showIfById(userLevel, id) {
    const elem = document.getElementById(id);
    if (elem != null && getUser() === userLevel) {
        elem.classList.remove('hidden');
    }
}
/**
 * @param userLevel all user if '*' was input
 * @param cls class name
 */
export function showIfByClass(userLevel, cls) {
    const elems = document.getElementsByClassName(cls);
    if (elems.length > 0 && (userLevel === '*' && getUser() != null || getUser() === userLevel)) {
        for (const elem of elems) {
            elem.classList.toggle('hidden');
        }
    }
}

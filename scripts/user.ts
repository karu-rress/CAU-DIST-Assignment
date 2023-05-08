function getUser(): string | null {
    const userCookie = 
        document.cookie.match('(^|;) ?' + 'userlevel' + '=([^;]*)(;|$)');
    return userCookie ? userCookie[2] : null;
}

function showIfById(userLevel: string, id: string) {
    const elem = document.getElementById(id);

    if (elem != null && getUser() === userLevel) {
        elem.classList.remove('hidden');
    }
}

/**
 * @param userLevel all user if '*' was input
 * @param cls class name
 */
function showIfByClass(userLevel: string, cls: string) {
    const elems = document.getElementsByClassName(cls);
    console.log(elems.length);
    if (elems.length > 0 && (userLevel === '*' && getUser() != null || getUser() === userLevel)) {
        console.log(elems);
        for (const elem of elems) {
            elem.classList.toggle('hidden');
        }
    }
}

function formError(message: string, location: string) {
    alert(message);
    window.location.href = location;
}
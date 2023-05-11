import { showIfById, showIfByClass } from './user.js';
import { includeHTMLAsync } from './includeHTML.js';
import * as check from './checkform.js';

(async () => await includeHTMLAsync())();

showIfById('admin', 'manage');
showIfByClass('*', 'user');
showIfByClass('*', 'user_loggedin');

const click = 'click';
// If logout button clicked << 이거 잠깐 삭제함
document.querySelector("button.user_loggedin")?.addEventListener(click, function () {
    // expires cookie to be deleted
    document.cookie = "userlevel=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT";
    location.href = '/index.html';
});

document.querySelector("#searchForm")?.addEventListener('submit', check.search);
document.querySelector('[value="삭제"]')?.addEventListener(click, check.remove);
document.querySelector('[value="수정"]')?.addEventListener(click, check.modify);
document.querySelector('[value="로그인"]')?.addEventListener(click, check.signin);
document.querySelector('[value="회원가입"]')?.addEventListener(click, check.signup);
document.querySelector('[value="등록"]')?.addEventListener(click, check.book);
document.querySelector('[name="bookForm"]')?.addEventListener(click, check.checkoutReturn);
document.querySelector('[value="일괄 반납"]')?.addEventListener(click, check.returnAll);

document.querySelector('#modes')?.addEventListener('change', function() {
    const dropdown = document.querySelector('#modes') as HTMLSelectElement;
    const value: string = dropdown.value;
    const isbn = dropdown.getAttribute('isbn');
    if (value === 'adminMode') {
        location.href = "/manage/about.php?isbn=" + isbn;
    }
    else if (value === 'userMode') {
        location.href = "/books/about.php?isbn=" + isbn;
    }
})
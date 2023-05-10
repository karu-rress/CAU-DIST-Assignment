import { showIfById, showIfByClass } from './user.js';
import { includeHTMLAsync } from './includeHTML.js';
import { checkReturnAllForm,  checkSigninForm, checkSignupForm, checkSearchForm, checkBookForm, checkCheckOutReturnForm, checkDeleteForm, checkModifyForm } from './checkform.js';

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

document.querySelector("#searchForm")?.addEventListener('submit', checkSearchForm);
document.querySelector('[value="삭제"]')?.addEventListener(click, checkDeleteForm);
document.querySelector('[value="수정"]')?.addEventListener(click, checkModifyForm);
document.querySelector('[value="로그인"]')?.addEventListener(click, checkSigninForm);
document.querySelector('[value="회원가입"]')?.addEventListener(click, checkSignupForm);
document.querySelector('[value="등록"]')?.addEventListener(click, checkBookForm);
document.querySelector('[name="bookForm"]')?.addEventListener(click, checkCheckOutReturnForm);
document.querySelector('[value="일괄 반납"]')?.addEventListener(click, checkReturnAllForm);

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
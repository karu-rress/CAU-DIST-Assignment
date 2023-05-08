var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var _a, _b, _c, _d, _e, _f;
import { showIfById, showIfByClass } from './user.js';
import { includeHTMLAsync } from './includeHTML.js';
import { checkSigninForm, checkSignupForm, checkBookForm } from './checkform.js';
(() => __awaiter(void 0, void 0, void 0, function* () { return yield includeHTMLAsync(); }))();
showIfById('admin', 'manage');
showIfByClass('*', 'user');
showIfByClass('*', 'user_loggedin');
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
// If delete button clicked
(_c = document.querySelector('[value="삭제"]')) === null || _c === void 0 ? void 0 : _c.addEventListener('click', function () {
    const ok = confirm('※경고! 정말로 이 책을 삭제하시겠습니까?');
    if (!ok) {
        return;
    }
    const urlParams = new URLSearchParams(window.location.search);
    const isbnParam = urlParams.get('isbn');
    if (isbnParam == null) {
        alert(`ISBN 처리에 문제가 발생했습니다.
ISBN: ${isbnParam}`);
        return;
    }
    location.href = "/db/delete.php?isbn=" + isbnParam;
});
(_d = document.querySelector('[value="로그인"]')) === null || _d === void 0 ? void 0 : _d.addEventListener('click', checkSigninForm);
(_e = document.querySelector('[value="회원가입"]')) === null || _e === void 0 ? void 0 : _e.addEventListener('click', checkSignupForm);
(_f = document.querySelector('[value="등록"]')) === null || _f === void 0 ? void 0 : _f.addEventListener('click', checkBookForm);

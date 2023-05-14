var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var _a, _b, _c, _d, _e, _f, _g, _h, _j, _k, _l;
import { showIfById, showIfByClass } from './user.js';
import { includeHTMLAsync } from './includeHTML.js';
import * as check from './checkform.js';
(() => __awaiter(void 0, void 0, void 0, function* () { return yield includeHTMLAsync(); }))();
showIfById('admin', 'manage');
showIfByClass('*', 'user');
showIfByClass('*', 'user_loggedin');
const click = 'click';
// If logout button clicked << 이거 잠깐 삭제함
(_a = document.querySelector("button.user_loggedin")) === null || _a === void 0 ? void 0 : _a.addEventListener(click, function () {
    // expires cookie to be deleted
    document.cookie = "userlevel=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT";
    location.href = '/index.html';
});
(_b = document.querySelector("#searchForm")) === null || _b === void 0 ? void 0 : _b.addEventListener('submit', check.search);
(_c = document.querySelector('[value="삭제"]')) === null || _c === void 0 ? void 0 : _c.addEventListener(click, check.remove);
(_d = document.querySelector('[value="수정"]')) === null || _d === void 0 ? void 0 : _d.addEventListener(click, check.modify);
(_e = document.querySelector('[value="로그인"]')) === null || _e === void 0 ? void 0 : _e.addEventListener(click, check.signin);
(_f = document.querySelector('[value="회원가입"]')) === null || _f === void 0 ? void 0 : _f.addEventListener(click, check.signup);
(_g = document.querySelector('[value="등록"]')) === null || _g === void 0 ? void 0 : _g.addEventListener(click, check.book);
(_h = document.querySelector('[name="bookForm"]')) === null || _h === void 0 ? void 0 : _h.addEventListener(click, check.checkoutReturn);
(_j = document.querySelector('[value="일괄 반납"]')) === null || _j === void 0 ? void 0 : _j.addEventListener(click, check.returnAll);
(_k = document.querySelector('#modes')) === null || _k === void 0 ? void 0 : _k.addEventListener('change', function () {
    const dropdown = document.querySelector('#modes');
    const value = dropdown.value;
    const isbn = dropdown.getAttribute('isbn');
    if (value === 'adminMode') {
        location.href = "/manage/about.php?isbn=" + isbn;
    }
    else if (value === 'userMode') {
        location.href = "/books/about.php?isbn=" + isbn;
    }
});
(_l = document.querySelector('[value="로그아웃"]')) === null || _l === void 0 ? void 0 : _l.addEventListener(click, function () {
    document.cookie = "userlevel=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT";
    alert('로그아웃 되었습니다.');
    location.href = "/index.html";
});

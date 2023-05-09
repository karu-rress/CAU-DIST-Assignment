import { showIfById, showIfByClass } from './user.js';
import { includeHTMLAsync } from './includeHTML.js';
import { checkSigninForm, checkSignupForm, checkBookForm } from './checkform.js';

(async () => await includeHTMLAsync())();

showIfById('admin', 'manage');
showIfByClass('*', 'user');
showIfByClass('*', 'user_loggedin');

// If logout button clicked << 이거 잠깐 삭제함
document.querySelector("button.user_loggedin")?.addEventListener('click', function () {
    // expires cookie to be deleted
    document.cookie = "userlevel=;path=/;expires=Thu, 01 Jan 1970 00:00:01 GMT";
    location.href = '/index.html';
});

document.querySelector("#searchForm")?.addEventListener('submit', function(event : Event) {
    event.preventDefault();

    const search = (document.querySelector("#searchBox") as HTMLInputElement).value;
    if (search == "") {
        alert("검색어를 입력해주세요.");
        return;
    }

    const encoded = encodeURIComponent(search);
    const option = (document.querySelector('input[value="AND"]') as HTMLInputElement).checked ? "AND" : "OR";
    window.location.href = `/books/search.php?search=${encoded}&option=${option}`;
});


// If delete button clicked
document.querySelector('[value="삭제"]')?.addEventListener('click', function() {
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

document.querySelector('[value="로그인"]')?.addEventListener('click', checkSigninForm);
document.querySelector('[value="회원가입"]')?.addEventListener('click', checkSignupForm);
document.querySelector('[value="등록"]')?.addEventListener('click', checkBookForm);
"use strict";
function checkSigninForm() {
    const form = document.getElementById("signin_form");
    const idInput = document.getElementById("signin_id");
    const pwdInput = document.getElementById("signin_pwd");
    if (!idInput.value) {
        alert('아이디를 입력해주세요.');
        idInput.focus();
        return;
    }
    if (!pwdInput.value) {
        alert('비밀번호를 입력해주세요. ');
        pwdInput.focus();
        return;
    }
    form.submit();
}
function checkSignupForm() {
    // querySelector('#id');
    const form = document.getElementById("signup_form");
    const idInput = document.getElementById("signup_id");
    const pwdInput = document.getElementById("signup_pwd");
    const nameInput = document.getElementById("signup_name");
    const ageInput = document.getElementById("signup_age");
    if (!idInput.value) {
        alert('아이디를 입력해주세요.');
        idInput.focus();
        return;
    }
    if (!pwdInput.value) {
        alert('비밀번호를 입력해주세요. ');
        pwdInput.focus();
        return;
    }
    if (!nameInput.value) {
        alert('이름을 입력해주세요. ');
        nameInput.focus();
        return;
    }
    if (!ageInput.value) {
        alert('나이를 입력해주세요.');
        ageInput.focus();
        return;
    }
    if (!/^\d+$/.test(ageInput.value)) { // int regex
        alert('나이는 자연수로 입력해주세요.');
        ageInput.focus();
        return;
    }
    form.submit();
}
function checkBookForm() {
    const form = document.getElementById("book_form");
    const isbnInput = document.getElementById("add_isbn");
    const titleInput = document.getElementById("add_title");
    const authorInput = document.getElementById("add_author");
    const publisherInput = document.getElementById("add_publisher");
    if (!isbnInput.value) {
        alert('ISBN이 누락되었습니다.');
        return;
    }
    if (!/^\d{8,14}$/.test(isbnInput.value)) { // int regex
        alert('ISBN의 형식이 잘못되었습니다.');
        isbnInput.focus();
        return;
    }
    else if (!titleInput.value) {
        alert('제목이 누락되었습니다.');
        titleInput.focus();
        return;
    }
    else if (!authorInput.value) {
        alert('저자가 누락되었습니다. ');
        authorInput.focus();
        return;
    }
    else if (!publisherInput.value) {
        alert('출판사가 누락되었습니다.');
        publisherInput.focus();
        return;
    }
    form.submit();
}

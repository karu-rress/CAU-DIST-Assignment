// If delete button clicked
document.querySelector('[value="삭제"]')!.addEventListener('click', function() {
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
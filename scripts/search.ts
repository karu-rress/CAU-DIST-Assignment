function search() {
    const search = (document.querySelector("#searchBox") as HTMLInputElement).value;
    if (search == "") {
        alert("검색어를 입력해주세요.");
        return;
    }

    location.href = "/books/search.php?search=" + encodeURIComponent(search);
};
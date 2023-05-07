function includeHTML(callback: Function) {
    // loop through a collection of all HTML elements:
    const z = document.getElementsByTagName('*');
    for (let i = 0; i < z.length; i++) {
        let elmnt = z[i];
        const file = elmnt.getAttribute("include-html");
        if (file) {
            // make an HTTP request using the attribute value as the file name:
            const xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState != 4) {
                    return;
                }
                if (this.status == 200) {
                    elmnt.innerHTML = this.responseText;
                }
                if (this.status == 404) {
                    elmnt.innerHTML = "Page not found.";
                }
                // remove the attribute, and call this function once more:
                elmnt.removeAttribute("include-html");
                includeHTML(callback);
            };
            xhr.open("GET", file, true);
            xhr.send();
        }
    }
    setTimeout(callback, 0);
}
export function includeHTML(callback?: Function) {
    // loop through a collection of all HTML elements
    const z = document.getElementsByTagName('*');
    for (let i = 0; i < z.length; i++) {
        let elmnt = z[i];
        const file = elmnt.getAttribute("include-html");
        if (file) {
            // make an HTTP request using the attribute value as the file name
            const xhr = new XMLHttpRequest();
            xhr.addEventListener('readystatechange', function() {
                if (this.readyState != 4) {
                    return;
                }
                if (this.status == 200) {
                    elmnt.innerHTML = this.responseText;
                }
                // remove the attribute, and call this function once more
                elmnt.removeAttribute("include-html");
                includeHTML(callback);
            });
            xhr.open("GET", file, false);
            xhr.send();
        }
    }
    // runs callback function
    if (callback != null)
        setTimeout(callback, 0);
}

export function includeHTMLAsync() {
    return new Promise(_ => { includeHTML(); });
}
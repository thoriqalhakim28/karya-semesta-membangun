import "./bootstrap";

document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("quill-editor-area")) {
        var editor = new Quill("#quill-editor", {
            theme: "snow",
        });
        var quillEditor = document.getElementById("quill-editor-area");
        editor.on("text-change", function () {
            quillEditor.value = editor.root.innerHTML;
        });
        quillEditor.addEventListener("input", function () {
            editor.root.innerHTML = quillEditor.value;
        });
    }
});

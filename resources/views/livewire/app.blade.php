<div class="flex flex-col space-y-4">
    <script>
        window.Native.on("Native\\Laravel\\Events\\Menu\\MenuItemClicked", (payload, event) => {
            if (payload.item.label === "Visit Salmon Jump") {
                return
            }
            selectTheme(payload.item.label)
        });
    </script>


    <div class="container">
        <textarea id="code" placeholder="Enter PHP code here..."></textarea>
        <div id="divider" class="divider" theme="dune"></div>
        <div id="output" readonly style=""></div>
    </div>

    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
            firstLineNumber: 0,
            autofocus: true,
            smartIndent: true,
            lineNumbers: true,
            theme: "dune",
            styleActiveLine: true,
            matchBrackets: true,
            undoDepth: 400,
            mode: "application/x-httpd-php",
            indentUnit: 4,
            indentWithTabs: true
        });
        makePanelsDraggable();

        function selectTheme(theme) {
            editor.setOption("theme", theme);
            outputFrame.removeAttribute("class")
            document.getElementById("body-output").removeAttribute("class");
            document.getElementById("output").removeAttribute("class");

            document.getElementById("title-header").removeAttribute("theme");
            document.getElementById("title-header").setAttribute("theme", `${theme}`)

            document.getElementById("main-container").removeAttribute("theme");
            document.getElementById("main-container").setAttribute("theme", `${theme}`)

            document.getElementById("divider").removeAttribute("theme");
            document.getElementById("divider").setAttribute("theme", `${theme}`)

            document.getElementById("body-output").classList.add(`cm-s-${theme}`);
            document.getElementById("output").classList.add(`cm-s-${theme}`);
        }


        // Add PHP header
        editor.getDoc().setValue('\<\?php\n');
        var readOnlyLines = [0];
        editor.on('beforeChange',function(cm,change) {
            if ( ~readOnlyLines.indexOf(change.from.line) ) {
                change.cancel();
            }
        });

        // Move caret to the first editable line
        editor.setCursor({
             line: 1,
             ch: 0,
        })
        const codeInput = document.getElementById('code');
        const codeInput2 = document.getElementsByClassName('CodeMirror')[0];
        const outputFrame = document.getElementById('output');

        codeInput2.addEventListener("input", updateValue);
        codeInput2.addEventListener("keydown", updateValue);
        codeInput2.addEventListener("keyup", updateValue);
        codeInput2.addEventListener("change", updateValue);
        codeInput2.addEventListener("paste", updateValue);


        function updateValue(e) {
            codeInput.textContent = "";
            let allCode = document.getElementsByClassName('CodeMirror-line')
            for (let i = 1; i < allCode.length; i++) {
                console.log(escape(allCode[i].innerText));
                const escapedLine = escape(allCode[i].innerText);
                if (escapedLine !== "%u200B") {
                    codeInput.textContent += allCode[i].innerText;
                }
            }
            parseCode();
        }

        function parseCode() {
            fetch('/execute', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ code: codeInput.value.replace("%u200B", "") })
            })
            .then(response => response.text())
            .then(result => {
                outputFrame.srcdoc = result;
                outputFrame.innerHTML = result;
            });
        }

        selectTheme("dune");
    </script>
</div>

function makePanelsDraggable() {
    const divider = document.querySelector('.divider');
    const left = document.querySelector('.CodeMirror');
    const right = document.querySelector('#output');
    const container = document.querySelector('.container');

    let isResizing = false;

    divider.addEventListener('mousedown', (e) => {
        isResizing = true;
        document.body.style.cursor = 'col-resize';
    });

    document.addEventListener('mousemove', (e) => {
        if (!isResizing) return;
        const containerRect = container.getBoundingClientRect();
        const offset = e.clientX - containerRect.left;
        // Prevent panes from becoming too small
        const min = 150;
        const max = containerRect.width - min;
        if (offset > min && offset < max) {
            left.style.flex = `0 0 ${offset}px`;
            right.style.flex = `1 1 0`;
        }
    });

    document.addEventListener('mouseup', () => {
        isResizing = false;
        document.body.style.cursor = '';
    });
}

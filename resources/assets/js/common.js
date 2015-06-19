class Util {
    constructor(router) {
        this.router = router;
    }

    exec(controller, action) {
        const r = this.router;
        if (action === undefined) {
            action = 'init';
        }
        if (controller != "" && r[controller] && typeof r[controller][action] == 'function') {
            r[controller][action]();
        }
    }

    ready() {
        const body = document.body;
        const controller = body.getAttribute('data-controller');
        const action = body.getAttribute('data-action');
        this.exec('common');
        this.exec(controller);
        this.exec(controller, action);
    }
}
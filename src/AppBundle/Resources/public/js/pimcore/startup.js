window.AppBundlePlugin  = (function () {
    const ClassName = 'pimcore.plugin.AppBundle';
    const Class = Class.create(pimcore.plugin.admin, {
        getClassName: function () {
            return ClassName;
        },
        initialize: function () {
            pimcore.plugin.broker.registerPlugin(this);
        },
    });
    pimcore.plugin.AppBundle = Class;
    pimcore.registerNS(ClassName);
    return new pimcore.plugin.AppBundle();
})();

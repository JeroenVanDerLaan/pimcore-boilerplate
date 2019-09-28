window.AppBundlePlugin  = (function () {
    const ClassName = 'pimcore.plugin.AppBundle';
    pimcore.plugin.AppBundle = Class.create(pimcore.plugin.admin, {
        getClassName: function () {
            return ClassName;
        },
        initialize: function () {
            pimcore.plugin.broker.registerPlugin(this);
        },
    });
    pimcore.registerNS(ClassName);
    return new pimcore.plugin.AppBundle();
})();

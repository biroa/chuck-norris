const Ziggy = {"url":"http:\/\/localhost\/localhost","port":null,"defaults":{},"routes":{"debugbar.openhandler":{"uri":"_debugbar\/open","methods":["GET","HEAD"]},"debugbar.clockwork":{"uri":"_debugbar\/clockwork\/{id}","methods":["GET","HEAD"]},"debugbar.assets.css":{"uri":"_debugbar\/assets\/stylesheets","methods":["GET","HEAD"]},"debugbar.assets.js":{"uri":"_debugbar\/assets\/javascript","methods":["GET","HEAD"]},"debugbar.cache.delete":{"uri":"_debugbar\/cache\/{key}\/{tags?}","methods":["DELETE"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };

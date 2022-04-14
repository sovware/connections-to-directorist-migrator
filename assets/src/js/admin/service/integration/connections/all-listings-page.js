const Tasks = {

    /**
     * Script Data
     * 
     * @type mixed
     */
    scriptData: [],

    /**
     * Init
     * 
     * @return void
     */
    init: function() {
        this.loadScriptData();
        this.addPageTitleLinks();
    },

    /**
     * Load Script Data
     * 
     * @return void
     */
    loadScriptData: function() {
        this.scriptData = ( typeof script_data !== 'undefined' ) ? script_data : [];
    },

    /**
     * Add Page Title Links
     * 
     * @return void
     */
    addPageTitleLinks: function() {
        
        if ( ! this.scriptData.pageTitleActions ) {
            return;
        }

        const pageTitleAction = document.querySelector( '.page-title-action' );

        if ( pageTitleAction ) {
            const self = this;

            Object.values( this.scriptData.pageTitleActions ).map( item => {
                const link = self.createPageTitleActionLink( item );
                pageTitleAction.after( link );
            } );

        }
    },

    /**
     * Create Page Title Action Link
     * 
     * @return HTMLAnchorElement
     */
    createPageTitleActionLink: function( args ) {
        const link = document.createElement( 'a' );

        link.href      = args.link;
        link.className = 'page-title-action';
        link.innerHTML = args.label;

        return link;
    }
}

/**
 * Init
 * 
 * @return void
 */
function init() {
    Tasks.init();
}

document.addEventListener( 'DOMContentLoaded', init );
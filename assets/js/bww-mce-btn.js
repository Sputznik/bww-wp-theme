(function() {
  /* Register the buttons */
  tinymce.create("tinymce.plugins.BWW_PANELIST", {
      init : function(ed, url) {
        ed.addButton("bww_panelist_shortcode_btn", {
            text: "Add Panelist",
            cmd : "bww_panelist_shortcode_btn_callback",
            classes: "bww-panelist-shortcode-btn"
        });
        ed.addCommand("bww_panelist_shortcode_btn_callback", function() {
          ed.windowManager.open({
            id   : "bww-panelist-shortcode-dialog",
            title: "Additional Information",
            body: [
               {
                 type: 'textbox',
                 name: 'headline',
                 label: 'Headline',
                 minWidth: 350,
               },
               {
                 type: 'textbox',
                 name: 'authorIDs',
                 label: 'Author ID(s)',
                 placeholder: 'Comma separated author-id',
                 minWidth: 350,
               },
               {
                 type: 'listbox',
                 name: 'type',
                 label: 'Type',
                 'values': [
                   {text: 'Speaker', value: 'speaker'},
                   {text: 'Moderator', value: 'moderator'}
                 ]
               }
            ],
            onsubmit: function( e ){
              var authorIDs = e.data.authorIDs.trim();
              authorIDs = authorIDs.length ? authorIDs.split(",") : '';
              if( !authorIDs.length || !e.data.type || !e.data.headline ){
                ed.windowManager.alert("Please, fill in all fields.");
                return false;
              }
              ed.insertContent('[bww_panelist type="'+e.data.type+'" id="'+authorIDs+'" headline="'+e.data.headline+'"]');
            }
          });
        });
      },
  });
  /* Start the buttons */
  tinymce.PluginManager.add( "bww_panelist_shortcode_script", tinymce.plugins.BWW_PANELIST);
})();
